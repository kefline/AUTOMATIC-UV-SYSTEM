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