#include <Wire.h>
#include <ESP32Servo.h>
#include <Adafruit_INA219.h>
#include <WiFi.h>
#include <HTTPClient.h>

//  WiFi Credentials
const char* ssid = "Keflineprisca";
const char* password = "priscajohn@2345....";

 
const char* statusApi = "http://192.168.75.249:8000/api/panel/status";
const char* metricsApi = "http://192.168.75.249:8000/api/system/status";
const char* apiKeyHeader = "X-API-KEY";
const char* apiKeyValue = "lTXKl4Fw6t4CQ3TmQMb7DE3QmOAJzX7GknADWKZjOjI=";


TwoWire I2C_solar(1);
Adafruit_INA219 ina219_battery(0x40);
Adafruit_INA219 ina219_solar(0x40);

 
const int LDR_LEFT_PIN = 34;
const int LDR_RIGHT_PIN = 35;
const int SERVO_PIN = 19;
Servo panelServo;
int currentAngle = 90;
const int STEP_SIZE = 2;
const int ERROR_THRESHOLD = 10;
const int MIN_ANGLE = 0;
const int MAX_ANGLE = 180;
const float panel_area_m2 = 0.01092;

 
float busVoltage = 0.0, current_mA = 0.0, total_energy_consumed_Wh = 0.0;
float total_charging = 0.0, solar_voltage = 0.0, solar_current_mA = 0.0;
float solar_power_W = 0.0, energy_captured_Wh = 0.0, solar_efficiency = 0.0;
float solar_panel_efficiency = 0.0;

//  Timing 
unsigned long lastBatteryMeasurement = 0;
unsigned long lastSolarMeasurement = 0;
unsigned long lastSolarCycleStart = 0;
unsigned long lastStatusUpdate = 0;

const unsigned long batteryInterval = 2000;
const unsigned long solarInterval = 1000;
const unsigned long solarCycleDuration = 30000; // 30 seconds
const unsigned long statusInterval = 1000;

void setup() {
  Serial.begin(115200);
  WiFi.begin(ssid, password);
  Serial.print("Connecting to WiFi");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("\nWiFi connected! IP: " + WiFi.localIP().toString());

  Wire.begin();
  if (!ina219_battery.begin()) {
    Serial.println("INA219 (battery) not detected");
    while (1);
  }

  I2C_solar.begin(16, 17);
  if (!ina219_solar.begin(&I2C_solar)) {
    Serial.println("INA219 (solar) not detected");
    while (1);
  }

  pinMode(LDR_LEFT_PIN, INPUT);
  pinMode(LDR_RIGHT_PIN, INPUT);
  panelServo.attach(SERVO_PIN);
  panelServo.write(currentAngle);
  delay(200);

  lastBatteryMeasurement = millis();
  lastSolarMeasurement = millis();
  lastSolarCycleStart = millis();
  lastStatusUpdate = millis();
}

void loop() {
  trackSun();
  unsigned long now = millis();

  if (now - lastBatteryMeasurement >= batteryInterval) {
    updateBatteryMetrics();
    printPanelStatusToSerial(currentAngle, total_charging);
    printSystemMetricsToSerial(busVoltage, current_mA, total_energy_consumed_Wh, total_charging);
    lastBatteryMeasurement = now;
  }

  if (now - lastSolarMeasurement >= solarInterval) {
    updateSolarMetrics();
    lastSolarMeasurement = now;
  }

 
  if (now - lastSolarCycleStart >= solarCycleDuration) {
    printSolarEfficiency();      
    sendMetricsToAPI();          
    energy_captured_Wh = 0.0;    
    total_energy_consumed_Wh = 0.0;
    lastSolarCycleStart = now;
  }

  if (now - lastStatusUpdate >= statusInterval) {
    sendPanelStatusToAPI();
    lastStatusUpdate = now;
  }

  delay(100);
}

void trackSun() {
  int left = analogRead(LDR_LEFT_PIN);
  int right = analogRead(LDR_RIGHT_PIN);
  int diff = left - right;

  if (abs(diff) > ERROR_THRESHOLD) {
    currentAngle = constrain(currentAngle + (diff > 0 ? STEP_SIZE : -STEP_SIZE), MIN_ANGLE, MAX_ANGLE);
    panelServo.write(currentAngle);
    printSensorReadings(left, right);
  }
}

float calculateEfficiency(int angle) {
  return 100.0 - (abs(angle - 90) * 0.8);
}

void updateBatteryMetrics() {
  float elapsedHours = (millis() - lastBatteryMeasurement) / 3600000.0;
  busVoltage = ina219_battery.getBusVoltage_V();
  current_mA = ina219_battery.getCurrent_mA();
  float power = busVoltage * (current_mA / 1000.0);
  float energy = power * elapsedHours;
  if (energy > 0) total_energy_consumed_Wh += energy;
  total_charging = constrain((busVoltage / 7.4) * 100.0, 0.0, 100.0);
}

void updateSolarMetrics() {
  float elapsedHours = (millis() - lastSolarMeasurement) / 3600000.0;
  solar_voltage = ina219_solar.getBusVoltage_V();
  solar_current_mA = ina219_solar.getCurrent_mA();
  solar_power_W = solar_voltage * (solar_current_mA / 1000.0);
  float energy = solar_power_W * elapsedHours;
  if (energy > 0) energy_captured_Wh += energy;
}

void sendPanelStatusToAPI() {
  HTTPClient http;
  http.begin(statusApi);
  http.addHeader("Content-Type", "application/json");
  http.addHeader(apiKeyHeader, apiKeyValue);

  String payload = "{";
  payload += "\"panel_status\":\"active\",";
  payload += "\"panel_id\":\"PANEL00\",";
  payload += "\"panel_angle\":" + String(currentAngle) + ",";
  payload += "\"overall_efficiency\":" + String(calculateEfficiency(currentAngle), 2);
  payload += "}";

  int code = http.POST(payload);
  Serial.println(code == 200 ? "Panel status sent." : "Panel status error: " + String(code));
  http.end();
}

