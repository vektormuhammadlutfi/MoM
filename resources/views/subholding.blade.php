@extends('layout.coreview')

@section('content')
{{-- content utama dibawah ini yaa --}}
<div data-aos="fade-up"  class="card shadow-lg bg-body mx-4 mt--150">
  <div class="card-body">
    <div class="d-flex justify-content-between">
      <h3 class="mb-0"><i class="fa-solid fa-list text-success"></i> Sub Holding Data</h3>
      <button class="btn btn-success py-1" type="button" data-toggle="modal" data-target="#staticBackdrop"><i class="fa-solid fa-plus"></i> Create</button>
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
                  <a href="#" class="btn btn-warning btn-sm py-2 edit"><i class="fa-solid fa-pen-to-square"></i></a> 
                  <a href="#" class="btn btn-outline-danger btn-sm py-2 delete">
                    <i class="fa-solid fa-trash-can"></i>
                  </a>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
{{-- footer gaess --}}
@include('layout.footer')

  {{-- content modal create data --}}
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="staticBackdropLabel"> Add Data</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="/subholding">
        @method('post')
        @csrf
        <div class="modal-body">
          
            <div class="form-group">
                <label for="exampleInputEmail1">Sub Holding Name</label>
                <input type="text" id="inputsubholding" name="subholding" class="form-control @error('subholding') is-invalid @enderror"
                 placeholder="sub holding" id="inputsubholding" aria-describedby="emailHelp">
                @error('subholding')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <label for="exampleFormControlSelect1">Holding Name</label>
            <select class="form-control" name="oid_holding" id="exampleFormControlSelect1">
              @foreach ($holdings as $holding)
                <option class="dropdown-item" value="{{$holding->oid_holding}}">{{$holding->holding}}</option>
              @endforeach
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cencel</button>
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
              <label for="exampleInputEmail1">Sub Holding Name</label>
              <input type="text" name="subholding" class="form-control" placeholder="sub holding" id="subholding" aria-describedby="emailHelp">
          </div>
          <label for="exampleFormControlSelect1">Holding Name</label>
          <select class="form-control" name="oid_holding" id="holding">
            @foreach ($holdings as $holding)
              <option class="dropdown-item" value="{{$holding->oid_holding}}">{{$holding->holding}}</option>
            @endforeach
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cencel</button>
          <button type="submit" class="btn btn-warning">Edit</button>
        </div>
      </form>
      
    </div>
  </div>
</div>
{{-- end edit --}}

{{-- modal delete data --}}
<div class="modal fade" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="staticBackdropLabel">Delete Data</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="container">
        <form id="deleteform" method="POST">
          @method('delete')
          @csrf
          <div id='text-notif' class="mb-4">Are you sure want to delete this data ?</div>
          <div class="d-flex justify-content-end my-3">
            <div>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cencel</button>
              <button type="submit" class="btn btn-outline-danger" id="delete">Delete</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- end edit --}}
@endsection

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

        $('#subholding').val(data[2].replace('&amp;','&'));

        $('#editform').attr('action', '/subholding/'+data[1]);
        $('#editModal').modal('show');
      });

      table.on('click', '.delete', function(){
        $tr = $(this).closest('tr');
        if($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }
        var data = table.row($tr).data();
        $('#text-notif').html('Are you sure want to delete ' + data[2] + ' ?');
        $('#deleteform').attr('action', '/subholding/'+ data[1]);
        $('#deleteModal').modal('show');
      });
    });
  // $(document).ready(function () {
  //   var table = $('#example').DataTable();
  //   table.on('click', '.edit', function(){

  //       $tr = $(this).closest('tr');
  //       if($($tr).hasClass('child')) {
  //           $tr = $tr.prev('.parent');
  //       }
  //       var data = table.row($tr).data();

  //       $('#subholding').val(data[2].replace('&amp;','&'));
  //       $('#editform').attr('action', '/subholding/'+data[1]);
  //       $('#editModal').modal('show');
  //     });
  //   });

</script>

@endpush
