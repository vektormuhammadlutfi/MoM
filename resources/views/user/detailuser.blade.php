@extends('layout.coreview')
@section('content')
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
  <div class="container-fluid">
    <!-- Nama Halaman/brand -->
    <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="/register">User | Detail</a>
    @include('navbar.navuser')
  </div>
</nav>
 @include('navbar.navbg')

<div data-aos="fade-up" class="card shadow-lg bg-body" style=" margin: -150px auto 90px auto; background: hsl(0, 0%, 100%, 0.8); backdrop-filter: blur(30px); width: 95%; max-width: 800px;">
  <div class="card">
    <div class="card-body">
        
      <div class="d-flex justify-content-between">
        <h3 class="mb-0"><i class="fa-solid fa-list" style="color: #5BB318"></i> Detail User</h3>
        <a href="/user" class="btn btn-success py-1"><i class="fa-solid fa-backward-fast"></i> Back</a>
      </div>
      <hr class="mt-4 mb-4 pb-4">

      <!-- detail -->
      <div class="container">
        <div class="container mt-4">
          <div class="row">
            <h4 class="col">User Name</h4>
            <p class="col">{{$detailuser->username}}</p>
          </div>
          {{-- <hr class="mt-0"> --}}
        </div>
        <div class="container mt-4">
          <div class="row">
            <h4 class="col">First Name</h4>
            <p class="col">{{$detailuser->firs_name}}</p>
          </div>
        </div>
        {{-- <hr class="mt-0"> --}}
        <div class="container mt-4">
          <div class="row">
            <h4 class="col">Last Name</h4>
            <p class="col">{{$detailuser->last_name}}</p>
          </div>
        </div>
        {{-- <hr class="mt-0"> --}}
        <div class="container mt-4">
          <div class="row">
            <h4 class="col">Email User</h4>
            <p class="col">{{$detailuser->email}}</p>
          </div>
          {{-- <hr class="mt-0"> --}}
        </div> 

        <div class="container mt-4">
          <div class="row">
            <h4 class="col">Phone</h4>
            <p class="col">{{$detailuser->telp}} </p>
          </div>
        </div>
        {{-- <hr class="mt-0"> --}}
        <div class="container mt-4">
          <div class="row">
            <h4 class="col">User Group</h4>
            <p class="col">{{$detailuser->usergroup}}</p>
          </div>
        </div>
      </div>
      <!-- end detail -->
    </div>
  </div>
</div>
    
@endsection