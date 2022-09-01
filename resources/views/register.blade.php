@extends('coreview')

@section('content')
<!-- Section: Design Block -->
<section>
  {{-- navbar --}}
  <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
      <!-- Brand -->
      <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Registrasi</a>
      <!-- Form -->
      <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
        <div class="form-group mb-0">
          <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input class="form-control" placeholder="Search" type="text">
          </div>
        </div>
      </form>
      <!-- User -->
      <ul class="navbar-nav align-items-center d-none d-md-flex">
        <li class="nav-item dropdown">
          <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="./assets/img/theme/team-4-800x800.jpg">
              </span>
              <div class="media-body ml-2 d-none d-lg-block">
                <span class="mb-0 text-sm  font-weight-bold">Admin</span>
              </div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Selamat Datang!</h6>
            </div>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>Profilku</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Pengaturan</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Aktifitas</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Pendukung</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Keluar</span>
            </a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Background image -->
  <div class="header bg-gradient-success pb-8 pt-5 pt-md-7" style="height: 300px"></div>
  {{-- <div class="p-5 bg-image" style="
        background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
        height: 300px;
        "></div> --}}
  <!-- Background image -->

  <div class="card shadow-lg bg-body" style="
        margin: -170px auto 100px auto;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        max-width: 600px;
        width: 95%
        ">
    <div class="card-body py-4" >
      <div class="row d-flex justify-content-center">
        
        <div class="col-lg-10">
          <h2 class="fw-bold mb-4 text-center">Sign up now</h2>
          <form>
            <div class="form-outline mb-3">
              <label for="form3Example3">First Name</label>
              <input type="email" id="form3Example3" class="form-control" />
            </div>
            <div class="form-outline mb-3"> 
              <label class="text-align-left" for="form3Example3">Last Name</label>
              <input type="email" id="form3Example3" class="form-control" />
            </div>
            <!-- Email input -->
            <div class="form-outline mb-3">
              <label for="form3Example3">Email address</label>
              <input type="email" id="form3Example3" class="form-control" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
              <label class="form-label" for="form3Example4">Password</label>
              <input type="password" id="form3Example4" class="form-control" />
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block my-4">
              Sign up
            </button>

            <!-- Register buttons -->
            {{-- <div class="text-center">
              <p>or sign up with:</p>
              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
              </button>

              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-google"></i>
              </button>

              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-twitter"></i>
              </button>

              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-github"></i>
              </button>
            </div> --}}
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
    
@endsection