<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile not-navigation-link">
    </li>
    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('/') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('admin/users') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('/admin/users') }}">
        <i class="menu-icon mdi mdi-chart-line"></i>
        <span class="menu-title">Users</span>
      </a>
    </li>
    <li class="nav-item {{ request()->is('feedbacks') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('feedbacks') }}">
        <i class="menu-icon mdi mdi-table-large"></i>
        <span class="menu-title">Feedback</span>
      </a>
    </li>
    <li class="nav-item {{ request()->is('tables/basic-table') ? 'active' : '' }}">
      
      <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <i class="menu-icon mdi mdi-table-large"></i>
        <span class="menu-title">Logout</span>
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    </li>
  </ul>
</nav>