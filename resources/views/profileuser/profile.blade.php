@extends('layout.coreview')
@section('content')

<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
  <div class="container-fluid">
    <!-- Nama Halaman/brand -->
    <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="/register">User Profile</a>
    {{-- @include('navbar.navuser') --}}
    {{-- user in navbar --}}
    <ul class="navbar-nav align-items-center d-none d-md-flex">
      <li class="nav-item dropdown">
        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="media align-items-center">
            <div class="media-body mr-2 d-none d-lg-block">
              <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->username }}</span>
            </div>
            <span class="avatar avatar-sm rounded-circle">
              <img alt="Image placeholder" src="{{URL::asset('/assets/img/theme/team-4-800x800.jpg')}}">
            </span>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
          <div class=" dropdown-header noti-title">
            <h6 class="text-overflow m-0">Welcome!</h6>
          </div>
          <a href="/profile" class="dropdown-item">
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
          <form action="{{ url('/logout') }}" method="post">
            @csrf
            <button class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </button>
          </form>
        </div>
      </li>
    </ul>
  </div>
</nav>


{{-- content utama dibawah ini yaa --}}
<!-- Header -->
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 500px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-dark opacity-8"></span>
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
      <div class="col-lg-7 col-md-10">
        <h2 class="display-2 text-white">Hello {{ auth()->user()->username  }}</h2>
        <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
        {{-- <a href="#!" class="btn btn-success">Edit profile</a>
        <a href="#!" class="btn btn-warning">Ganti Sandi</a> --}}
      </div>
    </div>
  </div>
</div>

<!-- Page content -->
<div class="container-fluid mb-5 mt--7">
  <div class="row">
    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
      <div class="card card-profile shadow">
        <div class="row justify-content-center">
          <div class="col-lg-3 order-lg-2">
            <div class="card-profile-image">
              <a href="#">
                <img src="../assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
              </a>
            </div>
          </div>
        </div>
        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
          <div class="d-flex justify-content-between">
            {{-- <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
            <a href="#" class="btn btn-sm btn-default float-right">Message</a> --}}
          </div>
        </div>
        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4"></div>
        <div class="card-body pt-0 pt-md-4">
          <div class="mt-5">
            <h3>
              @if (auth()->user()->firs_name !== null && auth()->user()->last_name !== null)
                {{ auth()->user()->first_name  }} {{ auth()->user()->last_name  }} 
              @else
                {{ auth()->user()->username  }} 
              @endif
            </h3> 
            <hr class="my-4" />
            <div class="form-group">
              <h5 class="heading-small text-muted mb-3">Rule</h5>
              <input type="text" id="input-last-name" class="font-16 form-control bg-secondary form-control-alternative" placeholder="Admin" value="{{ auth()->user()->usergroup }}" disabled style="padding: 10px; width: 100%;">
            </div> 
            {{-- <label for="role">Role</label>
            <input type="form-control font-16" value="{{ auth()->user()->usergroup }}" disabled/> --}}
            <hr class="my-4" />
            <form class="text-left">
              <h5 class="heading-small text-muted mb-3">Ganti Kata Sandi</h5>
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend bg-secondary">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input type="password" name="password" value="{{ old('password') }}" id="pass" class="form-control bg-secondary px-2 @error('password') is-invalid @enderror" placeholder="Password" required/>
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
                  <input type="password" name="confirm_password" id="confirm_password" class="form-control bg-secondary px-2 @error('confirm_password') is-invalid @enderror" placeholder="Confirm Password" required/>
                  @error('confirm_password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <button type="submit" class="btn btn-success">Save</button>
              {{-- <div class="text-center">
                <button type="submit" class="btn btn-success mt-2">Ganti Sandi</button>
              </div> --}}
            </form>
            {{-- <a href="#!" class="btn btn-success">Edit profile</a>
            <a href="#!" class="btn btn-warning">Ganti Sandi</a> --}}
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-8 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">My account</h3>
            </div>
            <div class="col-4 text-right">
              {{-- <a href="#!" class="btn btn-sm btn-primary">Settings</a> --}}
            </div>
          </div>
        </div>
        <div class="card-body">
           <form>
            <h6 class="heading-small text-muted mb-4">User information</h6>
            <div class="pl-lg-4">
              {{-- <div class="row"> --}}
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Username</label>
                    <input type="text" id="input-username" class="font-16 form-control form-control-alternative" placeholder="Username" value="{{ auth()->user()->username }}" disabled>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">Email address</label>
                    <input type="email" id="input-email" class="font-16 form-control form-control-alternative" placeholder="{{ auth()->user()->email }}" disabled>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label" for="input-first-name">First name</label>
                    <input type="text" id="input-first-name" class="font-16 form-control form-control-alternative" placeholder="Has no first name" value="{{ auth()->user()->firs_name }}" disabled>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label" for="input-last-name">Last name</label>
                    <input type="text" id="input-last-name" class="font-16 form-control form-control-alternative" placeholder="Has no last name" value="{{ auth()->user()->last_name }}" disabled>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label" for="input-first-name">Nomor Telpon</label>
                    <input type="text" id="input-first-name" class="font-16 form-control form-control-alternative" placeholder="082194947882" value="{{ auth()->user()->telp }}" disabled>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label" for="input-last-name">User Group</label>
                    <input type="text" id="input-last-name" class="font-16 form-control form-control-alternative" placeholder="Admin" value="{{ auth()->user()->usergroup }}" disabled>
                  </div>
                </div>
              {{-- </div> --}}
              <hr class="my-4" />
              <!-- Description -->
              <h6 class="heading-small text-muted mb-4">About me</h6>
              <div class="pl-lg-4">
                <div class="form-group">
                  <label>About Me</label>
                  <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                </div>
              </div>
              
            </form>
          </div>
          {{-- <form>
            <h6 class="heading-small text-muted mb-4">User information</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Username</label>
                    <input type="text" id="input-username" class="font-16 form-control form-control-alternative" placeholder="Username" value="{{ auth()->user()->username }}" disabled>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">Email address</label>
                    <input type="email" id="input-email" class="font-16 form-control form-control-alternative" placeholder="{{ auth()->user()->email }}" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-first-name">First name</label>
                    <input type="text" id="input-first-name" class="font-16 form-control form-control-alternative" placeholder="Has no first name" value="{{ auth()->user()->firs_name }}" disabled>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-last-name">Last name</label>
                    <input type="text" id="input-last-name" class="font-16 form-control form-control-alternative" placeholder="Has no last name" value="{{ auth()->user()->last_name }}" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-first-name">Nomor Telpon</label>
                    <input type="text" id="input-first-name" class="font-16 form-control form-control-alternative" placeholder="082194947882" value="{{ auth()->user()->telp }}" disabled>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-last-name">User Group</label>
                    <input type="text" id="input-last-name" class="font-16 form-control form-control-alternative" placeholder="Admin" value="{{ auth()->user()->usergroup }}" disabled>
                  </div>
                </div>
              </div>
            </div>
            <hr class="my-4" />

            <!-- Description -->
            <h6 class="heading-small text-muted mb-4">About me</h6>
            <div class="pl-lg-4">
              <div class="form-group">
                <label>About Me</label>
                <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
              </div>
            </div>
          </form> --}}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection