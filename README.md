<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

<h1 align="center">Automated solar panel uv Tracking System</h1>
<p align="center"><strong>IoT-Enhanced Solar Panel Optimization Platform</strong></p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

## 🚀 Overview

The **Smart Solar Tracking System** enhances the efficiency of solar panels by combining **automated sun tracking**, **real-time monitoring**, and **IoT data analytics**. It helps maximize solar energy capture by up to 40% compared to static panels.

This system is built with a **Laravel backend**, integrates with an ESP32 microcontroller via **MQTT**, and features a responsive web dashboard for visualization and control.

---

## 🔧 Features

- **Automated Solar Tracking:** Servo-powered panel rotation using LDR sensors
- **Real-Time Monitoring:** View energy generation, battery level, and UV exposure
- **IoT Communication:** MQTT protocol with ESP32 microcontroller
- **Performance Analytics:** Data logging, trend analysis, and predictive maintenance
- **Mobile-Responsive Dashboard:** User-friendly frontend for system interaction

---

## 🛠 Tech Stack

| Layer        | Technologies                         |
|--------------|--------------------------------------|
| Backend      | Laravel (PHP)                        |
| Frontend     | HTML5, CSS3, JavaScript              |
| IoT Device   | ESP32, LDR Sensors, MG995 Servo      |
| Communication| MQTT                                 |
| Database     | MySQL                                |
| Power System | Solar Panel, TP4056, Li-ion Battery  |

---

## 📦 Installation

### Requirements

- PHP >= 8.1
- Composer
- MySQL
- Node.js & NPM (for frontend assets)
- MQTT Broker (e.g., Mosquitto)
- Arduino IDE

### Setup Instructions

```bash
# Clone the repo
git clone https://github.com/kefline/AUTOMATIC-UV-SYSTEM.git
cd smart-solar-tracker

# Install PHP dependencies
composer install

# Copy environment config
cp .env.example .env

# Generate app key
php artisan key:generate

# Configure your database in .env and run migrations
php artisan migrate

# Install frontend dependencies and compile
npm install && npm run dev

# Start the Laravel server
php artisan serve

##SETTING UP THE ESP32
1) Save all the files inthe IOT_codes folder under one folder.
2) open the main_project.ino with Arduino IDE.
3) Then connect your ESP32 to the computer.
4) Compile and upload the main_project.ino file to the ESP32.
5) Observe the results inthe serial monitor.
