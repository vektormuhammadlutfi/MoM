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
          <table id="example" class="mt-5 table-striped table-bordered table-data">
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
              <?php $no=1; ?>
              {{-- @foreach ($sbu as $sbuitem) --}}
              @foreach ($dataSbu as $sbuitem)
                <tr>
                  <td >{{ $no++ }}</td>
                  <td class="width-min07">{{ $sbuitem->oid_sbu }}</td>
                  <td class="width-min1">{{ $sbuitem->sbu_name }}</td>
                  <td class="width-min1">{{ $sbuitem->subholding }}</td>
                  <td class="width-min07">
                    <a href="#" class="btn btn-success btn-sm py-2 edit"><i class="fa-solid fa-pen-to-square"></i></a> 
                    {{-- <button class="btn btn-success btn-sm py-2 edit" type="button" data-toggle="modal" data-target="#editBackdrop"><i class="fa-solid fa-pen-to-square"></i></button> --}}
                    <a  href="#" class="btn btn-danger btn-sm py-2 delete"><i class="fa-solid fa-trash-can"></i></a>
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
      <form method="POST" action="{{ url('/sbu') }}">
        @method('post')
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama SBU</label>
                <input type="text" name="sbu_name" class="form-control @error('sbu_name') is-invalid @enderror" placeholder="Masukkan nama sbu" id="exampleInputEmail1">
                @error('sbu_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <label for="exampleFormControlSelect1">Nama Sub Holding</label>
            <select class="form-control" name="subholding" id="exampleFormControlSelect1">
              @foreach ($datasubholding as $sbuitem)
              <option class="dropdown-item" value="{{ $sbuitem->oid_subholding }}">{{ $sbuitem->subholding }}</option>
              @endforeach
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
      </form>
      
    </div>
  </div>
</div>
{{-- end create --}}

{{-- content modal edit data --}}
<div class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="staticBackdropLabel">Edit Data</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <form method="POST" action="/sbu" id="editform">
          @method('put')
          @csrf
          <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama SBU</label>
                <input type="text" name="sbu_name" class="form-control @error('sbu_name') is-invalid @enderror" placeholder="Masukkan nama sbu" id="sbu_name" value="{{ old('sbu_name') }}">
                @error('sbu_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <label for="exampleFormControlSelect1">Nama Sub Holding</label>
            <select class="form-control" name="subholding" id="subholding">
              @foreach ($datasubholding as $sbuitem)
              <option class="dropdown-item" value="{{ $sbuitem->oid_subholding }}">{{ old('subholding', $sbuitem->subholding) }}</option>
              @endforeach
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
    </div>
  </div>
</div>
{{-- end edit --}}

{{-- content modal delete data --}}
<div class="modal fade" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="staticBackdropLabel">Delete Data</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <form method="POST" action="/sbu" id="deleteform">
          @method('DELETE')
          @csrf
          <div class="modal-body">
            <div class="modal-footer text-left">
              <p class="mx-auto">Are You Sure You Want to Delete This Data?</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger">Delete</button>
          </div>
        </form>

    </div>
  </div>
</div>
{{-- end delete --}}

@push('addon-script')
<script type="text/javascript">
  $(document).ready(function () {
    var table = $('#example').DataTable();
    table.on('click', '.edit', function(){

        $tr = $(this).closest('tr');
        if($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }
        var data = table.row($tr).data();
        console.log(data);

        $('#sbu_name').val(data[2]);
        $('#subholding').val(data[3]);

        $('#editform').attr('action', '/sbu/'+data[1]);
        $('#editModal').modal('show');
      });

      table.on('click', '.delete', function(){

        $tr = $(this).closest('tr');
        if($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }
        var data = table.row($tr).data();
        // console.log(data);

        $('#deleteform').attr('action', '/sbu/'+data[1]);
        $('#deleteModal').modal('show');
      });

    });
</script>

@endpush