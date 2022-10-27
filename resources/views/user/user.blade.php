@extends('layout.coreview')
@section('content')

<div data-aos="fade-up" class="card shadow-lg bg-body mx-4 mt--150">
    <div class="card-body">
      @if (session()->has('success'))
      <div class="alert alert-success bg-success alert-dismissible fade show mb-5 px-4" role="alert">
      {{ session('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div> 
    @endif
      <div class="d-flex justify-content-between">
        <h3 class="mb-0"><i class="fa-solid fa-list" style="color: #5BB318"></i> User Data</h3>
        {{-- <i class="fa-solid fa-list text-success"></i>  --}}
        <a href="/user/create" class="btn btn-success py-1"><i class="fa-solid fa-plus"></i> Create</a>
      </div>
      <hr class="mt-2 mb-4">
      <div class="table-responsive">
        <table id="example" class="mt-5 table-striped table-bordered table-data" style="min-width: 400px">
          <thead >
              <tr>
                  <th style="font-size: 13px">No</th>
                  <th style="font-size: 13px">Action</th>
                  <th style="font-size: 13px">Oid User</th>
                  <th style="font-size: 13px">User Name</th>
                  <th style="font-size: 13px">Email</th>
                  <th style="font-size: 13px">Phone</th>
                  <th style="font-size: 13px">User Group</th>
              </tr>
          </thead>
          <tbody>
            <?php $no = 0?>
            @foreach ($users as $item)
              <tr>
                <td>{{ ++$no }}</td>
                <td style="min-width: 125px" class="px-0 text-center">
                  <div class="dropdown" style="background-color: transparent">
                    <a  class="btn px-3 action-table" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <iconify-icon icon="akar-icons:more-horizontal" class="text-success" style="font-size: 20px"></iconify-icon>
                    </a>
                    <div class="dropdown-menu px-3" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-item">
                        <a href="{{ url("/detailuser/{$item->oid_user}") }}" class="text-decoration-none text-success" >
                          <iconify-icon icon="pajamas:details-block" style="font-size: 16px;"></iconify-icon> Detail
                        </a>
                      </div>

                      <div class="dropdown-item">
                        <a href="#" id="edit" class="text-decoration-none text-yellow">
                          <i class="fa-solid fa-pen-to-square"></i> Edit 
                        </a>
                      </div>

                      <div class="dropdown-item">
                        <form action="{{ url("/user/{$item->oid_user}") }}" method="post" class="py-2 d-inline">
                          @method('delete')
                          @csrf
                          <button type="submit"  onClick="return confirm('Yakin Ingin Menghapus Data ?')" class="btn c-btn text-decoration-none text-danger delete" style="box-shadow: none;"><i class="fa-solid fa-trash-can"></i> Hapus</button>
                        </form>
                      </div>
                    </div>
                  </div>
                <td class="width-min07">{{ $item->oid_user }}</td>
                <td class="width-min07">{{ $item->username }}</td>
                <td class="width-min1 width-max2">{{ $item->email }}</td>
                <td class="width-min1">{{ $item->telp }}</td>
                <td class="width-min7">{{ $item->usergroup }}</td>

                                
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

{{-- content modal edit data --}}
<div class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="staticBackdropLabel">Edit User Group</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="/user" id="editform">
        @method('put')
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputEmail1">User Name</label>
            <input type="text" name="username" class="form-control" id="username" disabled>
          </div>
          <div class="form-group">
            <label for="usgr">User Group Now</label>
            <input type="text" name="username" class="form-control" id="usgr" disabled>
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Select User Group</label>
              <select class="form-control" name="usergroup" id="usergroup">
                @foreach ($usergroupinput as $d)
                  <option class="dropdown-item" value="{{ $d }}" id="ug">{{ $d }}</option>
                @endforeach
              </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Update</button>
        </div>
      </form>
      
    </div>
  </div>
</div>
{{-- footer gaess --}}
@include('layout.footer')

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
      console.log(data);
      $('#usgr').val(data[3]);
      $('#username').val(data[2]);

      $('#editform').attr('action', '/user/'+data[1]);
      $('#editModal').modal('show');

    });
  });
</script>
    
@endpush