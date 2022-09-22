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
      <a class="p-0 text-center mt-3" href="/dashboard">
        <img src="{{URL::asset('./logo.png')}}" width="170" alt="...">
      </a>
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
          <h5 class="navbar-heading text-kalla-secondary mb-0">Dashboard</h5>
          <ul class="navbar-nav mb-0 mt-0">
            <li class="nav-item ">
              <a class="nav-link {{$title === 'Dashboard'? 'menu-active':''}}" href="./dashboard">
                <i class="ni ni-tv-2 "></i> Dashboard
              </a>
            </li>
          </ul>
        </div>

        <hr class="my-1 mt-1">
        <div data-aos="fade-right" data-aos-delay="100">
          <h5 class="navbar-heading text-kalla-secondary m-0 p-0">Common</h5>
          <ul class="navbar-nav mt-0 mb-0">
            <li class="nav-item">
              <a class="nav-link {{$title === 'Provinsi'? 'menu-active':''}}" href="/dashboard">
                <i class="fa-solid fa-map-location "></i>Provinsi
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{$title === 'Kabupaten/Kota'? 'menu-active':''}}" href="/dashboard">
                <i class="fa-solid fa-map-location "></i>Kabupaten/Kota
              </a>
            </li>
          </ul>
        </div>
        <hr class="my-1 mt-1">
        <div data-aos="fade-right" data-aos-delay="150">
          <h5 class="navbar-heading text-kalla-secondary mb-0">Master</h5>
          <ul class="navbar-nav mt-0 mb-0">
            <li class="nav-item">
              <a class="nav-link {{$title === 'Sub Holding'? 'menu-active':''}}" href="/subholding">
                <i class="fa-solid fa-building" ></i>Sub Holding
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{$title === 'SBU'? 'menu-active':''}}" href="/sbu">
                <i class="fa-solid fa-building "></i>SBU
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{$title === 'Branch'? 'menu-active':''}}" href="/branch">
                <i class="fa-sharp fa-solid fa-house-user" ></i> Branch
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{$title === 'Jenis Mom'? 'menu-active':''}}" href="/jenismom">
                <i class="fa-sharp fa-solid fa-window-restore" ></i>Jenis Mom
              </a>
            </li>
          </ul>
        </div>
        

        <hr class="my-1 mt-1">
        <div data-aos="fade-right" data-aos-delay="200">
          <h5 class="navbar-heading text-kalla-secondary mb-0">Transaksi</h5>
          <ul class="navbar-nav mt-0 mb-0">
            <li class="nav-item">
              <a class="nav-link {{$title === 'Mom'? 'menu-active':''}}" href="/mom">
                <i class="fa-sharp fa-solid fa-handshake-simple" ></i>Mom
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{$title === 'Mom Detail'? 'menu-active':''}}" href="/momdetail">
                <i class="fa-sharp fa-solid fa-handshake-simple" ></i>Mom Detail
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{$title === 'Mom Description'? 'menu-active':''}}" href="/momdescription">
                <i class="fa fa-list-alt" aria-hidden="true" ></i>Mom Description
              </a>
            </li>
          </ul>
        </div>
        <hr class="my-1 mt-1">
        <div>
          <h5 class="navbar-heading text-kalla-secondary mb-0">Report</h5>
          <ul class="navbar-nav mt-0 mb-0">
            <li class="nav-item">
              <a class="nav-link {{$title === 'Mom Report'? 'menu-active':''}}" href="/momdetail">
                <i class="fa-sharp fa-solid fa-file " ></i>Mom
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{$title === 'Doc Mom'? 'menu-active':''}}" href="/momdetail">
                <i class="fa-solid fa-floppy-disk" ></i>Doc Mom
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{$title === 'Summary'? 'menu-active':''}}" href="/momdetail">
                <i class="fa fa-folder-open" aria-hidden="true" ></i>Summary
              </a>
            </li>
          </ul>
        </div>
        <hr class="my-1 mt-1">
        <div>
          <h5 class="navbar-heading text-kalla-secondary mb-0">Settings</h5>
          <ul class="navbar-nav mt-0 mb-0">
            <li class="nav-item">
              <a class="nav-link {{$title === 'User'? 'menu-active':''}}" href="/dashboard">
                <i class="fa-solid fa-person-chalkboard "></i>User
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/dashboard">
                <i class="fa-solid fa-address-card "></i>Group
              </a>
              <a href="/register" class="nav-link {{$title === 'register'? 'menu-active':''}}">
                <i class="ni ni-collection  "></i>Test Register
              </a>
              <a href="/login" class="nav-link {{$title === 'login'? 'menu-active':''}}">
                <i class="ni ni-collection  "></i>Test Login
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
