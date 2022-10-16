<!DOCTYPE html>
<html lang="en">

@include('layout.head')

<body class="">
  {{-- sidebar --}}
  @include('layout.sidebar')
  <div class="main-content">
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Nama Halaman/brand -->
        <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">{{$title}}</a>
        @include('navbar.navuser')
      </div>
    </nav>
    @include('navbar.navbg')
    @yield('content')
  </div>
    <!--   Core   -->
  @include('layout.script')
  @stack('addon-script')
</body>
</html>
