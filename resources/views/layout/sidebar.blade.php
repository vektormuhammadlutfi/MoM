<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main" >
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="p-0 text-center mt-3" href="/dashboard">
        <img src="{{asset('logo.png')}}" width="170" alt="...">
      </a>
      <!-- Collapse -->
      <div class="collapse navbar-collapse mt-4 mb-6 pt-0" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row my-3">
            <div class="col-6 collapse-brand">
              <a href="/dashboard">
                <img src="{{URL::asset('/logo.png')}}">
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
        {{-- <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form> --}}
        <!-- Navigation -->
        <div >
          <h5 class="navbar-heading text-kalla-secondary mb-0">Dashboard</h5>
          <ul class="navbar-nav mb-0 mt-0">
            <li class="nav-item ">
              <a class="nav-link {{$title === 'Dashboard'? 'menu-active':''}}" href="./dashboard">
                <i class="ni ni-tv-2 "></i> Dashboard
              </a>
            </li>
          </ul>
        </div>
        
        {{-- @if (Auth::user()->usergroup == 'sysdev' || Auth::user()->usergroup == 'admin')
        <hr class="my-2">
        <div>
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
        @endif  --}}
        @if (Auth::user()->usergroup == 'sysdev')
        <hr class="my-2">
        <div >
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
                <iconify-icon icon="charm:git-branch" style="margin-right: 18px; font-size: 17px"></iconify-icon> Branch
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{$title === 'Type Of MoM'? 'menu-active':''}}" href="/jenismom">
                <i class="fa-sharp fa-solid fa-window-restore" ></i>Type Of MoM
              </a>
            </li>
          </ul>
        </div>
        @endif
        @if (Auth::user()->usergroup == 'sysdev' || Auth::user()->usergroup == 'admin')
        <hr class="my-2">
        <div >
          <h5 class="navbar-heading text-kalla-secondary mb-0">Transaction</h5>
          <ul class="navbar-nav mt-0 mb-0">
            <li class="nav-item">
              <a class="nav-link {{$title === 'Mom'? 'menu-active':''}}" href="/mom">
                <iconify-icon icon="clarity:note-solid" style="margin-right: 18px; font-size: 17px"></iconify-icon> MoM
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{$title === 'Mom Detail'? 'menu-active':''}}" href="/momdetail">
                <iconify-icon icon="fluent:apps-list-detail-24-filled" style="margin-right: 18px; font-size: 17px"></iconify-icon> MoM Detail
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{$title === 'Mom Documentation'? 'menu-active':''}}" href="/momdescription">
                <i class="fa fa-list-alt" aria-hidden="true" ></i>Mom Documentation
              </a>
            </li>
          </ul>
        </div>
        @endif
        <hr class="my-2">
        <div>
          <h5 class="navbar-heading text-kalla-secondary mb-0">Report</h5>
          <ul class="navbar-nav mt-0 mb-0">
            <li class="nav-item">
              <a class="nav-link {{$title === 'Mom Report'? 'menu-active':''}}" href="/momreport">
                <iconify-icon icon="fluent:document-bullet-list-24-filled" style="margin-right: 18px; font-size: 18px"></iconify-icon> MoM Report
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{$title === 'Documentation'? 'menu-active':''}}" href="/momreportdoc">
                <iconify-icon icon="fluent:document-arrow-down-20-filled" style="margin-right: 18px; font-size: 18px"></iconify-icon> Documentation
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{$title === 'Summary'? 'menu-active':''}}" href="/summary">
                <i class="fa fa-folder-open" aria-hidden="true" ></i>Summary
              </a>
            </li>
          </ul>
        </div>
        @if (Auth::user()->usergroup == 'sysdev')
        <hr class="my-2">
        <div>
          <h5 class="navbar-heading text-kalla-secondary mb-0">Settings</h5>
          <ul class="navbar-nav mt-0 mb-0">
            <li class="nav-item">
              <a class="nav-link {{$title === 'User'? 'menu-active':''}}" href="/user">
                <i class="fa-solid fa-person-chalkboard"></i>User
              </a>
              <a class="nav-link {{$title === 'group'? 'menu-active':''}}" href="/group">
                <i class="fa-solid fa-address-card"></i>Group
              </a>
            </li>
          </ul>
        </div>
        @endif
      </div>
    </div>
  </nav>