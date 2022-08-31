<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Argon Dashboard
  </title>

  <!-- Favicon -->
  <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="./assets/js/plugins/@fornawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">

  <link href="./assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0 pb-0" href="./index.html">
        <img src="./assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
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
                <img alt="Image placeholder" src="./assets/img/theme/team-1-800x800.jpg">
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
                <img src="./assets/img/brand/blue.png">
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
        <h5 class="navbar-heading text-success mb-0 pb-0">Dashboard</h5>
        <ul class="navbar-nav mb-0 mt-0">
          <li class="nav-item active ">
            <a class="nav-link active " href="./dashboard">
              <i class="ni ni-tv-2 text-yellow"></i> Dashboard
            </a>
          </li>
        </ul>

        <hr class="my-1 mt-1">
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

        <hr class="my-1 mt-1">
        <h5 class="navbar-heading text-success mb-0 pb-0">Master</h5>
        <ul class="navbar-nav mt-0 mb-0">
          <li class="nav-item  active ">
            <a class="nav-link  active " href="/dashboard">
              <i class="fa-solid fa-building" style="color: #FFB200"></i>Sub Holding
            </a>
          </li>
          <li class="nav-item  active ">
            <a class="nav-link  active " href="/sbu">
              <i class="fa-solid fa-building text-red"></i>SBU
            </a>
          </li>
          <li class="nav-item  active ">
            <a class="nav-link  active " href="/dashboard">
              <i class="fa-solid fa-code-branch" style="color: #5BB318"></i>Branch
            </a>
          </li>
        </ul>

        <hr class="my-1 mt-1">
        <h5 class="navbar-heading text-success mb-0 pb-0">Transaksi</h5>
        <ul class="navbar-nav mt-0 mb-0">
          <li class="nav-item  active ">
            <a class="nav-link  active " href="/dashboard">
              <i class="fa-solid fa-floppy-disk" style="color: #002B5B"></i>Mom Detail
            </a>
          </li>
        </ul>

        <hr class="my-1 mt-1">
        <h5 class="navbar-heading text-success mb-0 pb-0">Report</h5>
        <ul class="navbar-nav mt-0 mb-0">
          <li class="nav-item  active ">
            <a class="nav-link  active " href="/dashboard">
              <i class="fa-solid fa-book text-warning"></i>Report
            </a>
          </li>
        </ul>

        <hr class="my-1 mt-1">
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
            <a href="/dashboard" class="nav-link active">
              <i class="ni ni-collection  text-red"></i>Collection
            </a>
            <a href="/register" class="nav-link active">
              <i class="ni ni-collection  text-red"></i>Test Register
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="main-content">
    @yield('content')
  </div>

  <p>test</p>
    <!--   Core   -->
  <script src="./assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="./assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="./assets/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="./assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
  <!--   Argon JS   -->
  <script src="./assets/js/argon-dashboard.min.js?v=1.1.2"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>

  <script src="//code.jquery.com/jquery-3.5.1.js"></script>
  <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="//cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
  <script src="./assets/js/table.js"></script>

  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>

</body>
</body>