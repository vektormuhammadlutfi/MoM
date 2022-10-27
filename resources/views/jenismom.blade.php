@extends('layout.coreview')

@section('content')
{{-- content utama dibawah ini yaa --}}
<div data-aos="fade-up" class="card shadow-lg bg-body mx-4 mt--150">
  <div class="card-body">
    <div class="d-flex justify-content-between">
      <h3 class="mb-0"><i class="fa-solid fa-list text-success"></i> Type Of MoM Data</h3>
      <button class="btn btn-success py-1" type="button" data-toggle="modal" data-target="#staticBackdrop"><i class="fa-solid fa-plus"></i> Create</button>
    </div>
    <hr class="mt-2 mb-4">
    <div class="table-responsive">
      <table id="example" class="mt-5 table-striped table-bordered table-data" style="min-width: 400px">
        <thead >
            <tr>
                <th style="font-size: 13px" class="width-max05">No</th>
                <th style="font-size: 13px" class="width-max1">OID</th>
                <th style="font-size: 13px">Type Of MoM</th>
                <th style="font-size: 13px" class="width-max1">Action</th>
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
                    <a href="#" class="btn btn-warning btn-sm py-2" id="edit">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <a href="#" class="btn btn-outline-danger btn-sm py-2 delete">
                        <i class="fa-solid fa-trash-can"></i>
                    </a>
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
</div>

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
      <form method="POST" action="/jenismom">
        @method('post')
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Type Of MoM Name</label>
                <input type="text" name="jenis_mom" class="form-control @error('jenis_mom') is-invalid @enderror" placeholder="Type of mom name" id="exampleInputEmail1">
                @error('jenis_mom')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
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
      <form method="POST" action="/jenismom" id="editform">
        @method('put')
        @csrf
        <div class="modal-body">
          <div class="form-group">
              <label for="exampleInputEmail1">Type Of MoM Name</label>
              <input type="text" name="jenis_mom" class="form-control" placeholder="Type of mom name" id="jenis_mom" aria-describedby="emailHelp">
          </div>
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

{{-- Delete Modal --}}
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
          <div id='text-notif' class="mb-4">
            {{-- notif --}}
          </div>
          <form action=""  id="deleteform" method="POST">
            @method('delete')
            @csrf
            <div class="d-flex justify-content-end my-3">
              <div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cencel</button>
                <button type="submit" class="btn btn-outline-danger" id="delete">
                  Delete
                </button>
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
    //edit button
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
    //delete button
    table.on('click', '.delete', function(){
        $tr = $(this).closest('tr');
        if($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }
        var data = table.row($tr).data();
        
        $('#oid_will_delete').val(data[1]);
        
        $('#text-notif').html('Yakin Ingin Menghapus Jenis MoM : <br> ' + data[2] +' ?');
        $('#deleteform').attr('action', '/jenismom/'+data[1]);
        $('#deleteModal').modal('show');
      });
  });
</script>
@endpush