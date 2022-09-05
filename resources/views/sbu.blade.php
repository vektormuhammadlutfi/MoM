@extends('layout.coreview')

@section('content')
{{-- navigasi atas(nama, search, user) --}}
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
  <div class="container-fluid">
    <!-- Nama Halaman/brand -->
    <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Sub Brach Unit</a>
    @include('navbar.navuser')
  </div>
</nav>
 @include('navbar.navbg')


{{-- content utama dibawah ini yaa --}}
<div class="card shadow-lg bg-body" style="
    margin: -150px auto 90px auto;
    background: hsla(0, 0%, 100%, 0.8);
    backdrop-filter: blur(30px);
    width: 95%">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <h3 class="mb-0"><i class="fa-solid fa-list text-red"></i> Data SBU</h3>
          <button class="btn btn-info py-1" type="button" data-toggle="modal" data-target="#staticBackdrop"><i class="fa-solid fa-plus"></i> Data Baru</button>
        </div>
        <hr class="mt-2 mb-4">
        {{-- table --}}
        <div class="table-responsive">
          <table id="example" class="mt-5 table-striped table-bordered table" style="min-width: 400px">
            <thead >
                <tr>
                    <th style="font-size: 13px">No</th>
                    <th style="font-size: 13px">Oid</th>
                    <th style="font-size: 13px">SBU Name</th>
                    <th style="font-size: 13px">Sub Holding Name</th>
                    <th style="font-size: 13px">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($dataSbu as $sbuitem)
                <tr>
                  <td>1</td>
                  <td>{{ $sbuitem->oid_sbu }}</td>
                  <td>{{ $sbuitem->sbu_name }}</td>
                  <td>Edinburgh</td>
                  <td>
                    <button class="btn btn-success btn-sm py-2" type="button" data-toggle="modal" data-target="#editBackdrop"><i class="fa-solid fa-pen-to-square"></i></button>
                    <a  href="/sbu" class="btn btn-danger btn-sm py-2"><i class="fa-solid fa-trash-can"></i></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
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

{{-- content modal create data --}}
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="staticBackdropLabel">Tambah Data</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama SBU</label>
                <input type="text" class="form-control" placeholder="Masukkan nama sbu" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <label for="exampleFormControlSelect1">Nama Sub Holding</label>
            <select class="form-control" id="exampleFormControlSelect1">
              <option class="dropdown-item">Pilihan Satu</option>
              <option class="dropdown-item">Pilihan dua</option>
              <option class="dropdown-item">Pilihan tiga</option>
              <option class="dropdown-item">Pilihan empat</option>
              <option class="dropdown-item">Pilihan lima</option>
            </select>
            <!-- <button type="submit" class="btn btn-primary">Create</button> -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Create</button>
      </div>
    </div>
  </div>
</div>
{{-- end create --}}

{{-- content modal edit data --}}
<div class="modal fade" id="editBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="staticBackdropLabel">Edit Data</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama SBU</label>
                <input type="text" name="namesbu" class="form-control" placeholder="Masukkan nama sbu" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <label for="exampleFormControlSelect1">Nama Sub Holding</label>
            <select class="form-control" name="namesubholding" id="exampleFormControlSelect1">
              <option class="dropdown-item">Pilihan Satu</option>
              <option class="dropdown-item">Pilihan dua</option>
              <option class="dropdown-item">Pilihan tiga</option>
              <option class="dropdown-item">Pilihan empat</option>
              <option class="dropdown-item">Pilihan lima</option>
            </select>
            <!-- <button type="submit" class="btn btn-primary">Create</button> -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Create</button>
      </div>
    </div>
  </div>
</div>
{{-- end create --}}
