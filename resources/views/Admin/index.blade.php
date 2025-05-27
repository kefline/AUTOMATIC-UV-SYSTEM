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
                                                <p class="mb-2"><span class="badge badge-dot bg-warning"></span> Power Usage</p>
                                                <div>
                                                    <p class="mb-0">1 Hour usage <span class="fw-bold" id="one-hour-usage">--</span> kWh</p>
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
                        <div>
                            <div class="d-flex flex-row">
                                <div><img src="https://solar-admin-template.multipurposethemes.com/bs5/images/avatar/avatar-13.png" alt="user" class="rounded bg-danger-light w-150" width="100"></div>
                                <div class="ps-20">
                                    <h5 class="mb-0">Nil Yeager</h5>
                                    <p class="my-5 text-fade">Manager</p>
                                    <a href="mailto:dummy@gmail.com"><span class="icon-Mail-notification me-5 text-success"><span class="path1"></span><span class="path2"></span></span> dummy@gmail.com</a>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider my-30"></div>
                        <div>
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
        <!-- New Chat Section -->
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
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Chat Toggle Functionality
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

                // Notification Clear Functionality
                const clearNotifications = document.getElementById('clear-notifications');
                const notificationList = document.querySelector('.notification-list');
                const notificationCount = document.getElementById('notification-count');

                clearNotifications.addEventListener('click', function(e) {
                    e.preventDefault();
                    notificationList.innerHTML = '';
                    notificationCount.textContent = '0';
                });

                // Existing Dashboard Data Fetch
                function fetchDashboardData() {
                    fetch('/api/system/dashboard')
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Update system and panel status
                            document.getElementById('system-efficiency').textContent = data.system_status.overall_efficiency + '%';
                            document.getElementById('power-generation').textContent = data.system_status.current_production + ' mW';
                            document.getElementById('energy-consumed').textContent = data.system_status.current_consumption + ' mWh';
                            document.getElementById('total-charging').textContent = data.system_status.total_charging + ' %';
                            document.getElementById('one-hour-usage').textContent = data.system_status.one_hour_usage + ' mWh';
                            document.getElementById('total-capacity').textContent = data.system_status.total_capacity + ' mWh';
                            document.getElementById('panel-status').textContent = data.panel_status.status;
                            document.getElementById('panel-angle').textContent = data.panel_status.current_angle + '°';

                            // Update user information
                            const userMenuLink = document.querySelector('.user-menu a');
                            const userNameSpan = document.querySelector('.user-menu .user-name');

                            // Update the name in the dropdown
                            if (userNameSpan) {
                                userNameSpan.textContent = data.user.name;
                            }
                            if (userMenuLink) {
                                userMenuLink.title = data.user.name; // Update tooltip
                            }

                            // Update email (e.g., in a modal or another element)
                            const userEmailElement = document.querySelector('#quick_user_toggle .user-email');
                            if (userEmailElement) {
                                userEmailElement.textContent = data.user.email || 'No email';
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching dashboard data:', error);
                            const elements = [
                                'system-efficiency', 'power-generation', 'energy-consumed',
                                'total-charging', 'one-hour-usage', 'total-capacity',
                                'panel-status', 'panel-angle'
                            ];
                            elements.forEach(id => {
                                document.getElementById(id).textContent = 'Error';
                            });
                            // Handle user data error
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
    </div>
</body>

</html>