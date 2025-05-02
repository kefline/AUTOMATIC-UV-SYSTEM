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
						<li class="dropdown notifications-menu btn-group">
							<label class="switch">
								<a class="waves-effect waves-light btn-primary-light svg-bt-icon">
									<input type="checkbox" data-mainsidebarskin="toggle" id="toggle_left_sidebar_skin">
									<span class="switch-on"><i data-feather="moon"></i></span>
									<span class="switch-off"><i data-feather="sun"></i></span>
								</a>
							</label>
						</li>
						<li class="dropdown notifications-menu btn-group ">
							<a href="#" class="waves-effect waves-light btn-primary-light svg-bt-icon" data-bs-toggle="dropdown" title="Notifications">
								<i data-feather="bell"></i>
								<div class="pulse-wave"></div>
							</a>
							<ul class="dropdown-menu animated bounceIn">
								<li class="header">
									<div class="p-20">
										<div class="flexbox">
											<div>
												<h4 class="mb-0 mt-0">Notifications</h4>
											</div>
											<div>
												<a href="#" class="text-danger">Clear All</a>
											</div>
										</div>
									</div>
								</li>
								<li>
									<ul class="menu sm-scrol">
										<li>
											<a href="#">
												<i class="fa fa-users text-info"></i> Curabitur id eros quis nunc suscipit blandit.
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-warning text-warning"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-shopping-cart text-success"></i> In gravida mauris et nisi
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-user text-danger"></i> Praesent eu lacus in libero dictum fermentum.
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-user text-primary"></i> Nunc fringilla lorem
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
											</a>
										</li>
									</ul>
								</li>
								<li class="footer">
									<a href="component_notification.html">View all</a>
								</li>
							</ul>
						</li>
						<li class="btn-group nav-item d-xl-inline-flex d-none">
							<a href="#" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon" title="" id="live-chat">
								<i data-feather="message-circle"></i>
							</a>
						</li>

						<li class="btn-group d-xl-inline-flex d-none">
							<a href="#" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon dropdown-toggle" data-bs-toggle="dropdown">
								<img class="rounded" src="https://solar-admin-template.multipurposethemes.com/bs5/images/svg-icon/usa.svg" alt="">
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item my-5" href="#"><img class="w-20 rounded me-10" src="https://solar-admin-template.multipurposethemes.com/bs5/images/svg-icon/usa.svg" alt=""> English</a>
								<a class="dropdown-item my-5" href="#"><img class="w-20 rounded me-10" src="https://solar-admin-template.multipurposethemes.com/bs5/images/svg-icon/spain.svg" alt=""> Spanish</a>
								<a class="dropdown-item my-5" href="#"><img class="w-20 rounded me-10" src="https://solar-admin-template.multipurposethemes.com/bs5/images/svg-icon/ger.svg" alt=""> German</a>
								<a class="dropdown-item my-5" href="#"><img class="w-20 rounded me-10" src="https://solar-admin-template.multipurposethemes.com/bs5/images/svg-icon/jap.svg" alt=""> Japanese</a>
								<a class="dropdown-item my-5" href="#"><img class="w-20 rounded me-10" src="https://solar-admin-template.multipurposethemes.com/bs5/images/svg-icon/fra.svg" alt=""> French</a>
							</div>
						</li>

						<li class="btn-group nav-item d-xl-inline-flex d-none">
							<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon" title="Full Screen">
								<i data-feather="maximize"></i>
							</a>
						</li>
						<!-- Control Sidebar Toggle Button -->
						<li class="btn-group nav-item d-xl-inline-flex d-none">
							<a href="#" data-toggle="control-sidebar" title="Setting" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon">
								<i data-feather="sliders"></i>
							</a>
						</li>

						<!-- User Account-->
						<li class="dropdown user user-menu">
							<a href="#" class="waves-effect waves-light dropdown-toggle w-auto l-h-12 bg-transparent p-0 no-shadow" title="User" data-bs-toggle="modal" data-bs-target="#quick_user_toggle">
								<img src="https://solar-admin-template.multipurposethemes.com/bs5/images/avatar/avatar-13.png" class="avatar rounded-circle bg-primary-light h-40 w-40" alt="" />
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
						lastmonth: 'Last Month'
					},
					CHART_HEIGHT: 300,
					COLORS: ['#008ffb', '#00e396', '#feb019', '#ff4560'],
					DEBOUNCE_MS: 300,
					APEXCHARTS_MAX_ATTEMPTS: 20,
					APEXCHARTS_INTERVAL_MS: 500,
					WEATHER_REFRESH_INTERVAL: 1800000 // 30 minutes in milliseconds
				};

				// Chart instances
				const charts = {
					performance: null,
					generation: null,
					devicePerformance: null
				};

				// Utility: Debounce function to prevent rapid calls
				function debounce(fn, ms) {
					let timeoutId;
					return function(...args) {
						clearTimeout(timeoutId);
						timeoutId = setTimeout(() => fn.apply(this, args), ms);
					};
				}

				// Utility: Fetch data from API
				async function fetchData(endpoint, params = '') {
					try {
						const response = await fetch(`${endpoint}${params}`);
						if (!response.ok) {
							const errorText = await response.text();
							throw new Error(`API ${endpoint} failed: ${response.status} - ${errorText}`);
						}
						return response.json();
					} catch (error) {
						console.error(`Fetch error for ${endpoint}:`, error.message);
						throw error;
					}
				}

				// Utility: Update text content with unit
				function updateTextContent(elementId, value, unit = '') {
					const element = document.getElementById(elementId);
					if (element) element.innerHTML = `${value} <small>${unit}</small>`;
					else console.error(`Element #${elementId} not found`);
				}

				// Utility: Render ApexCharts
				function renderChart(elementId, options, existingChart = null) {
					const element = document.querySelector(`#${elementId}`);
					if (!element) {
						console.error(`Chart container #${elementId} not found`);
						return null;
					}
					try {
						element.innerHTML = '';
						if (existingChart) {
							console.log(`Destroying existing chart for ${elementId}`);
							existingChart.destroy();
						}
						const chart = new ApexCharts(element, options);
						chart.render();
						console.log(`Chart rendered for ${elementId}`);
						return chart;
					} catch (error) {
						console.error(`Error rendering chart ${elementId}:`, error);
						return null;
					}
				}

				// Utility: Update dropdown UI
				function updateDropdownUI(timeFrame, dropdownButton, dropdownItems) {
					if (!dropdownButton) {
						console.error('Dropdown button not found');
						return;
					}
					dropdownButton.textContent = CONFIG.TIME_FRAMES[timeFrame.toLowerCase()] || timeFrame;
					dropdownItems.forEach(item => {
						item.classList.toggle('active', item.textContent.toLowerCase().replace(' ', '') === timeFrame);
					});
				}

				// Utility: Wait for ApexCharts to load
				function waitForApexCharts(callback) {
					let attempts = 0;
					const checkApexCharts = setInterval(() => {
						attempts++;
						if (typeof ApexCharts !== 'undefined') {
							clearInterval(checkApexCharts);
							callback();
						} else if (attempts >= CONFIG.APEXCHARTS_MAX_ATTEMPTS) {
							clearInterval(checkApexCharts);
							console.error('ApexCharts not loaded after maximum attempts');
						}
					}, CONFIG.APEXCHARTS_INTERVAL_MS);
				}

				// Update weather forecast
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
						if (temperatureElement) temperatureElement.textContent = '';
						if (cloudsElement) cloudsElement.textContent = '';

						const data = await fetchData('/api/weather-forecast');

						if (data.weather) {
							weatherDescElement.textContent = `Condition: ${data.weather.description}`;
							if (temperatureElement) temperatureElement.textContent = `Temperature: ${data.weather.temperature}°C`;
							if (cloudsElement) cloudsElement.textContent = `Cloud Cover: ${data.weather.clouds}%`;
							console.log('Weather forecast updated successfully');
						} else {
							throw new Error('Invalid weather data format');
						}
					} catch (error) {
						console.error('Error updating weather forecast:', error.message);
						weatherDescElement.textContent = 'Weather information unavailable';
					}
				}

				// Update UV intensity
				async function updateUVIntensity() {
					const uvIntensityElement = document.getElementById('uv-intensity');
					const uvLevelElement = uvIntensityElement?.parentElement.querySelector('small.text-fade');

					if (!uvIntensityElement || !uvLevelElement) {
						console.error('UV intensity elements not found');
						return;
					}

					try {
						uvIntensityElement.textContent = 'Loading...';
						uvLevelElement.textContent = 'Level: ...';

						const response = await fetch('/uv-intensity');
						const data = await response.json();

						if (!response.ok) {
							throw new Error(data.error || 'Failed to fetch data');
						}

						if (data.uvIndex !== undefined && data.uvIntensity) {
							uvIntensityElement.textContent = data.uvIndex.toFixed(1);
							uvLevelElement.textContent = `Level: ${data.uvIntensity}`;
							console.log('UV intensity updated:', data);
						} else {
							throw new Error('Invalid UV data format');
						}
					} catch (error) {
						console.error('Error fetching UV data:', error.message);
						uvIntensityElement.textContent = 'N/A';
						uvLevelElement.textContent = 'Level: Unavailable';
					}
				}



				// Update performance pie chart
				const updatePerformanceChart = debounce(async (timeFrame = 'today') => {
					try {
						const data = await fetchData(`/api/performance-details?time_frame=${timeFrame}`);
						const categories = Object.keys(data);
						const values = Object.values(data);

						const options = {
							chart: {
								type: 'pie',
								height: CONFIG.CHART_HEIGHT
							},
							series: values,
							labels: categories.map(cat => cat.charAt(0).toUpperCase() + cat.slice(1)),
							colors: CONFIG.COLORS.slice(0, categories.length),
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
						console.error('Error updating performance chart:', error.message);
					}
				}, CONFIG.DEBOUNCE_MS);

				// Update generation line chart
				const updateGenerationChart = debounce(async (timeFrame = 'today') => {
					try {
						const data = await fetchData(`/api/generation-details?time_frame=${timeFrame}`);
						const options = {
							chart: {
								type: 'line',
								height: CONFIG.CHART_HEIGHT
							},
							series: [{
								name: 'Production',
								data: data.production
							}, {
								name: 'Consumption',
								data: data.consumption
							}],
							xaxis: {
								categories: data.dates,
								title: {
									text: 'Date'
								}
							},
							yaxis: {
								title: {
									text: 'kWh'
								}
							},
							colors: CONFIG.COLORS.slice(0, 2),
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
						charts.generation = renderChart('chart', options, charts.generation);
					} catch (error) {
						console.error('Error updating generation chart:', error.message);
					}
				}, CONFIG.DEBOUNCE_MS);

				// Update device performance bar chart
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
								data: data.devices.map(device => device.performance)
							}],
							xaxis: {
								categories: data.devices.map(device => device.name),
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
						console.error('Error updating device performance chart:', error.message);
					}
				}, CONFIG.DEBOUNCE_MS);

				// Update power statistics area chart
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
							}, {
								name: 'Feed-in Power',
								data: [data.feed_in_power]
							}, {
								name: 'Load Power',
								data: [data.load_power]
							}],
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
						renderChart('chart2', options);
					} catch (error) {
						console.error('Error updating power statistics:', error.message);
					}
				}

				// Initialize dashboard
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
					}, {
						id: 'chart',
						updateFn: updateGenerationChart
					}, {
						id: 'charts_widget_1_chart',
						updateFn: updateDevicePerformanceChart
					}];

					chartConfigs.forEach(({
						id,
						updateFn
					}) => {
						const chartElement = document.getElementById(id);
						if (!chartElement) {
							console.error(`Chart container #${id} not found`);
							return;
						}

						const dropdownButton = chartElement.closest('.box')?.querySelector('.dropdown-toggle');
						const dropdownItems = chartElement.closest('.box')?.querySelectorAll('.dropdown-menu .dropdown-item');

						if (!dropdownItems?.length) {
							console.error(`No dropdown items found for chart ${id}`);
							return;
						}

						const defaultTimeFrame = 'today';
						updateDropdownUI(defaultTimeFrame, dropdownButton, dropdownItems);
						updateFn(defaultTimeFrame);

						dropdownItems.forEach(item => {
							const newItem = item.cloneNode(true);
							item.parentNode.replaceChild(newItem, item);
							newItem.addEventListener('click', e => {
								e.preventDefault();
								const timeFrame = newItem.textContent.toLowerCase().replace(' ', '');
								console.log(`Time frame changed for ${id}: ${timeFrame}`);
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

		<div class="modal modal-right fade" id="quick_user_toggle" tabindex="-1">
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
		</div>
	</div>
	<div id="chat-box-body">
		<div id="chat-circle" class="waves-effect waves-circle btn btn-circle btn-sm btn-warning l-h-50">
			<div id="chat-overlay"></div>
			<span class="icon-Group-chat fs-18"><span class="path1"></span><span class="path2"></span></span>
		</div>

		<div class="chat-box">
			<div class="chat-box-header p-15 d-flex justify-content-between align-items-center">
				<div class="btn-group">
					<button class="waves-effect waves-circle btn btn-circle btn-primary-light h-40 w-40 rounded-circle l-h-50" type="button" data-bs-toggle="dropdown">
						<span class="icon-Add-user fs-22"><span class="path1"></span><span class="path2"></span></span>
					</button>
					<div class="dropdown-menu min-w-200">
						<a class="dropdown-item fs-16" href="#">
							<span class="icon-Color me-15"></span>
							New Group</a>
						<a class="dropdown-item fs-16" href="#">
							<span class="icon-Clipboard me-15"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
							Contacts</a>
						<a class="dropdown-item fs-16" href="#">
							<span class="icon-Group me-15"><span class="path1"></span><span class="path2"></span></span>
							Groups</a>
						<a class="dropdown-item fs-16" href="#">
							<span class="icon-Active-call me-15"><span class="path1"></span><span class="path2"></span></span>
							Calls</a>
						<a class="dropdown-item fs-16" href="#">
							<span class="icon-Settings1 me-15"><span class="path1"></span><span class="path2"></span></span>
							Settings</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item fs-16" href="#">
							<span class="icon-Question-circle me-15"><span class="path1"></span><span class="path2"></span></span>
							Help</a>
						<a class="dropdown-item fs-16" href="#">
							<span class="icon-Notifications me-15"><span class="path1"></span><span class="path2"></span></span>
							Privacy</a>
					</div>
				</div>
				<div class="text-center flex-grow-1">
					<div class="text-dark fs-18">Mayra Sibley</div>
					<div>
						<span class="badge badge-sm badge-dot badge-primary"></span>
						<span class="text-muted fs-12">Active</span>
					</div>
				</div>
				<div class="chat-box-toggle">
					<button id="chat-box-toggle" class="waves-effect waves-circle btn btn-circle btn-danger-light h-40 w-40 rounded-circle l-h-50" type="button">
						<span class="icon-Close fs-22"><span class="path1"></span><span class="path2"></span></span>
					</button>
				</div>
			</div>
			<div class="chat-box-body">
				<div class="chat-box-overlay">
				</div>
				<div class="chat-logs">
					<div class="chat-msg user">
						<div class="d-flex align-items-center">
							<span class="msg-avatar">
								<img src="https://solar-admin-template.multipurposethemes.com/bs5/images/avatar/2.jpg" class="avatar avatar-lg" alt="">
							</span>
							<div class="mx-10">
								<a href="#" class="text-dark hover-primary fw-bold">Mayra Sibley</a>
								<p class="text-muted fs-12 mb-0">2 Hours</p>
							</div>
						</div>
						<div class="cm-msg-text">
							Hi there, I'm Jesse and you?
						</div>
					</div>
					<div class="chat-msg self">
						<div class="d-flex align-items-center justify-content-end">
							<div class="mx-10">
								<a href="#" class="text-dark hover-primary fw-bold">You</a>
								<p class="text-muted fs-12 mb-0">3 minutes</p>
							</div>
							<span class="msg-avatar">
								<img src="https://solar-admin-template.multipurposethemes.com/bs5/images/avatar/3.jpg" class="avatar avatar-lg" alt="">
							</span>
						</div>
						<div class="cm-msg-text">
							My name is Anne Clarc.
						</div>
					</div>
					<div class="chat-msg user">
						<div class="d-flex align-items-center">
							<span class="msg-avatar">
								<img src="https://solar-admin-template.multipurposethemes.com/bs5/images/avatar/2.jpg" class="avatar avatar-lg" alt="">
							</span>
							<div class="mx-10">
								<a href="#" class="text-dark hover-primary fw-bold">Mayra Sibley</a>
								<p class="text-muted fs-12 mb-0">40 seconds</p>
							</div>
						</div>
						<div class="cm-msg-text">
							Nice to meet you Anne.<br>How can i help you?
						</div>
					</div>
				</div><!--chat-log -->
			</div>
			<div class="chat-input">
				<form>
					<input type="text" id="chat-input" placeholder="Send a message..." />
					<button type="submit" class="chat-submit" id="chat-submit">
						<span class="icon-Send fs-22"></span>
					</button>
				</form>
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