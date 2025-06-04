<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="https://solar-admin-template.multipurposethemes.com/bs5/images/favicon.ico">

  <title>@yield('title')</title>

  <link rel="stylesheet" href="https://solar-admin-template.multipurposethemes.com/bs5/template/vertical/src/css/vendors_css.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/css/skin_color.css">

  @yield('styles')
</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

  <div class="wrapper">
    <div id="loader"></div>

    @include('layouts.header')
    @include('layouts.sidebar')

    <div class="content-wrapper">
      <div class="container-full">
        @yield('content')
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

    @include('layouts.user-profile-modal')
    @include('layouts.chat-box')

    <script src="/assets/js/vendors.min.js"></script>
    <script src="/assets/js/chat-popup.js"></script>
    <script src="/assets/js/feather.min.js"></script>
    <script src="/assets/js/demo.js"></script>
    <script src="/assets/js/template.js"></script>

    @yield('scripts')
  </div>
</body>
</html> 