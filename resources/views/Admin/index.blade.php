<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="https://solar-admin-template.multipurposethemes.com/bs5/images/favicon.ico">

	<title>Dashboard</title>

	<link rel="stylesheet"
		href="https://solar-admin-template.multipurposethemes.com/bs5/template/vertical/src/css/vendors_css.css">
	<!-- <link href="/assets/css/all.min.css" rel="stylesheet"> -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">



	<link rel="stylesheet" href="/assets/css/style.css">
	<link rel="stylesheet" href="/assets/css/skin_color.css">
	<link rel="stylesheet" href="/assets/css/custom.css">
	<link href="/assets/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

	<div class="wrapper">
		<div id="loader"></div>

		<header class="main-header">
			<div class="d-flex align-items-center logo-box justify-content-start">
				<a href="index.html" class="logo">
					<div class="logo-mini w-40">
						<span class="light-logo"><img
								src="https://solar-admin-template.multipurposethemes.com/bs5/images/logo-letter.png"
								alt="logo"></span>
						<span class="dark-logo"><img
								src="https://solar-admin-template.multipurposethemes.com/bs5/images/logo-white-letter.png"
								alt="logo"></span>
					</div>
					<div class="logo-lg">
						<span class="light-logo"><img
								src="https://solar-admin-template.multipurposethemes.com/bs5/images/logo-light-text.png"
								alt="logo"></span>
						<span class="dark-logo"><img
								src="https://solar-admin-template.multipurposethemes.com/bs5/images/logo-text.png"
								alt="logo"></span>
					</div>
				</a>
			</div>
			<nav class="navbar navbar-static-top">
				<div class="app-menu">
					<ul class="header-megamenu nav">
						<li class="btn-group nav-item">
							<a href="#" class="waves-effect waves-light nav-link push-btn btn-primary-light"
								data-toggle="push-menu" role="button">
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
							<a href="#" class="waves-effect waves-light btn-primary-light svg-bt-icon"
								data-bs-toggle="dropdown" title="Notifications">
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
												<i class="fa fa-users text-info"></i> Curabitur id eros quis nunc
												suscipit blandit.
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-warning text-warning"></i> Duis malesuada justo eu
												sapien elementum, in semper diam posuere.
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor
												commodo porttitor pretium a erat.
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-shopping-cart text-success"></i> In gravida mauris et
												nisi
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-user text-danger"></i> Praesent eu lacus in libero
												dictum fermentum.
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-user text-primary"></i> Nunc fringilla lorem
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam
												interdum, at scelerisque ipsum imperdiet.
											</a>
										</li>
									</ul>
								</li>
								<li class="footer">
									<a href="#">View all</a>
								</li>
							</ul>
						</li>
						<li class="btn-group nav-item d-xl-inline-flex d-none">
							<a href="#" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon" title=""
								id="live-chat">
								<i data-feather="message-circle"></i>
							</a>
						</li>

						<li class="btn-group d-xl-inline-flex d-none">
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
						<div class="col-xxl-4 col-xl-6 col-lg-6 col-12 ">
							<div class="box box-body pull-up">
								<div class="row">
									<div class="col-7">
										<div>
											<h4 class="fw-500">Solar Efficiency</h4>
											<div class="d-flex  align-items-center">
												<p><span class="badge badge-md badge-dot"
														style="background-color:#fc696a;"></span> High</p>
												<p><span class="badge badge-md badge-dot ms-5"
														style="background-color:#51ce8a;"></span> Moderate</p>
												<p><span class="badge badge-md badge-dot ms-5"
														style="background-color:#ff9920;"></span> Low</p>
											</div>
											<h2 class="fw-600 mb-0">60%</h2>
										</div>
									</div>
									<div class="col-5">
										<div>
											<div id="chart-container" class="mb-0"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-xl-6 col-lg-6 col-12 ">
							<div class="box box-body pull-up">
								<div class="row">
									<div class="col-7">
										<div>
											<h4 class="fw-500">Power Generation</h4>
											<div class="d-flex  align-items-center">
												<p><span class="badge badge-md badge-dot"
														style="background-color:#fc696a;"></span> High</p>
												<p><span class="badge badge-md badge-dot ms-5"
														style="background-color:#51ce8a;"></span> Moderate</p>
												<p><span class="badge badge-md badge-dot ms-5"
														style="background-color:#ff9920;"></span> Low</p>
											</div>
											<h2 class="fw-600 mb-0">6.5 Kw</h2>
										</div>
									</div>
									<div class="col-5">
										<div>
											<div id="chart-conta" class="mb-0"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-xl-12 col-lg-12 col-12 ">
							<div class="box box-body pull-up">
								<div class="row">
									<div class="col-7">
										<div>
											<h4 class="fw-500">Energy Consumed</h4>
											<div class="d-flex  align-items-center">
												<p><span class="badge badge-md badge-dot"
														style="background-color:#fc696a;"></span> High</p>
												<p><span class="badge badge-md badge-dot ms-5"
														style="background-color:#51ce8a;"></span> Moderate</p>
												<p><span class="badge badge-md badge-dot ms-5"
														style="background-color:#ff9920;"></span> Low</p>
											</div>
											<h2 class="fw-600 mb-0">12 KWh</h2>
										</div>
									</div>
									<div class="col-5">
										<div>
											<div id="chart-contain" class="mb-0"></div>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-xxl-12 col-xl-12 col-12">
							<div class="box performance">
								<div class="box-header">
									<div class="d-flex justify-content-between align-items-center">
										<h4 class="box-title">Performance Monitoring</h4>
									</div>
								</div>
								<div class="box-body">
									<div class="row">
										<div class="col-lg-6 col-12">
											<div>
												<p class="mb-2"><span class="badge badge-dot bg-success"></span> Total
													Charging</p>
												<h1 class="mb-2 mt-0">80.88</h1>
												<div class="d-flex align-items-center">
													<div>
														<p class="mb-0">Min <span class="text-danger">3.0</span> <a
																href="#"><i class="fa-solid fa-sort-down"></i></a></p>
													</div>
													<div>
														<p class="ms-10 mb-0">Max <span class="text-success">6.0</span>
															<a href="#"><i class="fa-solid fa-sort-down"></i></a>
														</p>
													</div>
												</div>
											</div>
											<hr class="my-35">
											<div>
												<p class="mb-2"><span class="badge badge-dot bg-warning"></span> Power
													Usage</p>
												<h1 class="mt-0 mb-2">12.35</h1>
												<div>
													<p class="mb-0">1 Hour usage <span class="fw-bold">6.8</span> kwh
													</p>
												</div>
											</div>

										</div>
										<div class="col-lg-6 col-12">
											<div>
												<img src="/assets/images/performance.png" class="mb-5">

											</div>
											<div>
												<div class="box box-body mb-0" style="background-color: #eeeeee;">
													<div class="row">
														<div class="col-6">
															<div class="d-flex align-items-center">
																<div>
																	<i
																		class="fa-solid fa-battery-full text-success"></i>
																</div>
																<div class="mx-10">
																	<p class="mb-0 text-black">Capacity</p>
																	<h5 class="mb-0 text-black">210 kwh</h5>
																</div>
															</div>
														</div>
														<div class="col-6">
															<div class="d-flex align-items-center">
																<div>
																	<i class="fa-solid fa-solar-panel text-success"></i>
																</div>
																<div class="mx-10">
																	<p class="mb-0 text-black">Yield</p>
																	<h5 class="mb-0 text-black">178 kwh</h5>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>

					</div>


					<div class="row">
						@if(auth()->check() && auth()->user()->isAdmin())
						@php
						$users = \App\Models\User::where('id', '!=', auth()->id())->paginate(10); // Paginate with 10 users per page
						@endphp
						<div class="col-xxl-7 col-xl-12 col-12">
							<div class="box information">
								<div class="box-header">
									<h4 class="box-title">Users Information</h4>
								</div>
								<div class="box-body"> {{-- Removed no-padding to accommodate pagination --}}
									<div class="table-responsive">
										<table class="table table-hover">
											<tbody>
												<tr>
													<th style="padding:0px 19px;">
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value=""
																id="flexCheckDefault">
															<label class="form-check-label" for="flexCheckDefault">
																<span class="text-fade">Users</span>
															</label>
														</div>
													</th>
													<th class="text-fade">Email</th>
													<th class="text-fade">Role</th>
													<th class="text-fade">Created At</th>
													<th class="text-fade">Actions</th>
													<th class="text-fade">Status</th>
													<th class="text-fade">Irradience</th>
													<th class="text-fade">Energy</th>
													<th class="text-fade">Battery</th>
													<th class="text-fade">Temperature</th>

												</tr>
												@foreach($users as $user)
												<tr>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value=""
																id="userCheckbox{{ $user->id }}">
															<label class="form-check-label" for="userCheckbox{{ $user->id }}">
																{{ $user->name }}
															</label>
														</div><a href="javascript:void(0)" class="text-primary"></a>
													</td>
													<td>{{ $user->email }}</td>
													<td>
														@if ($user->role)
														{{ $user->role->name }}
														@else
														N/A
														@endif
													</td>
													<td>{{ $user->created_at }}</td>
													<td>
														<div style="display: flex; align-items: center;">
															<a href="" class="btn btn-sm btn-secondary mr-2" title="Edit User">
																<i class="fas fa-edit"></i>
															</a>
															<form action="" method="POST" style="display: inline-block;">
																@csrf
																@method('DELETE')
																<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">
																	<i class="fas fa-trash-alt"></i>
																</button>
															</form>
														</div>
													</td>
													{{-- You'll need to replace these with actual data from your $user object or related models --}}
													<td><span class="badge badge-warning-light text-warning">Pending</span></td>
													<td>N/A</td>
													<td>N/A</td>
													<td><i class="fa-solid fa-battery-full text-primary fs-16"></i> N/A</td>
													<td>N/A</td>
												</tr>
												@endforeach

											</tbody>
										</table>
									</div>
									<div class="mt-4">
										{{ $users->links() }} {{-- Render the pagination links --}}
									</div>
								</div>
							</div>
						</div>
						@endif
						@if(auth()->check() && auth()->user()->isAdmin())
						<div class="col-xxl-5 col-xl-12 col-12">
							<div class="box yield">
								<div class="box-header d-flex justify-content-between align-items-center">
									<h4 class="box-title">Yield Daily</h4>
									<div>
										<ul class="box-controls pull-right d-md-flex d-none">
											<li class="dropdown">
												<a data-bs-toggle="dropdown" href="#" aria-expanded="false" class=""><i
														class="ti-more-alt rotate-90 text-muted"></i></a>
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
									<div>
										<div class="d-flex  justify-content-between align-items-center">
											<p class="mb-0 text-fade"><span class="badge badge-md badge-dot"
													style="background-color:#008ffb;"></span> Yield Energy</p>
											<p class="mb-0 text-fade"><span class="badge badge-md badge-dot"
													style="background-color:#00e396;"></span> Exported Energy</p>
											<p class="mb-0 text-fade"><span class="badge badge-md badge-dot"
													style="background-color:#feb019;"></span> Selfuse Energy</p>
										</div>
										<div class="d-flex  justify-content-between align-items-center">
											<h3>17.6 <small>kwh</small></h3>
											<h3>8.9 <small>kwh</small></h3>
											<h3>12.87 <small>kwh</small></h3>
										</div>
									</div>
									<div>
										<div id="chart"></div>
									</div>
									<div>
										<h6 class="fw-500">Battery Status</h6>
										<div class="d-flex justify-content-between align-items-center">
											<p class="text-fade mb-0">Load: <span class="text-dark fw-500">14%</span>
											</p>
											<p class="text-fade mb-0">Charge: <span class="text-dark fw-500">100%</span>
											</p>
											<p class="text-fade mb-0">Power <span class="text-dark-500">23.5 V<span></p>
										</div>
									</div>
								</div>
							</div>
						</div>
						@else
						<div class="col-xxl-12 col-xl-12 col-12">
							<div class="box yield">
								<div class="box-header d-flex justify-content-between align-items-center">
									<h4 class="box-title">Yield Daily</h4>
									<div>
										<ul class="box-controls pull-right d-md-flex d-none">
											<li class="dropdown">
												<a data-bs-toggle="dropdown" href="#" aria-expanded="false" class=""><i
														class="ti-more-alt rotate-90 text-muted"></i></a>
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
									<div>
										<div class="d-flex  justify-content-between align-items-center">
											<p class="mb-0 text-fade"><span class="badge badge-md badge-dot"
													style="background-color:#008ffb;"></span> Yield Energy</p>
											<p class="mb-0 text-fade"><span class="badge badge-md badge-dot"
													style="background-color:#00e396;"></span> Exported Energy</p>
											<p class="mb-0 text-fade"><span class="badge badge-md badge-dot"
													style="background-color:#feb019;"></span> Selfuse Energy</p>
										</div>
										<div class="d-flex  justify-content-between align-items-center">
											<h3>17.6 <small>kwh</small></h3>
											<h3>8.9 <small>kwh</small></h3>
											<h3>12.87 <small>kwh</small></h3>
										</div>
									</div>
									<div>
										<div id="chart"></div>
									</div>
									<div>
										<h6 class="fw-500">Battery Status</h6>
										<div class="d-flex justify-content-between align-items-center">
											<p class="text-fade mb-0">Load: <span class="text-dark fw-500">14%</span>
											</p>
											<p class="text-fade mb-0">Charge: <span class="text-dark fw-500">100%</span>
											</p>
											<p class="text-fade mb-0">Power <span class="text-dark-500">23.5 V<span></p>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endif
					</div>

				</section>
			</div>
		</div>

		<footer class="main-footer bt-1">
			<div class="pull-right d-none d-sm-inline-block">
				<ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
					<li class="nav-item">
						<a class="nav-link" href="#" target="_blank">Purchase Now</a>
					</li>
				</ul>
			</div>
			&copy;
			<script>
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
								<div class=""><img
										src="https://solar-admin-template.multipurposethemes.com/bs5/images/avatar/avatar-13.png"
										alt="user" class="rounded bg-danger-light w-150" width="100"></div>
								<div class="ps-20">
									<h5 class="mb-0">Nil Yeager</h5>
									<p class="my-5 text-fade">Manager</p>
									<a href="mailto:dummy@gmail.com"><span
											class="icon-Mail-notification me-5 text-success"><span
												class="path1"></span><span class="path2"></span></span>
										dummy@gmail.com</a>
									<button class="btn btn-success-light btn-sm mt-5"><i class="ti-plus"></i>
										Follow</button>
								</div>
							</div>
						</div>
						<div class="dropdown-divider my-30"></div>
						<div>
							<div class="d-flex align-items-center mb-30">
								<div class="me-15 bg-primary-light h-50 w-50 l-h-60 rounded text-center">
									<span class="icon-Library fs-24"><span class="path1"></span><span
											class="path2"></span></span>
								</div>
								<div class="d-flex flex-column fw-500">
									<a href="extra_profile.html" class="text-dark hover-primary mb-1 fs-16">My
										Profile</a>
									<span class="text-fade">Account settings and more</span>
								</div>
							</div>
							<div class="d-flex align-items-center mb-30">
								<div class="me-15 bg-danger-light h-50 w-50 l-h-60 rounded text-center">
									<span class="icon-Write fs-24"><span class="path1"></span><span
											class="path2"></span></span>
								</div>
								<div class="d-flex flex-column fw-500">
									<a href="mailbox.html" class="text-dark hover-danger mb-1 fs-16">My Messages</a>
									<span class="text-fade">Inbox and tasks</span>
								</div>
							</div>
							<div class="d-flex align-items-center mb-30">
								<div class="me-15 bg-success-light h-50 w-50 l-h-60 rounded text-center">
									<span class="icon-Group-chat fs-24"><span class="path1"></span><span
											class="path2"></span></span>
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
						<div class="dropdown-divider my-30"></div>

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
						<button
							class="waves-effect waves-circle btn btn-circle btn-primary-light h-40 w-40 rounded-circle l-h-50"
							type="button" data-bs-toggle="dropdown">
							<span class="icon-Add-user fs-22"><span class="path1"></span><span
									class="path2"></span></span>
						</button>
						<div class="dropdown-menu min-w-200">
							<a class="dropdown-item fs-16" href="#">
								<span class="icon-Color me-15"></span>
								New Group</a>
							<a class="dropdown-item fs-16" href="#">
								<span class="icon-Clipboard me-15"><span class="path1"></span><span
										class="path2"></span><span class="path3"></span><span
										class="path4"></span></span>
								Contacts</a>
							<a class="dropdown-item fs-16" href="#">
								<span class="icon-Group me-15"><span class="path1"></span><span
										class="path2"></span></span>
								Groups</a>
							<a class="dropdown-item fs-16" href="#">
								<span class="icon-Active-call me-15"><span class="path1"></span><span
										class="path2"></span></span>
								Calls</a>
							<a class="dropdown-item fs-16" href="#">
								<span class="icon-Settings1 me-15"><span class="path1"></span><span
										class="path2"></span></span>
								Settings</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item fs-16" href="#">
								<span class="icon-Question-circle me-15"><span class="path1"></span><span
										class="path2"></span></span>
								Help</a>
							<a class="dropdown-item fs-16" href="#">
								<span class="icon-Notifications me-15"><span class="path1"></span><span
										class="path2"></span></span>
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
						<button id="chat-box-toggle"
							class="waves-effect waves-circle btn btn-circle btn-danger-light h-40 w-40 rounded-circle l-h-50"
							type="button">
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
									<img src="https://solar-admin-template.multipurposethemes.com/bs5/images/avatar/2.jpg"
										class="avatar avatar-lg" alt="">
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
									<img src="https://solar-admin-template.multipurposethemes.com/bs5/images/avatar/3.jpg"
										class="avatar avatar-lg" alt="">
								</span>
							</div>
							<div class="cm-msg-text">
								My name is Anne Clarc.
							</div>
						</div>
						<div class="chat-msg user">
							<div class="d-flex align-items-center">
								<span class="msg-avatar">
									<img src="https://solar-admin-template.multipurposethemes.com/bs5/images/avatar/2.jpg"
										class="avatar avatar-lg" alt="">
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
					</div>
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


		<script src="https://code.jquery.com/jquery-3.7.1.js"
			integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.7.1.min.js"
			integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="assets/js/jquery.slimscroll.min.js"></script>
		<script src="/assets/js/vendors.min.js"></script>
		<script src="/assets/js/chat-popup.js"></script>
		<script src="/assets/js/feather.min.js"></script>
		<script src="/assets/js/irregular-data-series.js"></script>
		<script src="/assets/js/apexcharts.js"></script>
		<script src="/assets/js/raphael.min.js"></script>
		<script src="/assets/js/morris.min.js"></script>
		<script src="/assets/js/bootstrap-slider.js"></script>
		<script src="/assets/js/owl.carousel.js"></script>
		<script src="/assets/js/jquery.flexslider.js"></script>
		<script src="/assets/js/dataTables.bootstrap.min.js"></script>
		<script src="/assets/js/echarts.min.js"></script>
		<script src="/assets/js/ion.rangeSlider.min.js"></script>


		<script src="/assets/js/demo.js"></script>
		<script src="/assets/js/template.js"></script>
		<script src="/assets/js/dashboard.js"></script>
		<script src="/assets/js/slider.js"></script>
		<script src="/assets/js/range-sliders.init.js"></script>



</body>

</html>