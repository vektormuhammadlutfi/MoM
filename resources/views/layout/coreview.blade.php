<!DOCTYPE html>
<html lang="en">

@include('layout.head')

<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main" >
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="p-0 text-center mt-3" href="./index.html">
        <img src="./logo.png" width="170" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>


        <!-- user -->
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="{{URL::asset('/assets/img/theme/team-1-800x800.jpg')}}">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse mt-4 mb-6 pt-0" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                <img src="{{URL::asset('/assets/img/brand/blue.png')}}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <div data-aos="fade-right" data-aos-delay="50">
          <h5 class="navbar-heading text-success mb-0 pb-0">Dashboard</h5>
          <ul class="navbar-nav mb-0 mt-0">
            <li class="nav-item active ">
              <a class="nav-link active " href="./dashboard">
                <i class="ni ni-tv-2 text-yellow"></i> Dashboard
              </a>
            </li>
          </ul>
        </div>

        <hr class="my-1 mt-1">
        <div data-aos="fade-right" data-aos-delay="100">
          <h5 class="navbar-heading text-success m-0 p-0">Common</h5>
          <ul class="navbar-nav mt-0 mb-0">
            <li class="nav-item active ">
              <a class="nav-link  active " href="/dashboard">
                <i class="fa-solid fa-map-location text-info"></i>Provinsi
              </a>
            </li>
            <li class="nav-item  active ">
              <a class="nav-link  active " href="/dashboard">
                <i class="fa-solid fa-map-location text-warning"></i>Kabupaten/Kota
              </a>
            </li>
          </ul>
        </div>
        <hr class="my-1 mt-1">
        <div data-aos="fade-right" data-aos-delay="150">
          <h5 class="navbar-heading text-success mb-0 pb-0">Master</h5>
          <ul class="navbar-nav mt-0 mb-0">
            <li class="nav-item  active ">
              <a class="nav-link  active " href="/subholding">
                <i class="fa-solid fa-building" style="color: #FFB200"></i>Sub Holding
              </a>
            </li>
            <li class="nav-item  active ">
              <a class="nav-link  active " href="/sbu">
                <i class="fa-solid fa-building text-red"></i>SBU
              </a>
            </li>
            <li class="nav-item  active ">
              <a class="nav-link  active " href="/branch">
                <i class="fa-sharp fa-solid fa-house-user" style="color: #5BB318"></i> Branch
              </a>
            </li>
            <li class="nav-item  active ">
              <a class="nav-link  active " href="/jenismom">
                <i class="fa-sharp fa-solid fa-window-restore" style="color: #e018b5"></i>Jenis Mom
              </a>
            </li>
          </ul>
        </div>
        

        <hr class="my-1 mt-1">
        <div data-aos="fade-right" data-aos-delay="200">
          <h5 class="navbar-heading text-success mb-0 pb-0">Transaksi</h5>
          <ul class="navbar-nav mt-0 mb-0">
            <li class="nav-item  active ">
              <a class="nav-link  active " href="/momdetail">
                <i class="fa-sharp fa-solid fa-handshake-simple" style="color: #188fb3"></i>Mom
              </a>
            </li>
            <li class="nav-item  active ">
              <a class="nav-link  active " href="/momdetail">
                <i class="fa-solid fa-list-check" style="color: #a37643"></i>Mom Detail
              </a>
            </li>
            <li class="nav-item  active ">
              <a class="nav-link  active " href="/momdetail">
                <i class="fa fa-list-alt" aria-hidden="true" style="color: #bb0000"></i>Mom Description
              </a>
            </li>
          </ul>
        </div>
        <hr class="my-1 mt-1">
        <div>
          <h5 class="navbar-heading text-success mb-0 pb-0">Report</h5>
          <ul class="navbar-nav mt-0 mb-0">
            <li class="nav-item  active ">
              <a class="nav-link  active " href="/momdetail">
                <i class="fa-sharp fa-solid fa-file text-red" ></i>Mom
              </a>
            </li>
            <li class="nav-item  active ">
              <a class="nav-link  active " href="/momdetail">
                <i class="fa-solid fa-floppy-disk" style="color: #005b40"></i>Doc Mom
              </a>
            </li>
            <li class="nav-item  active ">
              <a class="nav-link  active " href="/momdetail">
                <i class="fa fa-folder-open" aria-hidden="true" style="color: #fffb00"></i>Summary
              </a>
            </li>
          </ul>
        </div>
        <hr class="my-1 mt-1">
        <div>
          <h5 class="navbar-heading text-success mb-0 pb-0">Settings</h5>
          <ul class="navbar-nav mt-0 mb-0">
            <li class="nav-item  active ">
              <a class="nav-link  active " href="/dashboard">
                <i class="fa-solid fa-person-chalkboard text-green"></i>User
              </a>
            </li>
            <li class="nav-item  active ">
              <a class="nav-link  active " href="/dashboard">
                <i class="fa-solid fa-address-card text-primary"></i>Group
              </a>
              <a href="/register" class="nav-link active">
                <i class="ni ni-collection  text-red"></i>Test Register
              </a>
              <a href="/login" class="nav-link active">
                <i class="ni ni-collection  text-red"></i>Test Login
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="main-content">
    @yield('content')
  </div>
    <!--   Core   -->
  @include('layout.script')
  @stack('addon-script')
</body>
</html>
