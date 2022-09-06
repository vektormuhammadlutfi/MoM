@extends('layout.coreview')

@section('content')
{{-- navigasi atas(nama, search, user) --}}
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
  <div class="container-fluid">
    <!-- Nama Halaman/brand -->
    <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Mom Detail | Create</a>
    @include('navbar.navuser')
  </div>
</nav>
 @include('navbar.navbg')



{{-- content utama dibawah ini yaa --}}
<div class="card" style="
  margin: -150px auto 90px auto;
  backdrop-filter: blur(30px);
  max-width: 800px;
  width: 95%">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <h3 class="mb-0"><i class="fa-solid fa-list" style="color: #181bb3"></i> Create Mom Detail</h3>
        <a href="/momdetail" class="btn btn-primary py-1"><i class="fa-solid fa-backward-fast"></i> back</a>
      </div>
      <hr class="mt-3 mb-4 pb-4">

      <!-- detail -->
      <div class="col-lg-12 mx-auto">
        <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Holding</label>
            <input type="text" class="form-control" placeholder="Masukkan nama sbu" id="exampleInputEmail1" aria-describedby="emailHelp" disabled value="Hadji Kalla (Kalla Group)">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Sub Holding</label>
            <select class="form-control" id="exampleFormControlSelect1">
              <option class="dropdown-item">Pilihan Satu</option>
              <option class="dropdown-item">Pilihan dua</option>
              <option class="dropdown-item">Pilihan tiga</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">SBU</label>
            <select class="form-control" id="exampleFormControlSelect1">
              <option class="dropdown-item">Pilihan Satu</option>
              <option class="dropdown-item">Pilihan dua</option>
              <option class="dropdown-item">Pilihan tiga</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Branch Name</label>
            <input type="text" class="form-control" placeholder="Input Branch Name" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" class="form-control" placeholder="Input Address" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="text" class="form-control" placeholder="Input Email" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Phone Number</label>
            <input type="text" class="form-control" placeholder="Input Phone Number" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <input type="text" class="form-control" placeholder="Input Description" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="d-flex flex-row-reverse">
            <button type="submit" class="btn py-1 btn-primary">Create</button>
          </div>
      </form>
      </div>
      <!-- end detail -->

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