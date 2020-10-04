<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-right" href="/">
      {{-- <div class="sidebar-brand-icon rotate-n-15"> --}}
        {{-- <i class="fas fa-laugh-wink"></i> --}}
      {{-- </div> --}}
      <div class="sidebar-brand-text mx-3">MY Class </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="/admin/dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    {{-- Only for admin --}}
    @if(Auth::user()->user_role=='1')
    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="/admin/teacher">
        <i class="fas fa-chalkboard-teacher"></i>
        {{-- <i class="fas fa-fw fa-chart-area"></i> --}}
        <span>Teacher</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
      <a class="nav-link" href="/admin/student">
        <i class="fas fa-user"></i>
        {{-- <i class="fas fa-fw fa-table"></i> --}}
        <span>Student</span></a>
    </li>

    <hr class="sidebar-divider">

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="/admin/class">
            <i class="fas fa-school"></i>
          {{-- <i class="fas fa-fw fa-table"></i> --}}
          <span>Class</span></a>
    </li>
    
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="/admin/payment">
            <i class="far fa-money-bill-alt"></i>
          {{-- <i class="fas fa-fw fa-table"></i> --}}
          <span>Payment</span></a>
    </li>

     <!-- Nav Item - Tables -->
     <li class="nav-item">
      <a class="nav-link" href="/admin/enrollment">
          <i class="far fa-money-bill-alt"></i>
        {{-- <i class="fas fa-fw fa-table"></i> --}}
        <span>Enrollement</span></a>
  </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
  @endif
  {{-- Only for teachers (user_role = 2) --}}
  @if(Auth::user()->user_role=='2')
    <!-- Nav Item - Tables -->
    <li class="nav-item">
      <a class="nav-link" href="/admin/notification">
          <i class="far fa-bell"></i>
        {{-- <i class="fas fa-fw fa-table"></i> --}}
        <span>Notification</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/admin/teacher-payment-history">
          <i class="far fa-money-bill-alt"></i>
        {{-- <i class="fas fa-fw fa-table"></i> --}}
        <span>Payment</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
  @endif

  @if(Auth::user()->user_role=='3')
  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link" href="/admin/payment">
        <i class="far fa-money-bill-alt"></i>
      {{-- <i class="fas fa-fw fa-table"></i> --}}
      <span>Payment</span></a>
</li>
  <hr class="sidebar-divider d-none d-md-block">
@endif
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>