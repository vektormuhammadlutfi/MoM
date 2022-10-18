@extends('layout.coreview')

@section('content')
{{-- content utama dibawah ini yaa --}}
<div data-aos="fade-up" class="card shadow-lg bg-body mx-4 mt--150">
  <div class="card-body">
    <div class="d-flex justify-content-between">
      <h3 class="mb-0"><i class="fa-solid fa-list text-success"></i> MoM Detail</h3>
    </div>
    <hr class="mt-2 mb-4">
    <div class="table-responsive">
      <table id="example" class="mt-5 table-striped table-bordered table-data" style="min-width: 400px">
        <thead >
            <tr>
                <th class="text-center" style="font-size: 13px">No</th>
                <th class="text-center" style="font-size: 13px">Action</th>
                <th class="text-center" style="font-size: 13px; min-width:45px;">OID</th>
                <th class="text-center" style="font-size: 13px">Highlight Issues</th>
                <th class="text-center" style="font-size: 13px">Due Date Info</th>
                <th class="text-center" style="font-size: 13px">PIC</th>
                <th class="text-center" style="font-size: 13px">Information</th>
                <th class="text-center" style="font-size: 13px">Status Issue</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($details as $detail)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td style="max-width: 30px;" class="px-0 text-center">
                      <div class="dropdown" style="background-color: transparent">
                        <a  class="btn px-3 action-table" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <iconify-icon icon="akar-icons:more-horizontal" class="text-success" style="font-size: 20px"></iconify-icon>
                        </a>
                        <div class="dropdown-menu px-3" aria-labelledby="dropdownMenuLink">
                          <div class="dropdown-item">
                            <a  href="{{ url("/momdetail/{$detail->oid_high_issues}/history") }}" class="text-decoration-none text-success" >
                              <iconify-icon icon="fluent:document-add-48-regular" width="20"></iconify-icon> Detail
                            </a>
                          </div>
                          @if($detail->sts_issue !== 'Close')
                            <div class="dropdown-item">
                              <a href="{{url("/momdetail/{$detail->oid_high_issues}/edit")}}" class="text-decoration-none text-yellow">
                                <i class="fa-solid fa-pen-to-square"></i> Edit 
                              </a>
                            </div>
                          @endif
                          <div class="dropdown-item">
                            <a href="#" class="c-btn text-decoration-none text-danger delete">
                                <i class="fa-solid fa-trash-can"></i> Delete
                              </a>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td>{{$detail->oid_high_issues}}</td>
                    {{-- <td>{{$detail->oid_mom}}</td> --}}
                    <td>{{$detail->highlight_issues}}</td>
                    <td>{{$detail->due_date_info}}</td>
                    <td>{{$detail->pic}}</td>
                    <td>{{$detail->informasi}}</td>
                    <td class="font-weight-bold 
                    @if($detail->sts_issue == 'Close') text-danger
                    @elseif($detail->sts_issue == 'Open') text-success
                    @elseif($detail->sts_issue == 'On Progress') text-yellow
                    @endif
                    ">{{$detail->sts_issue}}</td>
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
          <div id='text-notif' class="mb-4">Yakin Ingin Menghapus Data SBU ?</div>
          <form action=""  id="deleteform" method="POST">
            @method('delete')
            @csrf
            <div class="d-flex justify-content-end my-3">
              <div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-outline-danger" id="delete">
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
        
        $('#text-notif').html('Are you sure want to delete detail mom with highlight issues ' + data[3] +' ?');
        $('#deleteform').attr('action', '/momdetail/'+data[1]);
        $('#deleteModal').modal('show');
      });
    });
    
</script>

@endpush
