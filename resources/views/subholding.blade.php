@extends('layout.coreview')

@section('content')
{{-- navigasi atas(nama, search, user) --}}
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
  <div class="container-fluid">
    <!-- Nama Halaman/brand -->
    <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="/subholding">Sub Holding</a>
    @include('navbar.navuser')
  </div>
</nav>
 @include('navbar.navbg')


{{-- content utama dibawah ini yaa --}}
<div data-aos="fade-up" class="card shadow-lg bg-body mx-4 mt--150">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <h3 class="mb-0"><i class="fa-solid fa-list text-success"></i> Data Sub Holding</h3>
          <button class="btn btn-success py-1" type="button" data-toggle="modal" data-target="#staticBackdrop"><i class="fa-solid fa-plus"></i> Data Baru</button>
        </div>
        <hr class="mt-2 mb-4">
        {{-- table --}}
        <div class="table-responsive">
          <table id="example" class="mt-5 table-striped table-bordered table-data" style="min-width: 400px">
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
                  <td >{{ $no++ }}</td>
                  <td class="width-min1">{{ $item->oid_subholding }}</td>
                  <td class="width-min1">{{ $item->subholding }}</td>
                  <td class="width-min07">{{$item->holding}}</td>
                  <td class="width-min07" style="height:100%">
                    <div class="d-flex">
                      <a href="#" class="btn btn-warning btn-sm py-2" id="edit"><i class="fa-solid fa-pen-to-square"></i></a> 
                      <form action="/subholding/{{$item->oid_subholding}}"  id="delete-post-form" method="POST">
                        @method('delete')
                        @csrf
                        <button href="#" class="btn btn-outline-danger btn-sm py-2" id="delete" onclick="return confirm('Yakin Ingin Menghapus Subholding ?')">
                          <i class="fa-solid fa-trash-can"></i>
                        </button>
                      </form>
                    </div>
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


      <form method="POST" action="/subholding">
        @method('post')
        @csrf
        <div class="modal-body">
          
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
              @foreach ($holdings as $holding)
                <option class="dropdown-item" value="{{$holding->oid_holding}}">{{$holding->holding}}</option>
              @endforeach
          </select>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Create</button>
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
      <form method="POST" action="/subholding" id="editform">
        @method('put')
        @csrf
        <div class="modal-body">
          <div class="form-group">
              <label for="exampleInputEmail1">Nama Sub Holding</label>
              <input type="text" name="subholding" class="form-control" placeholder="Masukkan nama Sub Holding" id="subholding" aria-describedby="emailHelp">
          </div>
          <label for="exampleFormControlSelect1">Nama Holding</label>
          <select class="form-control" name="oid_holding" id="holding">
            @foreach ($holdings as $holding)
              <option class="dropdown-item" value="{{$holding->oid_holding}}">{{$holding->holding}}</option>
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

        $('#subholding').val(data[2].replace('&amp;','&'));
        // $('#holding').val(data[3]);
        $('#editform').attr('action', '/subholding/'+data[1]);
        $('#editModal').modal('show');
      });

      // table.on('click', '#delete', function(e){
      //   e.preventDefault();
      //   let id = $(this).data('id');
      //   var test= 'test'
      //   Swal.fire({
      //       title: 'Warning',
      //       text: "Yakin Ingin Menghapus ?",
      //       icon: 'warning',
      //       showCancelButton: true,
      //       confirmButtonText: 'Ya, Hapus',
      //       cancelButtonText: 'Batalkan'
      //   }).then((result) => {
      //       if (result.isConfirmed) {
      //           $('#delete-post-form').submit();
      //       }
      //   })
        // Swal.fire({
        //   icon:'warning',
        //   title:'Apakah Anda Yakni Ingin menghapus ?',
        //   text:'Sub Holding',
        //   showCancelButton:true,
        //   confirmButtonText:'Hapus',
        // })
        // .then(result=>{
        //   $tr = $(this).closest('tr');
        //   if($($tr).hasClass('child')) {
        //       $tr = $tr.prev('.parent');
        //   }
        //   var data = table.row($tr).data();
        //   console.log(data);
        //   if(result.value){
        //   }
        // })
      // });

    });

</script>

@endpush
