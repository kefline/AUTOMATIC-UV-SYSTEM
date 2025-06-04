<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="https://solar-admin-template.multipurposethemes.com/bs5/images/favicon.ico">

  <title>User Registration</title>

  <link rel="stylesheet" href="https://solar-admin-template.multipurposethemes.com/bs5/template/vertical/src/css/vendors_css.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/css/skin_color.css">

  <style>
		/* Enhanced Dashboard Styles */
		:root {
			--primary-color: #2196F3;
			--secondary-color: #FF9800;
			--success-color: #4CAF50;
			--danger-color: #f44336;
			--warning-color: #FFC107;
			--info-color: #00BCD4;
			--dark-color: #212121;
			--light-color: #f5f5f5;
			--shadow-color: rgba(0, 0, 0, 0.1);
		}

		/* Global Styles */
		body {
			background-color: #f8f9fa;
			color: #333;
			font-family: 'Poppins', sans-serif;
			padding-top: 70px;
		}

		/* Header Styles */
		.main-header {
			background: white;
			box-shadow: 0 2px 10px var(--shadow-color);
			position: fixed;
			width: 100%;
			top: 0;
			z-index: 1000;
			transition: all 0.3s ease;
		}

		.header-scroll-up {
			transform: translateY(0);
		}

		.header-scroll-down {
			transform: translateY(-100%);
		}

		/* Sidebar Styles */
		.main-sidebar {
			background: white;
			box-shadow: 2px 0 10px var(--shadow-color);
			position: fixed;
			height: 100vh;
			overflow-y: auto;
			z-index: 999;
			top: 70px;
			transition: all 0.3s ease;
			width: 250px;
		}

		.sidebar-menu {
			padding: 1rem;
		}

		.sidebar-menu li {
			margin-bottom: 0.5rem;
		}

		.sidebar-menu a {
			color: var(--dark-color);
			padding: 0.75rem 1rem;
			border-radius: 8px;
			transition: all 0.3s ease;
			display: flex;
			align-items: center;
			text-decoration: none;
		}

		.sidebar-menu a:hover {
			background: var(--light-color);
			color: var(--primary-color);
		}

		.sidebar-menu a i {
			margin-right: 10px;
		}

		/* Content Styles */
		.content-wrapper {
			margin-left: 250px;
			padding: 20px;
			transition: all 0.3s ease;
		}

		/* Performance Card Styles */
		.box {
			background: white;
			border-radius: 12px;
			box-shadow: 0 2px 10px var(--shadow-color);
			margin-bottom: 1.5rem;
			transition: transform 0.3s ease;
		}

		.box:hover {
			transform: translateY(-5px);
		}

		.box-header {
			padding: 1.25rem;
			border-bottom: 1px solid rgba(0,0,0,0.05);
		}

		.box-body {
			padding: 1.25rem;
		}

		/* Weather Card Styles */
		.solar {
			background: linear-gradient(135deg, #2193b0, #6dd5ed);
			color: white;
		}

		.weather-card {
			background: rgba(255, 255, 255, 0.1);
			backdrop-filter: blur(10px);
			border-radius: 15px;
			padding: 20px;
			color: white;
		}

		.weather-card h5 {
			color: white !important;
			font-weight: 600;
		}

		/* UV Intensity Card */
		.uv-card {
			background: white;
			border-radius: 12px;
			padding: 2rem;
			text-align: center;
		}

		.uv-icon {
			font-size: 3rem;
			margin-bottom: 1rem;
			color: var(--warning-color);
		}

		/* Chart Styles */
		.chart-container {
			background: white;
			border-radius: 12px;
			padding: 1rem;
			box-shadow: 0 2px 10px var(--shadow-color);
		}

		#basic-pie, #chart, #charts_widget_1_chart {
			min-height: 300px;
		}

		/* Power Statistics */
		.power-stats {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
			gap: 1rem;
			margin-bottom: 1rem;
		}

		.power-stat-item {
			background: white;
			padding: 1rem;
			border-radius: 8px;
			text-align: center;
		}

		.power-stat-item h3 {
			margin: 0;
			color: var(--dark-color);
		}

		/* Responsive Styles */
		@media (max-width: 991.98px) {
			.content-wrapper {
				margin-left: 0;
			}
			
			.sidebar-open .content-wrapper {
				transform: translateX(250px);
			}

			.main-sidebar {
				transform: translateX(-250px);
			}

			.sidebar-open .main-sidebar {
				transform: translateX(0);
			}

			.power-stats {
				grid-template-columns: 1fr;
			}
		}

		/* Animation Styles */
		.fade-in {
			animation: fadeIn 0.3s ease-in;
		}

		@keyframes fadeIn {
			from {
				opacity: 0;
				transform: translateY(20px);
			}
			to {
				opacity: 1;
				transform: translateY(0);
			}
		}

		/* Custom Scrollbar */
		::-webkit-scrollbar {
			width: 8px;
		}

		::-webkit-scrollbar-track {
			background: #f1f1f1;
		}

		::-webkit-scrollbar-thumb {
			background: #888;
			border-radius: 4px;
		}

		::-webkit-scrollbar-thumb:hover {
			background: #555;
		}

		/* Button Styles */
		.btn-warning-light {
			background: rgba(255, 152, 0, 0.1);
			color: var(--warning-color);
			border: none;
			padding: 0.5rem 1rem;
			border-radius: 8px;
			transition: all 0.3s ease;
		}

		.btn-warning-light:hover {
			background: var(--warning-color);
			color: white;
		}

		/* Dropdown Styles */
		.dropdown-menu {
			border: none;
			box-shadow: 0 2px 10px var(--shadow-color);
			border-radius: 8px;
			padding: 0.5rem;
		}

		.dropdown-item {
			padding: 0.5rem 1rem;
			border-radius: 6px;
			transition: all 0.2s ease;
		}

		.dropdown-item:hover {
			background: var(--light-color);
		}

		.dropdown-item.active {
			background: var(--primary-color);
			color: white;
		}

		/* Chat Feature Styles */
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
			background: var(--primary-color);
			color: white;
			border: none;
			box-shadow: 0 2px 10px rgba(0,0,0,0.1);
			cursor: pointer;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 1.2rem;
			transition: all 0.3s ease;
		}

		.chat-toggle-btn:hover {
			transform: scale(1.1);
			background: var(--primary-color);
		}

		.chat-window {
			position: fixed;
			bottom: 80px;
			right: 20px;
			width: 300px;
			height: 400px;
			background: white;
			border-radius: 10px;
			box-shadow: 0 5px 15px rgba(0,0,0,0.1);
			display: none;
			flex-direction: column;
			overflow: hidden;
		}

		.chat-window.active {
			display: flex;
		}

		.chat-header {
			padding: 15px;
			background: var(--primary-color);
			color: white;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		.chat-body {
			flex: 1;
			padding: 15px;
			overflow-y: auto;
		}

		.chat-message {
			margin-bottom: 10px;
			padding: 10px;
			border-radius: 10px;
			max-width: 80%;
		}

		.chat-message.user {
			background: var(--primary-color);
			color: white;
			margin-left: auto;
		}

		.chat-message.other {
			background: #f0f0f0;
			color: #333;
		}

		.chat-input-area {
			padding: 15px;
			border-top: 1px solid #eee;
			display: flex;
			gap: 10px;
		}

		.chat-input-area input {
			flex: 1;
			padding: 8px;
			border: 1px solid #ddd;
			border-radius: 20px;
			outline: none;
		}

		.chat-input-area button {
			padding: 8px 15px;
			background: var(--primary-color);
			color: white;
			border: none;
			border-radius: 20px;
			cursor: pointer;
		}

		.chat-input-area button:hover {
			background: var(--primary-color);
			opacity: 0.9;
		}

		.chat-users-list {
			border-bottom: 1px solid #eee;
			max-height: 200px;
			overflow-y: auto;
		}

		.chat-user {
			display: flex;
			align-items: center;
			padding: 10px;
			cursor: pointer;
			transition: background-color 0.2s;
		}

		.chat-user:hover {
			background-color: #f8f9fa;
		}

		.chat-user-avatar {
			width: 40px;
			height: 40px;
			border-radius: 50%;
			margin-right: 10px;
			background: var(--primary-color);
			color: white;
			display: flex;
			align-items: center;
			justify-content: center;
			font-weight: bold;
		}

		.chat-user-info {
			flex: 1;
		}

		.chat-user-name {
			font-weight: 500;
			margin-bottom: 2px;
		}

		.chat-user-status {
			width: 8px;
			height: 8px;
			border-radius: 50%;
			background: #ccc;
			display: inline-block;
		}

		.chat-user-status.online {
			background: #4CAF50;
		}

		.message-content {
			margin-bottom: 4px;
		}

		.message-time {
			font-size: 0.75rem;
			color: #666;
		}

		#unread-count {
			top: -5px;
			right: -5px;
			font-size: 0.75rem;
			padding: 2px 6px;
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
							<a href="#" class="waves-effect waves-light dropdown-toggle w-auto l-h-12 bg-transparent p-0 no-shadow d-flex align-items-center" data-bs-toggle="dropdown">
								@if(auth()->user()->profile_photo)
									<img src="{{ asset('storage/' . auth()->user()->profile_photo) }}" 
										class="avatar rounded-circle bg-primary-light h-40 w-40" 
										alt="{{ auth()->user()->name }}" 
										style="object-fit: cover;" />
								@else
									<div class="avatar rounded-circle bg-primary d-flex align-items-center justify-content-center h-40 w-40">
										<span class="text-white fw-bold" style="font-size: 1.2rem;">
											{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
										</span>
									</div>
								@endif
								<div class="ms-2">
									<h6 class="mb-0 fw-semibold" style="font-size: 15px;">{{ auth()->user()->name }}</h6>
									<p class="mb-0 text-muted" style="font-size: 12px;">{{ auth()->user()->role ? auth()->user()->role->name : 'User' }}</p>
								</div>
							</a>
							<ul class="dropdown-menu animated flipInX">
								<li class="user-body">
									<a class="dropdown-item" href="{{ route('profile.edit') }}">
										<i class="fa fa-user text-muted me-2"></i> Profile
									</a>
									<a class="dropdown-item" href="{{ route('profile.settings') }}">
										<i class="fa fa-cog text-muted me-2"></i> Settings
									</a>
									<div class="dropdown-divider"></div>
									<form action="{{ route('logout') }}" method="POST" class="d-inline">
										@csrf
										<button type="submit" class="dropdown-item">
											<i class="fa fa-power-off text-muted me-2"></i> Logout
										</button>
									</form>
								</li>
							</ul>
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
        <div class="content-header">
          <div class="d-flex align-items-center">
            <div class="me-auto">
              <h4 class="page-title">User Registration</h4>
              <div class="d-inline-block align-items-center">
              </div>
            </div>
          </div>
        </div>

        <section class="content">
          <div class="row">
            <div class="col-lg-12 col-12">
              <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Add Users</h4>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif

                <form class="form" method="POST" action="{{ route('users.add') }}">
                  @csrf
                  <div class="box-body">
                    <div class="form-group">
                      <label class="form-label">User Name</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" name="name" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Email address</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control" name="email" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group mb-3">
                        <span class="input-group-text bg-transparent"><i class="fas fa-user-tag"></i></span>
                        <select name="role_id" class="form-control ps-15 bg-transparent" required>
                          <option value="" disabled selected>Select Role</option>
                          @foreach($roles as $role)
                          <option value="{{ $role->id }}">{{ $role->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Password</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" name="password">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Confirm Password</label>
                      <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" name="password_confirmation">
                      </div>
                    </div>

                  </div>
                  <div class="box-footer">
                    <button type="button" class="btn btn-primary-light me-1">
                      <i class="fas fa-trash-alt"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                      <i class="fas fa-save"></i> Submit
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>

    <footer class="main-footer">
      <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
          <li class="nav-item">
            <a class="nav-link" href="#" target="_blank">Purchase Now</a>
          </li>
        </ul>
      </div>
      &copy; <script>document.write(new Date().getFullYear())</script>
    </footer>

    <div class="modal modal-right fade" id="quick_user_toggle" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content slim-scroll3">
          <div class="modal-body p-30 bg-white">
            <div class="d-flex align-items-center justify-content-between pb-30">
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
                  <span class="text-fade">Account Settings</span>
                </div>
              </div>
              <div class="d-flex align-items-center mb-30">
                <div class="me-15 bg-info-light h-50 w-50 l-h-60 rounded text-center">
                  <span class="icon-Attachment1 fs-24"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
                </div>
                <div class="d-flex flex-column fw-500">
                  <a href="extra_taskboard.html" class="text-dark hover-info mb-1 fs-16">Project</a>
                  <span class="text-fade">latest tasks and projects</span>
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
    </div>

    <script src="/assets/js/vendors.min.js"></script>
    <script src="/assets/js/chat-popup.js"></script>
    <script src="/assets/js/feather.min.js"></script>
    <script src="/assets/js/demo.js"></script>
    <script src="/assets/js/template.js"></script>

  </div>
</body>
<script>
		document.addEventListener('DOMContentLoaded', function() {
			let lastScrollTop = 0;
			const header = document.querySelector('.main-header');
			const sidebar = document.querySelector('.main-sidebar');
			
			// Function to handle scroll
			function handleScroll() {
				let currentScroll = window.pageYOffset || document.documentElement.scrollTop;
				
				// Header behavior
				if (currentScroll > lastScrollTop && currentScroll > 70) {
					// Scrolling down & past header height
					header.classList.add('header-scroll-down');
					header.classList.remove('header-scroll-up');
					
					// Adjust sidebar top position
					sidebar.style.top = '0';
				} else {
					// Scrolling up or at top
					header.classList.add('header-scroll-up');
					header.classList.remove('header-scroll-down');
					
					// Reset sidebar position
					sidebar.style.top = '70px';
				}
				
				lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
			}

			// Throttle scroll event
			let ticking = false;
			window.addEventListener('scroll', function() {
				if (!ticking) {
					window.requestAnimationFrame(function() {
						handleScroll();
						ticking = false;
					});
					ticking = true;
				}
			});

			// Handle sidebar toggle
			const sidebarToggle = document.querySelector('[data-toggle="push-menu"]');
			if (sidebarToggle) {
				sidebarToggle.addEventListener('click', function(e) {
					e.preventDefault();
					document.body.classList.toggle('sidebar-open');
				});
			}
		});
	</script>
</html>