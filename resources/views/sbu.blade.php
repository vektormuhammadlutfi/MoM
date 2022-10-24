@extends('layout.coreview')

@section('content')
{{-- content utama dibawah ini yaa --}}
<div data-aos="fade-up" class="card shadow-lg bg-body mx-4 mt--150">
  <div class="card-body">
    {{-- Header --}}
    <div class="d-flex justify-content-between">
      <h3 class="mb-0"><i class="fa-solid fa-list text-success"></i> SBU Data</h3>
      <button class="btn btn-success py-1" type="button" data-toggle="modal" data-target="#staticBackdrop"><i class="fa-solid fa-plus"></i> Create</button>
    </div>
    <hr class="mt-2 mb-4">
    {{-- Table --}}
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
              {{-- data cuman ngambil <td></td> --}}
              <td >{{ $no++ }}</td>
              <td class="width-min07">{{ $sbuitem->oid_sbu }}</td>
              <td class="width-min1">{{ $sbuitem->sbu_name }}</td>
              <td class="width-min1">{{ $sbuitem->subholding }}</td>
              <td class="width-min07">
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
        <h2 class="modal-title" id="staticBackdropLabel">Add Data</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ url('/sbu') }}">
        @method('post')
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputEmail1">SBU Name</label>
                <input type="text" name="sbu_name" class="form-control @error('sbu_name') is-invalid @enderror" placeholder="sbu name" id="exampleInputEmail1">
                @error('sbu_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <label for="exampleFormControlSelect1">Sub Holding Name</label>
            <select class="form-control" name="oid_subholding" id="exampleFormControlSelect1">
              @foreach ($datasubholding as $sbuitem)
              <option class="dropdown-item" value="{{ $sbuitem->oid_subholding }}">{{ $sbuitem->subholding }}</option>
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
      
        <form method="POST" action="/sbu" id="editform">
          @method('put')
          @csrf
          <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputEmail1">SBU Name</label>
                <input type="text" name="sbu_name" class="form-control @error('sbu_name') is-invalid @enderror" placeholder="SBU Name" id="sbu_name" value="{{ old('sbu_name') }}">
                @error('sbu_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <label for="exampleFormControlSelect1">Nama Sub Holding</label>
            <select class="form-control" name="subholding" id="subholding" >
              @foreach ($datasubholding as $subholding)
                <option class="dropdown-item" value="{{ $subholding->oid_subholding }}" >{{ old('subholding', $subholding->subholding) }}</option>
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

{{-- Delete Modal --}}
<div class="modal fade" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="staticBackdropLabel">Warning</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="container">
          <div id='text-notif' class="mb-4">Are you sure want to delete this data ?</div>
          <form action=""  id="deleteform" method="POST">
            @method('delete')
            @csrf
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
{{-- end delete --}}
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
      console.log(data);
      $('#sbu_name').val(data[2].replace('&amp;','&'));
      $('#subholding').val(data[3]);

      $('#editform').attr('action', '/sbu/'+data[1]);//action = '/sbu/{sbu}'
      $('#editModal').modal('show');
    });

    table.on('click', '.delete', function(){
      $tr = $(this).closest('tr');
      if($($tr).hasClass('child')) {
          $tr = $tr.prev('.parent');
      }
      var data = table.row($tr).data();
      
      $('#text-notif').html('Are you sure want to delete ' + data[2] +' ?');
      $('#deleteform').attr('action', '/sbu/'+data[1]);
      $('#deleteModal').modal('show');
    });
  });
    
</script>

@endpush