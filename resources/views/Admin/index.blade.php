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
    <link rel="stylesheet" href="https://solar-admin-template.multipurposethemes.com/bs5/template/vertical/src/css/vendors_css.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/skin_color.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link href="/assets/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <style>
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

        /* Card Styles */
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
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .box-body {
            padding: 1.25rem;
        }

        /* Stats Cards */
        .stats-card {
            padding: 1.5rem;
            border-radius: 12px;
            background: white;
            box-shadow: 0 2px 10px var(--shadow-color);
            transition: all 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-5px);
        }

        .stats-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        /* Button Styles */
        .btn-primary-light {
            background: rgba(33, 150, 243, 0.1);
            color: var(--primary-color);
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-primary-light:hover {
            background: var(--primary-color);
            color: white;
        }

        /* Table Styles */
        .table {
            width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
        }

        .table th {
            padding: 1rem;
            font-weight: 600;
            color: var(--dark-color);
            border-bottom: 2px solid #dee2e6;
        }

        .table td {
            padding: 1rem;
            vertical-align: middle;
            border-top: 1px solid #dee2e6;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.02);
        }

        /* Badge Styles */
        .badge {
            padding: 0.5em 1em;
            border-radius: 6px;
            font-weight: 500;
        }

        .badge-success {
            background-color: rgba(76, 175, 80, 0.1);
            color: var(--success-color);
        }

        .badge-warning {
            background-color: rgba(255, 193, 7, 0.1);
            color: var(--warning-color);
        }

        .badge-danger {
            background-color: rgba(244, 67, 54, 0.1);
            color: var(--danger-color);
        }

        /* Chart Container Styles */
        .chart-container {
            padding: 1rem;
            border-radius: 12px;
            background: white;
            box-shadow: 0 2px 10px var(--shadow-color);
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
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
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
            position: relative;
        }

        .chat-message.user {
            background: var(--primary-color);
            color: white;
            margin-left: auto;
            border-bottom-right-radius: 2px;
        }

        .chat-message.other {
            background: #f0f0f0;
            color: #333;
            margin-right: auto;
            border-bottom-left-radius: 2px;
        }

        .chat-message .message-content {
            margin-bottom: 4px;
            word-wrap: break-word;
        }

        .chat-message .message-time {
            font-size: 0.75rem;
            color: rgba(0, 0, 0, 0.5);
            text-align: right;
        }

        .chat-message.user .message-time {
            color: rgba(255, 255, 255, 0.7);
        }

        .chat-message.unread {
            position: relative;
        }

        .chat-message.unread::before {
            content: '';
            position: absolute;
            width: 8px;
            height: 8px;
            background: var(--primary-color);
            border-radius: 50%;
            left: -15px;
            top: 50%;
            transform: translateY(-50%);
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
            max-height: 200px;
            overflow-y: auto;
            border-bottom: 1px solid #eee;
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
            overflow: hidden;
        }

        .chat-user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
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

        #unread-count {
            top: -5px;
            right: -5px;
            font-size: 0.75rem;
            padding: 2px 6px;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
                <section class="content">
                    <!-- Existing content unchanged -->
                    <div class="row">
                        <!-- System Efficiency -->
                        <div class="col-xxl-4 col-xl-6 col-lg-6 col-12">
                            <div class="box box-body pull-up">
                                <div class="row">
                                    <div class="col-7">
                                        <div>
                                            <h4 class="fw-500">
                                                <i class="fas fa-gauge-high fa-lg text-info me-2"></i>
                                                System Efficiency
                                            </h4>
                                            <div class="d-flex align-items-center">
                                                <p><span class="badge badge-md badge-dot" style="background-color:#fc696a;"></span> High</p>
                                                <p><span class="badge badge-md badge-dot ms-5" style="background-color:#51ce8a;"></span> Moderate</p>
                                                <p><span class="badge badge-md badge-dot ms-5" style="background-color:#ff9920;"></span> Low</p>
                                            </div>
                                            <h2 class="fw-600 mb-0" id="system-efficiency">--</h2>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div>
                                            <div id="efficiency-chart" class="mb-0"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Power Generation -->
                        <div class="col-xxl-4 col-xl-6 col-lg-6 col-12">
                            <div class="box box-body pull-up">
                                <div class="row">
                                    <div class="col-7">
                                        <div>
                                            <h4 class="fw-500">
                                                <i class="fas fa-solar-panel fa-lg text-warning me-2"></i>
                                                Power Generation
                                            </h4>
                                            <div class="d-flex align-items-center">
                                                <p><span class="badge badge-md badge-dot" style="background-color:#fc696a;"></span> High</p>
                                                <p><span class="badge badge-md badge-dot ms-5" style="background-color:#51ce8a;"></span> Moderate</p>
                                                <p><span class="badge badge-md badge-dot ms-5" style="background-color:#ff9920;"></span> Low</p>
                                            </div>
                                            <h2 class="fw-600 mb-0" id="power-generation">--</h2>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div>
                                            <div id="generation-chart" class="mb-0"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Energy Consumed -->
                        <div class="col-xxl-4 col-xl-12 col-lg-12 col-12">
                            <div class="box box-body pull-up">
                                <div class="row">
                                    <div class="col-7">
                                        <div>
                                            <h4 class="fw-500">
                                                <i class="fas fa-battery-half fa-lg text-danger me-2"></i>
                                                Energy Consumed
                                            </h4>
                                            <div class="d-flex align-items-center">
                                                <p><span class="badge badge-md badge-dot" style="background-color:#fc696a;"></span> High</p>
                                                <p><span class="badge badge-md badge-dot ms-5" style="background-color:#51ce8a;"></span> Moderate</p>
                                                <p><span class="badge badge-md badge-dot ms-5" style="background-color:#ff9920;"></span> Low</p>
                                            </div>
                                            <h2 class="fw-600 mb-0" id="energy-consumed">--</h2>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div>
                                            <div id="consumption-chart" class="mb-0"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Solar Capacity -->
                        <div class="col-xxl-4 col-xl-6 col-lg-6 col-12">
                            <div class="box box-body pull-up">
                                <div class="row">
                                    <div class="col-7">
                                        <div>
                                            <h4 class="fw-500">
                                                <i class="fa-solid fa-bolt fa-lg text-warning me-2"></i>
                                                Solar Capacity
                                            </h4>

                                            <h2 class="fw-600 mb-0" id="total-capacity">--</h2>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div>
                                            <div id="efficiency-chart" class="mb-0"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-xxl-4 col-xl-6 col-lg-6 col-12">
                            <div class="box box-body pull-up">
                                <div class="row">
                                    <div class="col-7">
                                        <div>
                                            <h4 class="fw-500">
                                                <i class="fa-solid fa-solar-panel fa-lg text-success me-2"></i>
                                                Status
                                            </h4>

                                            <h2 class="fw-600 mb-0" id="panel-status">--</h2>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div>
                                            <div id="generation-chart" class="mb-0"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Angle -->
                        <div class="col-xxl-4 col-xl-12 col-lg-12 col-12">
                            <div class="box box-body pull-up">
                                <div class="row">
                                    <div class="col-7">
                                        <div>
                                            <h4 class="fw-500">
                                                <i class="fa-solid fa-compass-drafting fa-lg text-primary me-2"></i>
                                                Angle
                                            </h4>

                                            <h2 class="fw-600 mb-0" id="panel-angle">--</h2>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div>
                                            <div id="consumption-chart" class="mb-0"></div>
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
                                                <p class="mb-2"><span class="badge badge-dot bg-success"></span> Total Charging</p>
                                                <h1 class="mb-2 mt-0" id="total-charging">--</h1>
                                                <div class="d-flex align-items-center"></div>
                                            </div>
                                            <hr class="my-35">
                                            <div>
                                                <p class="mb-2"><span class="badge badge-dot bg-warning"></span> Solar efficiency</p>
                                                <div>
                                                    <p class="mb-0"><span class="fw-bold" id="solar efficiency">--</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div>
                                                <img src="/assets/images/performance.png" class="mb-5" alt="Performance Image">
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
                        $search = request()->query('search', '');
                        $query = \App\Models\User::where('id', '!=', auth()->id());
                        if($search) {
                        $query->where(function($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                        });
                        }
                        $users = $query->paginate(4)->appends(['search' => $search]);
                        @endphp
                        <div class="col-xxl-12 col-xl-12 col-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="box-title">Users Information</h4>
                                        <div class="box-controls">
                                            <form action="" method="GET">
                                                <div class="input-group input-search-light">
                                                    <input type="search" class="form-control" name="search" placeholder="Search users..."
                                                        value="{{ $search }}" aria-label="Search">
                                                    <button type="submit" class="input-group-text">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="table-responsive-lg">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="selectAll">
                                                            <label class="form-check-label" for="selectAll">User</label>
                                                        </div>
                                                    </th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Created</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($users->count() > 0)
                                                @foreach($users as $user)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="form-check me-2">
                                                                <input class="form-check-input" type="checkbox" id="userCheckbox{{ $user->id }}">
                                                            </div>
                                                            <div class="avatar avatar-lg">
                                                                <span class="avatar-initial rounded-circle bg-primary">{{ substr($user->name, 0, 1) }}</span>
                                                            </div>
                                                            <div class="ms-2">
                                                                <h5 class="mb-0">{{ $user->name }}</h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @if ($user->role)
                                                        <span class="badge bg-light-primary text-primary">{{ $user->role->name }}</span>
                                                        @else
                                                        <span class="badge bg-light-secondary">N/A</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $user->created_at->format('M d, Y') }}</td>
                                                    <td>
                                                        @if($user->id == auth()->id() || $user->is_online)
                                                        <span class="badge bg-light-success text-success">Active</span>
                                                        @else
                                                        <span class="badge bg-light-danger text-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="" class="btn btn-icon btn-sm btn-light-primary me-1" data-bs-toggle="tooltip" title="Edit User">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <form action="" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-icon btn-sm btn-light-danger" data-bs-toggle="tooltip" title="Delete User" onclick="return confirm('Are you sure?')">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="6" class="text-center py-4">
                                                        <div class="d-flex flex-column align-items-center">
                                                            <i class="fas fa-search fa-3x text-muted mb-3"></i>
                                                            <h5 class="mb-1">No users found</h5>
                                                            <p class="text-muted">Try adjusting your search to find what you're looking for.</p>
                                                            @if($search)
                                                            <a href="{{ url()->current() }}" class="btn btn-sm btn-outline-primary mt-2">
                                                                <i class="fas fa-times me-1"></i> Clear search
                                                            </a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <div class="text-muted">
                                            @if($users->total() > 0)
                                            Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} users
                                            @else
                                            No users found
                                            @endif
                                        </div>
                                        <div>
                                            {{ $users->links('pagination::bootstrap-5') }}
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
            <div class="pull-right d-none d-sm-inline-block"></div>
            © <script>
                document.write(new Date().getFullYear())
            </script>
        </footer>
        <div class="modal modal-right fade" id="quick_user_toggle" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content slim-scroll3">
                    <div class="modal-body p-30 bg-white">
                        <div class="d-flex align-items-center justify-content-between pb-30">
                            <h4 class="m-0">User Profile</h4>
                            <a href="#" class="btn btn-icon btn-danger-light btn-sm no-shadow" data-bs-dismiss="modal">
                                <span class="fa fa-close"></span>
                            </a>
                        </div>
                        <div>
                            <div class="d-flex flex-row">
                                <div class="position-relative">
                                    @if(auth()->user()->profile_photo)
                                    <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}" alt="user"
                                        class="rounded-circle bg-primary-light" style="width: 100px; height: 100px; object-fit: cover;">
                                    @else
                                    <div class="rounded-circle bg-primary-light d-flex align-items-center justify-content-center text-white"
                                        style="width: 100px; height: 100px; font-size: 2.5rem;">
                                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                    </div>
                                    @endif
                                    <span class="position-absolute bottom-0 end-0 bg-success rounded-circle p-1"
                                        style="width: 12px; height: 12px;" title="Online"></span>
                                </div>
                                <div class="ps-20">
                                    <h5 class="mb-0">{{ auth()->user()->name }}</h5>
                                    <p class="my-5 text-fade">{{ auth()->user()->role ? auth()->user()->role->name : 'User' }}</p>
                                    <a href="mailto:{{ auth()->user()->email }}">
                                        <span class="icon-Mail-notification me-5 text-success">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </span>
                                        {{ auth()->user()->email }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider my-30"></div>
                        <div>
                            <div class="d-flex align-items-center mb-30">
                                <div class="me-15 bg-primary-light h-50 w-50 l-h-60 rounded text-center">
                                    <span class="icon-Library fs-24">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </span>
                                </div>
                                <div class="d-flex flex-column fw-500">
                                    <a href="{{ route('profile.edit') }}" class="text-dark hover-primary mb-1 fs-16">Edit Profile</a>
                                    <span class="text-fade">Update your profile information</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-30">
                                <div class="me-15 bg-success-light h-50 w-50 l-h-60 rounded text-center">
                                    <span class="icon-Group-chat fs-24">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </span>
                                </div>
                                <div class="d-flex flex-column fw-500">
                                    <a href="{{ route('profile.settings') }}" class="text-dark hover-success mb-1 fs-16">Settings</a>
                                    <span class="text-fade">Preferences & Security</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-30">
                                <div class="me-15 bg-info-light h-50 w-50 l-h-60 rounded text-center">
                                    <span class="icon-Attachment1 fs-24">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </span>
                                </div>
                                <div class="d-flex flex-column fw-500">
                                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="text-dark hover-info mb-1 fs-16 btn btn-link p-0">
                                            Logout
                                        </button>
                                    </form>
                                    <span class="text-fade">Safely sign out</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New Chat Section -->
        <div class="chat-container">
            <button class="chat-toggle-btn" id="chat-toggle-btn">
                <i class="fa fa-comment"></i>
                <span class="badge badge-danger position-absolute" id="unread-count" style="display: none;">0</span>
            </button>
            <div class="chat-window" id="chat-window">
                <div class="chat-header">
                    <div class="d-flex align-items-center">
                        <span>Chat</span>
                        @if(!auth()->user()->role->isAdmin())
                        <small class="ms-2">(Chatting with Admin)</small>
                        @endif
                    </div>
                    <button class="chat-toggle-btn" id="chat-close-btn">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                @if(auth()->user()->role->isAdmin())
                <div class="chat-users-list" id="chat-users-list">
                    <!-- Users will be loaded here -->
                </div>
                @endif
                <div class="chat-body" id="chat-body">
                    <!-- Messages will be loaded here -->
                </div>
                <div class="chat-input-area">
                    <input type="text" id="chat-input" placeholder="Type a message...">
                    <button id="chat-send-btn">Send</button>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let lastScrollTop = 0;
                const header = document.querySelector('.main-header');
                const sidebar = document.querySelector('.main-sidebar');

                function handleScroll() {
                    let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

                    if (currentScroll > lastScrollTop && currentScroll > 70) {
                        header.classList.add('header-scroll-down');
                        header.classList.remove('header-scroll-up');

                        sidebar.style.top = '0';
                    } else {
                        header.classList.add('header-scroll-up');
                        header.classList.remove('header-scroll-down');

                        sidebar.style.top = '70px';
                    }

                    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
                }

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

                const sidebarToggle = document.querySelector('[data-toggle="push-menu"]');
                if (sidebarToggle) {
                    sidebarToggle.addEventListener('click', function(e) {
                        e.preventDefault();
                        document.body.classList.toggle('sidebar-open');
                    });
                }

                const chatToggleBtn = document.getElementById('chat-toggle-btn');
                const chatCloseBtn = document.getElementById('chat-close-btn');
                const chatWindow = document.getElementById('chat-window');
                const chatInput = document.getElementById('chat-input');
                const chatSendBtn = document.getElementById('chat-send-btn');
                const chatBody = document.getElementById('chat-body');

                function toggleChat() {
                    chatWindow.classList.toggle('active');
                }

                chatToggleBtn.addEventListener('click', toggleChat);
                chatCloseBtn.addEventListener('click', toggleChat);

                chatSendBtn.addEventListener('click', function() {
                    const message = chatInput.value.trim();
                    if (message) {
                        const messageDiv = document.createElement('div');
                        messageDiv.className = 'chat-message user';
                        messageDiv.textContent = message;
                        chatBody.appendChild(messageDiv);
                        chatInput.value = '';
                        chatBody.scrollTop = chatBody.scrollHeight;
                    }
                });

                chatInput.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        chatSendBtn.click();
                    }
                });

                const clearNotifications = document.getElementById('clear-notifications');
                const notificationList = document.querySelector('.notification-list');
                const notificationCount = document.getElementById('notification-count');

                clearNotifications.addEventListener('click', function(e) {
                    e.preventDefault();
                    notificationList.innerHTML = '';
                    notificationCount.textContent = '0';
                });

                function fetchDashboardData() {
                    fetch('/api/system/dashboard')
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            document.getElementById('system-efficiency').textContent = data.system_status.overall_efficiency + '%';
                            document.getElementById('power-generation').textContent = (data.system_status.current_production * 1000).toFixed(2) + ' µW';
                            document.getElementById('energy-consumed').textContent = (data.system_status.current_consumption * 1000).toFixed(2) + ' µWh';
                            document.getElementById('total-charging').textContent = data.system_status.total_charging + ' %';
                            document.getElementById('solar efficiency').textContent = data.system_status.one_hour_usage  + ' %';
                            document.getElementById('total-capacity').textContent = data.system_status.total_capacity + ' mWh';
                            document.getElementById('panel-status').textContent = data.panel_status.status;
                            document.getElementById('panel-status').className = 'fw-600 mb-0 ' + (data.panel_status.status === 'Active' ? 'text-success' : 'text-danger');
                            document.getElementById('panel-angle').className = 'fw-600 mb-0 ' + (data.panel_status.current_angle > 0 ? 'text-primary' : 'text-secondary');
                            document.getElementById('panel-angle').style.color = data.panel_status.current_angle > 0 ? '#007bff' : '#6c757d';
                            document.getElementById('panel-angle').textContent = data.panel_status.current_angle + '°';

                            const userMenuLink = document.querySelector('.user-menu a');
                            const userNameSpan = document.querySelector('.user-menu .user-name');

                            if (userNameSpan) {
                                userNameSpan.textContent = data.user.name;
                            }
                            if (userMenuLink) {
                                userMenuLink.title = data.user.name;
                            }

                            const userEmailElement = document.querySelector('#quick_user_toggle .user-email');
                            if (userEmailElement) {
                                userEmailElement.textContent = data.user.email || 'No email';
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching dashboard data:', error);
                            const elements = [
                                'system-efficiency', 'power-generation', 'energy-consumed',
                                'total-charging', 'solar efficiency', 'total-capacity',
                                'panel-status', 'panel-angle'
                            ];
                            elements.forEach(id => {
                                document.getElementById(id).textContent = 'Error';
                            });
                            const userNameSpan = document.querySelector('.user-menu .user-name');
                            const userMenuLink = document.querySelector('.user-menu a');
                            const userEmailElement = document.querySelector('#quick_user_toggle .user-email');
                            if (userNameSpan) userNameSpan.textContent = 'Error';
                            if (userMenuLink) userMenuLink.title = 'Error';
                            if (userEmailElement) userEmailElement.textContent = 'Error';
                        });
                }

                fetchDashboardData();
                setInterval(fetchDashboardData, 1000);
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="/assets/js/jquery.slimscroll.min.js"></script>
        <script src="/assets/js/vendors.min.js"></script>
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
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

    </div>
</body>

</html>