@extends('layout.coreview')

@section('content')
{{-- navigasi atas(nama, search, user) --}}
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
  <div class="container-fluid">
    <!-- Nama Halaman/brand -->
    <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Dashboard</a>
    @include('navbar.navuser')
    
  </div>
</nav>
  @include('navbar.navbg')




{{-- content utama dibawah ini yaa --}}
<div class="card shadow-lg bg-body" style="
        margin: -150px auto 100px auto;
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
            <div class="form-outline mb-3">
              <label for="form3Example3">Email address</label>
              <input type="email" id="form3Example3" class="form-control" />
            </div>
            <div class="form-outline mb-3">
              <label class="form-label" for="form3Example4">Password</label>
              <input type="password" id="form3Example4" class="form-control" />
            </div>
            <div class="form-outline mb-3">
              <label class="form-label" for="form3Example4">Confirm Password</label>
              <input type="password" id="form3Example4" class="form-control" />
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block my-4">
              Sign up
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>


{{-- footer gaess --}}
<div class="container-fluid mt--7">
  <div class="row mt-5" style="min-height: 200px">
  </div>
  <!-- Footer -->
  @include('layout.footer')
</div>
@endsection