void sendMetricsToAPI() {
  HTTPClient http;
  http.begin(metricsApi);
  http.addHeader("Content-Type", "application/json");
  http.addHeader(apiKeyHeader, apiKeyValue);

  String unitCaptured, unitConsumed;
  float scaledEnergyCaptured = getScaledValue(energy_captured_Wh, unitCaptured);
  float scaledEnergyConsumed = getScaledValue(total_energy_consumed_Wh, unitConsumed);

  String payload = "{";
  payload += "\"total_capacity\":10000,";
  payload += "\"current_production\":" + String(scaledEnergyCaptured, 3) + ",";
  payload += "\"current_consumption\":" + String(scaledEnergyConsumed, 3) + ",";
  payload += "\"overall_efficiency\":" + String(solar_efficiency, 2) + ",";
  payload += "\"battery_level\":0,";
  payload += "\"total_charging\":" + String(total_charging, 1) + ",";
  payload += "\"min_charging\":0,";
  payload += "\"max_charging\":0,";
  payload += "\"one_hour_usage\":" + String(solar_panel_efficiency, 2) + ",";
  payload += "\"last_updated\":0";
  payload += "}";

  int code = http.POST(payload);
  Serial.println(code == 200 ? "Metrics sent." : "Metrics error: " + String(code));
  http.end();
}

void printSensorReadings(int left, int right) {
  Serial.print("LDR Readings: Left="); Serial.print(left);
  Serial.print(" Right="); Serial.print(right);
  Serial.print(" | Current Angle: "); Serial.print(currentAngle);
  Serial.print("° | Efficiency: "); Serial.print(calculateEfficiency(currentAngle), 1);
  Serial.println("%");
}

void printScaledValue(float value, const char* unit) {
  struct UnitPrefix { const char* prefix; float factor; };
  UnitPrefix prefixes[] = {{"p", 1e-12}, {"n", 1e-9}, {"µ", 1e-6}, {"m", 1e-3}, {"", 1}, {"k", 1e3}, {"M", 1e6}};
  float absVal = fabs(value);
  int index = 4;
  for (int i = 0; i < 7; i++) {
    float scaled = absVal / prefixes[i].factor;
    if (scaled >= 1.0 && scaled < 1000.0) {
      index = i;
      break;
    }
  }
  float scaledValue = value / prefixes[index].factor;
  Serial.print(scaledValue, 3); Serial.print(" "); Serial.print(prefixes[index].prefix); Serial.print(unit);
}

void printPanelStatusToSerial(int currentAngle, float total_charging) {
  Serial.println(F("=== Panel Status ==="));
  Serial.print(F("Panel Angle: ")); Serial.print(currentAngle);
  Serial.print(F("° | Panel Status: active | Capacity: "));
  Serial.print(total_charging, 1); Serial.println(F("%"));
}

void printSystemMetricsToSerial(float busVoltage, float current_mA, float total_energy_consumed_Wh, float total_charging) {
  Serial.println(F("=== System Metrics ==="));
  Serial.print(F("Battery Voltage: ")); printScaledValue(busVoltage, "V"); Serial.print(F(" | "));
  Serial.print(F("Battery Current: ")); printScaledValue(current_mA / 1000.0, "A"); Serial.print(F(" | "));
  float power_W = busVoltage * (current_mA / 1000.0);
  Serial.print(F("Power Consumed: ")); printScaledValue(power_W, "W"); Serial.print(F(" | "));
  Serial.print(F("Total Energy Consumed: ")); printScaledValue(total_energy_consumed_Wh, "Wh"); Serial.print(F(" | "));
  Serial.print(F("Battery Charging Level: ")); Serial.print(total_charging, 1); Serial.println(F("%"));
}


void printSolarEfficiency() {
  if (energy_captured_Wh > 0) {
    // Efficiency
    solar_efficiency = constrain((1.0 - (total_energy_consumed_Wh / energy_captured_Wh)) * 100.0, 0.0, 100.0);
    solar_panel_efficiency = constrain((energy_captured_Wh / (panel_area_m2 * 0.1)) * 100.0, 0.0, 100.0);
  } else {
    solar_efficiency = 0.0;
  }

  Serial.println(F("\n === Solar Charging Efficiency Report ==="));
  Serial.print(F("Energy Captured (30s): ")); printScaledValue(energy_captured_Wh, "Wh"); Serial.println();
  Serial.print(F("Energy Consumed (30s): ")); printScaledValue(total_energy_consumed_Wh, "Wh"); Serial.println();
  Serial.print(F("System Efficiency: ")); Serial.print(solar_efficiency, 2); Serial.println(F(" %"));
  Serial.print(F(" | Panel Efficiency: ")); Serial.print(solar_panel_efficiency, 2); Serial.println(F("%"));
  Serial.println(F("========================================\n"));
}


float getScaledValue(float value, String &unitOut) {
  struct UnitPrefix { const char* prefix; float factor; };
  UnitPrefix prefixes[] = {{"p", 1e-12}, {"n", 1e-9}, {"µ", 1e-6}, {"m", 1e-3}, {"", 1}, {"k", 1e3}, {"M", 1e6}};
  float absVal = fabs(value);
  int index = 4;

  for (int i = 0; i < 7; i++) {
    float scaled = absVal / prefixes[i].factor;
    if (scaled >= 1.0 && scaled < 1000.0) {
      index = i;
      break;
    }
  }

  unitOut = prefixes[index].prefix;
  return value / prefixes[index].factor;
}
