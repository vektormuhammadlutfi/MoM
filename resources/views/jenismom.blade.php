@extends('layout.coreview')

@section('content')
{{-- navigasi atas(nama, search, user) --}}
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
  <div class="container-fluid">
    <!-- Nama Halaman/brand -->
    <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="/jenismom">Jenis Mom</a>
    @include('navbar.navuser')
  </div>
</nav>
 @include('navbar.navbg')




{{-- content utama dibawah ini yaa --}}
<div data-aos="fade-up" class="card shadow-lg bg-body" style="
  margin: -150px auto 90px auto;
  background: hsla(0, 0%, 100%, 0.8);
  backdrop-filter: blur(30px);
  width: 95%
  ">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <h3 class="mb-0"><i class="fa-solid fa-list" style="color: #e018b5"></i> Jenis MOM</h3>
        <button class="btn btn-info py-1" type="button" data-toggle="modal" data-target="#staticBackdrop"><i class="fa-solid fa-plus"></i> Data Baru</button>
      </div>
      <hr class="mt-2 mb-4">
      <div class="table-responsive">
        <table id="example" class="mt-5 table-striped table-bordered table-data" style="min-width: 400px">
          <thead >
              <tr>
                  <th style="font-size: 13px">No</th>
                  <th style="font-size: 13px">OID</th>
                  <th style="font-size: 13px">Jenis MOM</th>
                  <th style="font-size: 13px">Action</th>
              </tr>
          </thead>
          <tbody>
            <?php $no=1?>
            @foreach ($jenismom as $mom)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$mom->oid_jen_mom}}</td>
                  <td>{{$mom->jenis_mom}}</td>
                  <td>
                    <div class="d-flex">
                      <a href="#" class="btn btn-success btn-sm py-2" id="edit"><i class="fa-solid fa-pen-to-square"></i></a>

                      <form action="/jenismom/{{ $mom->oid_jen_mom }}" method="POST">
                        @method('delete')
                        @csrf
                        <button href="#" class="btn btn-danger btn-sm py-2" id="delete" onclick="return confirm('Yakin Ingin Menghapus Jenis Mom ?')">
                          <i class="fa-solid fa-trash-can"></i>
                        </button>
                      </form>
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
      <form method="POST" action="/jenismom">
        @method('post')
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Jenis MoM</label>
                <input type="text" name="jenis_mom" class="form-control @error('jenis_mom') is-invalid @enderror" placeholder="Masukkan nama jenis mom" id="exampleInputEmail1">
                @error('jenis_mom')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn" style="background-color: #e018b5; color:white">Create</button>
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
      <form method="POST" action="/jenismom" id="editform">
        @method('put')
        @csrf
        <div class="modal-body">
          <div class="form-group">
              <label for="exampleInputEmail1">Nama Sub Holding</label>
              <input type="text" name="jenis_mom" class="form-control" placeholder="Masukkan nama Sub Holding" id="jenis_mom" aria-describedby="emailHelp">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
      
    </div>
  </div>
</div>
{{-- end create --}}
@endsection

@push('addon-script')
<script type="text/javascript">
  $(document).ready(function () {
    var table = $('#example').DataTable();
    table.on('click', '#edit', function(){
      $tr = $(this).closest('tr');
      if($($tr).hasClass('child')) {
          $tr = $tr.prev('.parent');
      }
      var data = table.row($tr).data();
      $('#jenis_mom').val(data[2]);

      $('#editform').attr('action', '/jenismom/'+data[1]);
      $('#editModal').modal('show');

    });
  });
</script>
    
@endpush