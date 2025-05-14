<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="https://solar-admin-template.multipurposethemes.com/bs5/images/favicon.ico">

	<title>Performance Dashboard</title>

	<link rel="stylesheet" href="https://solar-admin-template.multipurposethemes.com/bs5/template/vertical/src/css/vendors_css.css">
	<link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css" rel="stylesheet">
	<link href="/assets/css/all.min.css" rel="stylesheet">


	<link rel="stylesheet" href="/assets/css/style.css">
	<link rel="stylesheet" href="/assets/css/skin_color.css">
	<link rel="stylesheet" href="/assets/css/custom.css">
	<link href="/assets/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<style>
		/* New Chat Styles */
		.chat-container {
			position: fixed;
			bottom: 20px;
			right: 20px;
			z-index: 1000;
		}

		.chat-toggle-btn {
			width: 50px;
			height: 50px;
			border-radius: 50%;
			background-color: #007bff;
			color: white;
			border: none;
			cursor: pointer;
			display: flex;
			align-items: center;
			justify-content: center;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
		}

		.chat-window {
			display: none;
			width: 300px;
			height: 400px;
			background-color: white;
			border-radius: 10px;
			box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
			flex-direction: column;
			overflow: hidden;
		}

		.chat-window.active {
			display: flex;
		}

		.chat-header {
			background-color: #007bff;
			color: white;
			padding: 10px;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		.chat-body {
			flex: 1;
			padding: 10px;
			overflow-y: auto;
			background-color: #f8f9fa;
		}

		.chat-message {
			margin-bottom: 10px;
			padding: 8px;
			border-radius: 5px;
		}

		.chat-message.user {
			background-color: #007bff;
			color: white;
			margin-left: 20%;
			margin-right: 10px;
		}

		.chat-message.other {
			background-color: #e9ecef;
			margin-right: 20%;
			margin-left: 10px;
		}

		.chat-input-area {
			padding: 10px;
			border-top: 1px solid #dee2e6;
			display: flex;
		}

		.chat-input-area input {
			flex: 1;
			border: 1px solid #ced4da;
			border-radius: 5px;
			padding: 5px;
			margin-right: 5px;
		}

		.chat-input-area button {
			background-color: #007bff;
			color: white;
			border: none;
			border-radius: 5px;
			padding: 5px 10px;
			cursor: pointer;
		}

		/* New Notification Styles */
		.notification-dropdown .dropdown-menu {
			width: 300px;
			padding: 0;
			border: none;
			box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
		}

		.notification-header {
			background-color: #f8f9fa;
			padding: 10px;
			border-bottom: 1px solid #dee2e6;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		.notification-list {
			max-height: 300px;
			overflow-y: auto;
			padding: 0;
			margin: 0;
			list-style: none;
		}

		.notification-item {
			padding: 10px;
			border-bottom: 1px solid #dee2e6;
			display: flex;
			align-items: center;
		}

		.notification-item:last-child {
			border-bottom: none;
		}

		.notification-item i {
			margin-right: 10px;
		}

		.notification-item:hover {
			background-color: #f1f3f5;
		}

		.notification-footer {
			padding: 10px;
			text-align: center;
			border-top: 1px solid #dee2e6;
		}
	</style>

</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

	<div class="wrapper">
		<div id="loader"></div>

		<header class="main-header">
			<div class="d-flex align-items-center logo-box justify-content-end">
				<img src="/assets/images/logomax.jpg" alt="" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;">
			</div>
			<nav class="navbar navbar-static-top">
				<div class="app-menu">
					<ul class="header-megamenu nav">
						<li class="btn-group nav-item">
							<a href="#" class="waves-effect waves-light nav-link push-btn btn-primary-light" data-toggle="push-menu" role="button">
								<i data-feather="menu"></i>
							</a>
						</li>
					</ul>
				</div>
				<div class="navbar-custom-menu r-side">
					<ul class="nav navbar-nav">
						<li class="dropdown notifications-menu btn-group notification-dropdown">
							<a href="#" class="waves-effect waves-light btn-primary-light svg-bt-icon" data-bs-toggle="dropdown" title="Notifications">
								<i data-feather="bell"></i>
								<span class="badge badge-sm badge-danger" id="notification-count">3</span>
							</a>
							<ul class="dropdown-menu animated fadeIn">
								<li class="notification-header">
									<h4 class="mb-0">Notifications</h4>
									<a href="#" class="text-danger" id="clear-notifications">Clear All</a>
								</li>
								<li>
									<ul class="notification-list">
										<li class="notification-item">
											<i class="fa fa-info-circle text-info"></i>
											System efficiency reached 85%
										</li>
										<li class="notification-item">
											<i class="fa fa-warning text-warning"></i>
											Low power generation detected
										</li>
										<li class="notification-item">
											<i class="fa fa-check-circle text-success"></i>
											Maintenance scheduled
										</li>
									</ul>
								</li>
								<li class="notification-footer">
									<a href="#">View All Notifications</a>
								</li>
							</ul>
						</li>
						<li class="btn-group nav-item d-xl-inline-flex d-none">
							<a href="#"
								class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon dropdown-toggle"
								data-bs-toggle="dropdown">
								<img class="rounded"
									src="https://solar-admin-template.multipurposethemes.com/bs5/images/svg-icon/usa.svg"
									alt="">
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item my-5" href="#"><img class="w-20 rounded me-10"
										src="https://solar-admin-template.multipurposethemes.com/bs5/images/svg-icon/usa.svg"
										alt=""> English</a>
								<a class="dropdown-item my-5" href="#"><img class="w-20 rounded me-10"
										src="https://solar-admin-template.multipurposethemes.com/bs5/images/svg-icon/spain.svg"
										alt=""> Spanish</a>
								<a class="dropdown-item my-5" href="#"><img class="w-20 rounded me-10"
										src="https://solar-admin-template.multipurposethemes.com/bs5/images/svg-icon/ger.svg"
										alt=""> German</a>
								<a class="dropdown-item my-5" href="#"><img class="w-20 rounded me-10"
										src="https://solar-admin-template.multipurposethemes.com/bs5/images/svg-icon/jap.svg"
										alt=""> Japanese</a>
								<a class="dropdown-item my-5" href="#"><img class="w-20 rounded me-10"
										src="https://solar-admin-template.multipurposethemes.com/bs5/images/svg-icon/fra.svg"
										alt=""> French</a>
							</div>
						</li>
						<li class="btn-group nav-item d-xl-inline-flex d-none">
							<a href="#" data-provide="fullscreen"
								class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon"
								title="Full Screen">
								<i data-feather="maximize"></i>
							</a>
						</li>
						<li class="btn-group nav-item d-xl-inline-flex d-none">
							<a href="#" data-toggle="control-sidebar" title="Setting"
								class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon">
								<i data-feather="sliders"></i>
							</a>
						</li>
						<li class="dropdown user user-menu">
							<a href="#"
								class="waves-effect waves-light dropdown-toggle w-auto l-h-12 bg-transparent p-0 no-shadow"
								title="User" data-bs-toggle="modal" data-bs-target="#quick_user_toggle">
								<img src="https://solar-admin-template.multipurposethemes.com/bs5/images/avatar/avatar-13.png"
									class="avatar rounded-circle bg-primary-light h-40 w-40" alt="" />
							</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<aside class="main-sidebar">
			<section class="sidebar position-relative">
				<div class="multinav">
					<div class="multinav-scroll" style="height: 99%;">
						<ul class="sidebar-menu" data-widget="tree">
							<li class="header fs-10 m-0 text-uppercase">Dashboard</li>
							<li>
								<a href="{{route('Admin.index')}}">
									<i data-feather="home"></i>
									<span>Dashboard</span>
								</a>
							</li>
							<li>
								<a href="{{route('performance.performance')}}">
									<i data-feather="align-justify"></i>
									<span>Performance</span>
								</a>
							</li>
							@if(auth()->check() && auth()->user()->role && auth()->user()->role->isAdmin())
							<li>
								<a href="{{route('users.add')}}">
									<i data-feather="users"></i>
									<span>User Management</span>
								</a>
							</li>
							@endif
						</ul>
					</div>
				</div>
			</section>
		</aside>


		<div class="content-wrapper">
			<div class="container-full">
				<section class="content">
					<div class="row">
						<div class="col-xxl-6 col-xl-8 col-lg-8 col-12">
							<div class="box box-body pull-up solar">
								<div class="d-flex justify-content-around align-items-center">
									<div>
										<img src="https://solar-admin-template.multipurposethemes.com/bs5/images/solar-power.png" class="w-160 h-160" alt="Solar Power">
									</div>
									<div style="margin: 20px; padding: 15px; border: 1px solid #ccc; border-radius: 10px; background-color: #f9f9f9; box-shadow: 2px 2px 8px rgba(0,0,0,0.1); max-width: 300px;">
										<h5 style="margin-bottom: 10px; font-size: 1.2rem; color: #333;">Weather Forecasting</h5>
										<p id="weather-description" style="margin: 5px 0; color: #555;">Loading...</p>
										<p id="temperature" style="margin: 5px 0; font-weight: bold; color: #222;"></p>
										<p id="clouds" style="margin: 5px 0; color: #555;"></p>
									</div>

								</div>
							</div>
						</div>

						<div class="col-xxl-6 col-xl-8 col-lg-8 col-12">
							<div class="box box-body pull-up">
								<div class="d-flex justify-content-center align-items-center">
									<div class="text-center">
										<i class="fas fa-sun fa-5x text-warning"></i>
										<h4 class="mt-3">UV Intensity</h4>
										<h2 id="uv-intensity" class="text-dark">Loading...</h2>
										<small class="text-fade">Level: Low / Moderate / High</small>
									</div>
								</div>
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col-xxl-6 col-xl-12 col-12">
							<div class="box">
								<div class="box-header">
									<div class="d-flex justify-content-between align-items-center">
										<h4 class="box-title">Performance Details</h4>
										<ul class="box-controls pull-right d-md-flex d-none">
											<li class="dropdown">
												<button class="dropdown-toggle btn btn-warning-light px-10" data-bs-toggle="dropdown" aria-expanded="false">Today</button>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item active" href="#">Today</a>
													<a class="dropdown-item" href="#">Yesterday</a>
													<a class="dropdown-item" href="#">Monthly</a>
													<a class="dropdown-item" href="#">Last month</a>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<div class="box-body">
									<div id="basic-pie" class="h-200" style="min-height: 300px;"></div>
								</div>
							</div>
						</div>

						<div class="col-xxl-6 col-xl-12 col-12">
							<div class="box">
								<div class="box-header">
									<div class="d-flex justify-content-between align-items-center">
										<h4 class="box-title">Generation Details</h4>
										<ul class="box-controls pull-right d-md-flex d-none">
											<li class="dropdown">
												<button id="timeFrameButton" class="dropdown-toggle btn btn-warning-light px-10" data-bs-toggle="dropdown" aria-expanded="false">
													Today
												</button>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item active" href="#" data-timeframe="thismonth">This Month</a>
													<a class="dropdown-item" href="#" data-timeframe="lastmonth">Last Month</a>
													<a class="dropdown-item" href="#" data-timeframe="last3months">Last 3 Months</a>
													<a class="dropdown-item" href="#" data-timeframe="last6months">Last 6 Months</a>
													<a class="dropdown-item" href="#" data-timeframe="year">This Year</a>

												</div>
											</li>
										</ul>
									</div>
								</div>
								<div class="box-body">
									<div id="chart" class="h-300"></div>
								</div>
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col-xl-6 col-lg-12 col-12">
							<div class="box">
								<div class="box-header">
									<h4 class="box-title">Device Performance</h4>
									<ul class="box-controls pull-right d-md-flex d-none">
										<li class="dropdown">
											<button class="dropdown-toggle btn btn-warning-light px-10" data-bs-toggle="dropdown" aria-expanded="false">Today</button>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item active" href="#">Today</a>
												<a class="dropdown-item" href="#">Yesterday</a>
												<a class="dropdown-item" href="#">Monthly</a>
												<a class="dropdown-item" href="#">Last month</a>
											</div>
										</li>
									</ul>
								</div>
								<div class="box-body">
									<div id="charts_widget_1_chart" class="h-300"></div>
								</div>
							</div>
						</div>

						<div class="col-xl-6 col-lg-12 col-12">
							<div class="box">
								<div class="box-header">
									<h4 class="box-title">Power Statistics</h4>
								</div>
								<div class="box-body">
									<div class="d-flex justify-content-between align-items-center">
										<p class="mb-0 text-fade">
											<span class="badge badge-md badge-dot" style="background-color:#008ffb;"></span> Inverter Power
										</p>
										<p class="mb-0 text-fade">
											<span class="badge badge-md badge-dot" style="background-color:#00e396;"></span> Feed-in Power
										</p>
										<p class="mb-0 text-fade">
											<span class="badge badge-md badge-dot" style="background-color:#feb019;"></span> Load Power
										</p>
									</div>
									<div class="d-flex justify-content-between align-items-center">
										<h3 id="inverter-power" class="mb-0">Loading... <small>kW</small></h3>
										<h3 id="feedin-power" class="mb-0">Loading... <small>kW</small></h3>
										<h3 id="load-power" class="mb-0">Loading... <small>kW</small></h3>
									</div>
									<div id="chart2" class="h-200"></div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
		<script>
			document.addEventListener('DOMContentLoaded', () => {
				const CONFIG = {
					TIME_FRAMES: {
						today: 'Today',
						yesterday: 'Yesterday',
						month: 'Monthly',
						thismonth: 'This Month',
						lastmonth: 'Last Month',
						last3months: 'Last 3 Months',
						last6months: 'Last 6 Months',
						year: 'This Year'
					},
					CHART_HEIGHT: 300,
					COLORS: ['#008ffb', '#00e396', '#feb019', '#ff4560'],
					DEBOUNCE_MS: 300,
					APEXCHARTS_MAX_ATTEMPTS: 20,
					APEXCHARTS_INTERVAL_MS: 500,
					WEATHER_REFRESH_INTERVAL: 1800000 // 30 minutes
				};

				const charts = {
					performance: null,
					devicePerformance: null,
					generation: null,
					powerStatistics: null
				};

				function debounce(fn, ms) {
					let timeoutId;
					return (...args) => {
						clearTimeout(timeoutId);
						timeoutId = setTimeout(() => fn.apply(this, args), ms);
					};
				}

				async function fetchData(endpoint, params = '') {
					try {
						const response = await fetch(`${endpoint}${params}`, {
							headers: {
								'Accept': 'application/json'
							}
						});
						if (!response.ok) {
							throw new Error(`API ${endpoint} failed: ${response.status}`);
						}
						return await response.json();
					} catch (error) {
						console.error(`Fetch error for ${endpoint}:`, error.message);
						throw error;
					}
				}

				function updateTextContent(elementId, value, unit = '') {
					const element = document.getElementById(elementId);
					if (element) {
						element.innerHTML = `${value} <small>${unit}</small>`;
					} else {
						console.warn(`Element #${elementId} not found`);
					}
				}

				function renderChart(elementId, options, existingChart = null) {
					const element = document.getElementById(elementId);
					if (!element) {
						console.warn(`Chart container #${elementId} not found`);
						return null;
					}
					try {
						element.innerHTML = '';
						if (existingChart) {
							existingChart.destroy();
						}
						const chart = new ApexCharts(element, options);
						chart.render();
						return chart;
					} catch (error) {
						console.error(`Error rendering chart ${elementId}:`, error);
						return null;
					}
				}

				function updateDropdownUI(timeFrame, dropdownButton, dropdownItems) {
					if (dropdownButton) {
						dropdownButton.textContent = CONFIG.TIME_FRAMES[timeFrame.toLowerCase()] || timeFrame;
						dropdownItems?.forEach(item => {
							item.classList.toggle('active',
								item.textContent.toLowerCase().replace(' ', '') === timeFrame.toLowerCase());
						});
					}
				}

				function waitForApexCharts(callback) {
					let attempts = 0;
					const interval = setInterval(() => {
						attempts++;
						if (typeof ApexCharts !== 'undefined') {
							clearInterval(interval);
							callback();
						} else if (attempts >= CONFIG.APEXCHARTS_MAX_ATTEMPTS) {
							clearInterval(interval);
							console.error('ApexCharts not loaded');
						}
					}, CONFIG.APEXCHARTS_INTERVAL_MS);
				}

				async function updateWeatherForecast() {
					const weatherDescElement = document.getElementById('weather-description');
					const temperatureElement = document.getElementById('temperature');
					const cloudsElement = document.getElementById('clouds');

					if (!weatherDescElement) {
						console.error('Weather description element not found');
						return;
					}

					try {
						weatherDescElement.textContent = 'Loading...';
						const data = await fetchData('/api/weather-forecast');

						if (data.weather) {
							weatherDescElement.textContent = `Condition: ${data.weather.description}`;
							if (temperatureElement) temperatureElement.textContent = `Temperature: ${data.weather.temperature}°C`;
							if (cloudsElement) cloudsElement.textContent = `Cloud Cover: ${data.weather.clouds}%`;
							console.log('Weather forecast updated successfully');
						} else {
							throw new Error('Invalid weather data');
						}
					} catch (error) {
						weatherDescElement.textContent = 'Weather unavailable';
						console.error('Weather update error:', error.message);
					}
				}

				async function updateUVIntensity() {
					const uvIntensityElement = document.getElementById('uv-intensity');
					const uvLevelElement = uvIntensityElement?.parentElement?.querySelector('small.text-fade');
					if (!uvIntensityElement || !uvLevelElement) return;

					try {
						uvIntensityElement.textContent = 'Loading...';
						uvLevelElement.textContent = 'Level: ...';

						const data = await fetchData(`/api/uv-intensity?_=${Date.now()}`);

						if (data.status !== 'success') {
							throw new Error(data.error || 'Invalid UV data');
						}

						uvIntensityElement.textContent = parseFloat(data.uvIndex).toFixed(1);
						uvLevelElement.textContent = `Level: ${data.uvIntensity}`;

						const levelColors = {
							'Low': 'text-success',
							'Moderate': 'text-warning',
							'High': 'text-orange-500',
							'Very High': 'text-danger',
							'Extreme': 'text-danger'
						};

						Object.values(levelColors).forEach(color =>
							uvIntensityElement.classList.remove(color));
						uvIntensityElement.classList.add(levelColors[data.uvIntensity] || '');

						// Remove reload button if present
						const reloadBtn = document.getElementById('uv-reload');
						if (reloadBtn) reloadBtn.remove();
					} catch (error) {
						uvIntensityElement.textContent = 'N/A';
						uvLevelElement.textContent = 'Level: Unavailable';

						const parent = uvLevelElement.parentElement;
						if (parent && !document.getElementById('uv-reload')) {
							const reloadBtn = document.createElement('button');
							reloadBtn.id = 'uv-reload';
							reloadBtn.className = 'btn btn-sm btn-outline-secondary ms-2';
							reloadBtn.innerHTML = '<i class="fas fa-sync-alt"></i>';
							reloadBtn.title = 'Retry UV data';
							reloadBtn.addEventListener('click', updateUVIntensity);
							parent.appendChild(reloadBtn);
						}
					}
				}

				const updatePerformanceChart = debounce(async (timeFrame = 'today') => {
					try {
						const data = await fetchData(`/api/performance-details?time_frame=${timeFrame}`);
						const options = {
							chart: {
								type: 'pie',
								height: CONFIG.CHART_HEIGHT
							},
							series: Object.values(data),
							labels: Object.keys(data).map(cat =>
								cat.charAt(0).toUpperCase() + cat.slice(1)),
							colors: CONFIG.COLORS,
							responsive: [{
								breakpoint: 480,
								options: {
									chart: {
										width: 200
									},
									legend: {
										position: 'bottom'
									}
								}
							}]
						};
						charts.performance = renderChart('basic-pie', options, charts.performance);
					} catch (error) {
						console.error('Performance chart error:', error.message);
					}
				}, CONFIG.DEBOUNCE_MS);

				const updateGenerationChart = debounce(async (timeFrame = 'month') => {
					try {
						const response = await fetchData(`/api/generation-details?time_frame=${timeFrame}`);
						if (!response?.data) throw new Error('Invalid generation data');

						const options = {
							chart: {
								type: 'line',
								height: CONFIG.CHART_HEIGHT
							},
							series: [{
									name: 'Production (mWh)',
									data: response.data.map(d => d.total_production)
								},
								{
									name: 'Consumption (mWh)',
									data: response.data.map(d => d.total_consumption)
								}
							],
							xaxis: {
								categories: response.data.map(d => d.month),
								title: {
									text: 'Time'
								}
							},
							yaxis: {
								title: {
									text: 'mWh'
								}
							},
							colors: CONFIG.COLORS,
							tooltip: {
								y: {
									formatter: val => `${val} mWh`
								}
							}
						};
						charts.generation = renderChart('chart', options, charts.generation);
					} catch (error) {
						console.error('Generation chart error:', error.message);
					}
				}, CONFIG.DEBOUNCE_MS);

				const updateDevicePerformanceChart = debounce(async (timeFrame = 'today') => {
					try {
						const data = await fetchData(`/api/device-performance?time_frame=${timeFrame}`);
						const options = {
							chart: {
								type: 'bar',
								height: CONFIG.CHART_HEIGHT
							},
							series: [{
								name: 'Performance',
								data: data.devices.map(d => d.performance)
							}],
							xaxis: {
								categories: data.devices.map(d => d.name),
								title: {
									text: 'Device'
								}
							},
							yaxis: {
								title: {
									text: 'Performance (%)'
								}
							},
							colors: [CONFIG.COLORS[0]],
							responsive: [{
								breakpoint: 480,
								options: {
									chart: {
										width: '100%'
									},
									legend: {
										position: 'bottom'
									}
								}
							}]
						};
						charts.devicePerformance = renderChart('charts_widget_1_chart', options, charts.devicePerformance);
					} catch (error) {
						console.error('Device performance chart error:', error.message);
					}
				}, CONFIG.DEBOUNCE_MS);

				async function updatePowerStatistics() {
					try {
						const data = await fetchData('/api/power-statistics');
						updateTextContent('inverter-power', data.inverter_power, 'kW');
						updateTextContent('feedin-power', data.feed_in_power, 'kW');
						updateTextContent('load-power', data.load_power, 'kW');

						const options = {
							chart: {
								type: 'area',
								height: 200,
								stacked: false
							},
							series: [{
									name: 'Inverter Power',
									data: [data.inverter_power]
								},
								{
									name: 'Feed-in Power',
									data: [data.feed_in_power]
								},
								{
									name: 'Load Power',
									data: [data.load_power]
								}
							],
							xaxis: {
								categories: ['Latest'],
								title: {
									text: 'Time'
								}
							},
							yaxis: {
								title: {
									text: 'Power (kW)'
								}
							},
							colors: CONFIG.COLORS.slice(0, 3),
							fill: {
								opacity: [0.85, 0.85, 0.85]
							},
							responsive: [{
								breakpoint: 480,
								options: {
									chart: {
										width: '100%'
									},
									legend: {
										position: 'bottom'
									}
								}
							}]
						};
						charts.powerStatistics = renderChart('chart2', options, charts.powerStatistics);
					} catch (error) {
						console.error('Power statistics error:', error.message);
					}
				}

				function initializeDashboard() {
					updatePowerStatistics();
					updateWeatherForecast();
					updateUVIntensity();

					setInterval(() => {
						updateWeatherForecast();
						updateUVIntensity();
					}, CONFIG.WEATHER_REFRESH_INTERVAL);

					const chartConfigs = [{
							id: 'basic-pie',
							updateFn: updatePerformanceChart
						},
						{
							id: 'charts_widget_1_chart',
							updateFn: updateDevicePerformanceChart
						},
						{
							id: 'chart',
							updateFn: updateGenerationChart
						}
					];

					chartConfigs.forEach(({
						id,
						updateFn
					}) => {
						const chartElement = document.getElementById(id);
						if (!chartElement) return;

						const box = chartElement.closest('.box');
						const dropdownButton = box?.querySelector('.dropdown-toggle');
						const dropdownItems = box?.querySelectorAll('.dropdown-menu .dropdown-item');

						const defaultTimeFrame = id === 'chart' ? 'month' : 'today';
						updateDropdownUI(defaultTimeFrame, dropdownButton, dropdownItems);
						updateFn(defaultTimeFrame);

						dropdownItems?.forEach(item => {
							item.addEventListener('click', e => {
								e.preventDefault();
								const timeFrame = item.dataset.timeframe ||
									item.textContent.toLowerCase().replace(' ', '');
								updateDropdownUI(timeFrame, dropdownButton, dropdownItems);
								updateFn(timeFrame);
							});
						});
					});
				}

				waitForApexCharts(initializeDashboard);
			});
		</script>


		<footer class="main-footer bt-1">
			<div class="pull-right d-none d-sm-inline-block">
				<ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
					<li class="nav-item">
						<a class="nav-link" href="#" target="_blank">Purchase Now</a>
					</li>
				</ul>
			</div>
			&copy; <script>
				document.write(new Date().getFullYear())
			</script>
		</footer>

		<!-- <div class="modal modal-right fade" id="quick_user_toggle" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content slim-scroll3">
					<div class="modal-body p-30 bg-white">
						<div class="d-flex align-items-center mb-15 justify-content-between pb-30">
							<h4 class="m-0">User Profile
								<small class="text-fade fs-12 ms-5">12 messages</small>
							</h4>
							<a href="#" class="btn btn-icon btn-danger-light btn-sm no-shadow" data-bs-dismiss="modal">
								<span class="fa fa-close"></span>
							</a>
						</div>
						<div>
							<div class="d-flex flex-row">
								<div class=""><img src="https://solar-admin-template.multipurposethemes.com/bs5/images/avatar/avatar-13.png" alt="user" class="rounded bg-danger-light w-150" width="100"></div>
								<div class="ps-20">
									<h5 class="mb-0">Nil Yeager</h5>
									<p class="my-5 text-fade">Manager</p>
									<a href="mailto:dummy@gmail.com"><span class="icon-Mail-notification me-5 text-success"><span class="path1"></span><span class="path2"></span></span> dummy@gmail.com</a>
									<button class="btn btn-success-light btn-sm mt-5"><i class="ti-plus"></i> Follow</button>
								</div>
							</div>
						</div>
						<div class="dropdown-divider my-30"></div>
						<div>
							<div class="d-flex align-items-center mb-30">
								<div class="me-15 bg-primary-light h-50 w-50 l-h-60 rounded text-center">
									<span class="icon-Library fs-24"><span class="path1"></span><span class="path2"></span></span>
								</div>
								<div class="d-flex flex-column fw-500">
									<a href="extra_profile.html" class="text-dark hover-primary mb-1 fs-16">My Profile</a>
									<span class="text-fade">Account settings and more</span>
								</div>
							</div>
							<div class="d-flex align-items-center mb-30">
								<div class="me-15 bg-danger-light h-50 w-50 l-h-60 rounded text-center">
									<span class="icon-Write fs-24"><span class="path1"></span><span class="path2"></span></span>
								</div>
								<div class="d-flex flex-column fw-500">
									<a href="mailbox.html" class="text-dark hover-danger mb-1 fs-16">My Messages</a>
									<span class="text-fade">Inbox and tasks</span>
								</div>
							</div>
							<div class="d-flex align-items-center mb-30">
								<div class="me-15 bg-success-light h-50 w-50 l-h-60 rounded text-center">
									<span class="icon-Group-chat fs-24"><span class="path1"></span><span class="path2"></span></span>
								</div>
								<div class="d-flex flex-column fw-500">
									<a href="setting.html" class="text-dark hover-success mb-1 fs-16">Settings</a>
									<span class="text-fade">Accout Settings</span>
								</div>
							</div>
							<div class="d-flex align-items-center mb-30">
								<div class="me-15 bg-info-light h-50 w-50 l-h-60 rounded text-center">
									<span class="icon-Attachment1 fs-24"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
								</div>
								<div class="d-flex flex-column fw-500">
									<form action="{{ route('logout') }}" method="POST">
										@csrf
										<button type="submit" class="text-dark hover-info mb-1 fs-16 btn btn-link">Logout</button>
									</form>
								</div>
							</div>

						</div>


					</div>
				</div>
			</div>
		</div> -->
	</div>
	<div class="chat-container">
		<button class="chat-toggle-btn" id="chat-toggle-btn">
			<i class="fa fa-comment"></i>
		</button>
		<div class="chat-window" id="chat-window">
			<div class="chat-header">
				<span>Chat</span>
				<button class="chat-toggle-btn" id="chat-close-btn">
					<i class="fa fa-times"></i>
				</button>
			</div>
			<div class="chat-body" id="chat-body">
				<div class="chat-message other">
					How is your solar system doing?
				</div>
				<div class="chat-message user">
					Just checking in!
				</div>
			</div>
			<div class="chat-input-area">
				<input type="text" id="chat-input" placeholder="Type a message...">
				<button id="chat-send-btn">Send</button>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
	<script src="/assets/js/vendors.min.js"></script>
	<!-- <script src="/assets/js/chat-popup.js"></script> -->
	<script src="/assets/js/feather.min.js"></script>
	<!-- <script src="/assets/js/echarts-en.min.js"></script> -->
	<script src="/assets/js/apexcharts.js"></script>
	<script src="/assets/js/demo.js"></script>
	<script src="/assets//js/template.js"></script>
	<script src="/assets/js/performance.js"></script>
	<script src="/assets/js/slider.js"></script>
	<script src="/assets/js/range-sliders.init.js"></script>
</body>

</html>