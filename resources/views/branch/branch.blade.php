@extends('layout.coreview')

@section('content')
{{-- content utama dibawah ini yaa --}}
<div data-aos="fade-up" class="card shadow-lg bg-body mx-4 mt--150">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <h3 class="mb-0"><i class="fa-solid fa-list text-success"></i> Data Branch</h3>
        {{-- <i class="fa-solid fa-list text-success"></i>  --}}
        <a href="/branch/create" class="btn btn-success py-1"><i class="fa-solid fa-plus"></i> Data Baru</a>
      </div>
      <hr class="mt-2 mb-4">
      <div class="table-responsive">
        <table id="example" class="mt-5 table-striped table-bordered table-data" style="min-width: 400px">
          <thead >
              <tr>
                  <th style="font-size: 13px">No</th>
                  <th style="font-size: 13px">Oid Branch</th>
                  <th style="font-size: 13px">Branch Name</th>
                  <th style="font-size: 13px">Address</th>
                  <th style="font-size: 13px">Phone</th>
                  <th style="font-size: 13px">Action</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($Branches as $branch)
            <tr>
              <td>{{ $loop->iteration}}</td>
              <td class="width-min07">{{ $branch->oid_branch}}</td>
              <td class="width-min1 width-max2">{{ $branch->branch_name}}</td>
              <td class="width-min1">{{ $branch->address}}</td>
              <td class="width-min1">{{ $branch->phone}}</td>

              <td style="min-width: 125px">
                <a  href="{{url("/branch/{$branch->oid_branch}")}}" class="btn btn-primary btn-sm py-2" >
                  <i class="fa-regular fa-eye"></i>
                </a>
                <a href="{{ url("/branch/{$branch->oid_branch}/edit") }}" class="btn btn-warning btn-sm py-2">
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
<div class="container-fluid mt--7">
  <div class="row mt-5" style="min-height: 200px">
  </div>
  <!-- Footer -->
  @include('layout.footer')
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
          <div id='text-notif'>Yakin Ingin Menghapus Data SBU ?</div>
          <form  id="deleteform" method="POST">
            @method('delete')
            @csrf
            <div class="d-flex justify-content-end my-3">
              <div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-outline-danger btn-sm py-2" id="delete">
                  Hapus
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
    
      table.on('click', '.delete', function(){
        $tr = $(this).closest('tr');
        if($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }
        var data = table.row($tr).data();
        
        $('#oid_will_delete').val(data[1]);
        
        $('#text-notif').html('Yakin Ingin Menghapus Branch ' + data[2] +' ?');
        $('#deleteform').attr('action', '/branch/'+data[1]);
        $('#deleteModal').modal('show');
      });
    });
    
</script>

@endpush