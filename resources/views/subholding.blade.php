@extends('layout.coreview')

@section('content')
{{-- navigasi atas(nama, search, user) --}}
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
  <div class="container-fluid">
    <!-- Nama Halaman/brand -->
    <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Sub Holding</a>
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
          <h3 class="mb-0"><i class="fa-solid fa-list text-red"></i> Data Sub Holding</h3>
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
                    <th style="font-size: 13px">Sub Holding Name</th>
                    <th style="font-size: 13px">Holding Name</th>
                    <th style="font-size: 13px">Action</th>
                </tr>
            </thead>
            <tbody>
              <?php $no=1; ?>
              
              @foreach ($subholding as $item)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $item->oid_subholding }}</td>
                  <td>{{ $item->subholding }}</td>
                  <td>{{$item->holding}}</td>
                  <td>
                    <button class="btn btn-success btn-sm py-2" type="button" data-toggle="modal" data-target="#editBackdrop"><i class="fa-solid fa-pen-to-square"></i></button>
                    <a  href="/deletesubholding/{{$item->id}}" class="btn btn-danger btn-sm py-2"><i class="fa-solid fa-trash-can"></i></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
    {{-- @error('subholding')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror --}}
 {{-- footer gaess --}}
  <div class="container-fluid mt--7">
    <div class="row mt-5" style="min-height: 200px">
    </div>
    <!-- Footer -->
    @include('layout.footer')
    {{-- <script>
      function submit(){
        if(document.getElementById('inputsubholding').value == ''){
          alert("Input")
        }
      }
    </script> --}}
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
        <form method="POST" action="/tambahsubholding">
          @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Sub Holding</label>
                <input type="text" id="inputsubholding" name="subholding" class="form-control @error('subholding') is-invalid @enderror"
                 placeholder="Masukkan nama sub holding" id="inputsubholding" aria-describedby="emailHelp">
                @error('subholding')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <label for="exampleFormControlSelect1">Nama Holding</label>
            <select class="form-control" name="oid_holding" id="exampleFormControlSelect1">
            <option class="dropdown-item" value="H-001">HADJI KALLA(Kalla Group)</option>
          </select>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
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
          @csrf
          <div class="form-group">
              <label for="exampleInputEmail1">Nama Sub Holding</label>
              <input type="text" name="namesbu" class="form-control" placeholder="Masukkan nama sbu" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <label for="exampleFormControlSelect1">Nama Holding</label>
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
