@extends('layout.coreview')
@section('content')
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
  <div class="container-fluid">
    <!-- Nama Halaman/brand -->
    <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="/register">User</a>
    @include('layout.navuser')
  </div>
</nav>


 {{-- content utama dibawah ini yaa --}}
<div class="main-content mb-5">

  <!-- Page content -->
  <div class="container mt--8">
    <!-- Table -->
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <div class="card bg-secondary shadow border-0">

          <div class="card-body px-lg-5 py-lg-5">
            <div class="text-center text-muted mb-5">
              <h2>Create User</h2>
            </div>
            <form role="form" action="/user" method="post">
              @method('post')
              @csrf
              <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                  </div>
                  <input type="text" name="username" placeholder="User Name" value="{{ old('username') }}" id="username" class="form-control  @error('username') is-invalid @enderror" required/>
                  @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" id="email" class="form-control  @error('email') is-invalid @enderror" required/>
                  @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-sharp fa-solid fa-phone"></i></i></span>
                  </div>
                  <input type="number" name="hp" value="{{ old('hp') }}" id="hp" class="form-control  @error('hp') is-invalid @enderror" placeholder="Phone"/>
                  @error('hp')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-user-group"></i></span>
                  </div>
                  <select class="form-control" name="usergroup" id="usergroup">
                    @foreach ($usergroupinput as $d)
                      <option class="dropdown-item" value="{{ $d }}" id="ug">{{ $d }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input type="password" name="password" value="{{ old('password') }}" id="pass" class="form-control  @error('password') is-invalid @enderror" placeholder="Password" required/>
                  @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input type="password" name="confirm_password" id="confirm_password" class="form-control  @error('confirm_password') is-invalid @enderror" placeholder="Confirm Password" required/>
                  @error('confirm_password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="text-center">
                <a href="/user" class="btn btn-secondary mt-4">Back</a>
                <button type="submit" class="btn btn-success mt-4">Create User</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- footer gaess --}}
@include('layout.footer')
@endsection