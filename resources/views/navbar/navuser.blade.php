{{-- user in navbar --}}
<ul class="navbar-nav align-items-center d-none d-md-flex">
  <li class="nav-item dropdown">
    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <div class="media align-items-center">
        <div class="media-body mr-2 d-none d-lg-block">
          <span class="mb-0 text-sm  font-weight-bold">Selamat Datang | {{auth()->user()->username}}</span>
        </div>
        @if (auth()->user()->profile_photo_path)
          <span class="avatar avatar-sm rounded-circle photo-profile"
            style="width:32px;height:32px;
                    background-image: url('{{ asset('storage/'.auth()->user()->profile_photo_path) }}')">
        @else
          <span class="avatar avatar-sm rounded-circle">
              <img src="../assets/img/default_profil.png" class="rounded-circle" alt="{{ auth()->user()->username }}">
          </span>
        @endif        
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
        @method('post')
        @csrf
        <button class="dropdown-item">
          <i class="ni ni-user-run"></i>
          <span>Logout</span>
        </button>
      </form>
    </div>
  </li>
</ul>