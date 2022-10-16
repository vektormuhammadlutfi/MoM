@extends('layout.coreview')

@section('content')
{{-- content utama dibawah ini yaa --}}
<div data-aos="fade-up" class="card shadow-lg bg-body mx-4 mt--150">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <h3 class="mb-0"><i class="fa-solid fa-list text-success"></i> MoM</h3>
        {{-- <i class="fa-solid fa-list text-success"></i>  --}}
        <a href="/mom/create" class="btn btn-success py-1"><i class="fa-solid fa-plus"></i> Create</a>
      </div>
      <hr class="mt-2 mb-4">
      <div class="table-responsive">
        <table id="example" class="mt-5 table-striped table-bordered table-data" style="min-width: 400px">
          <thead >
              <tr>
                <th class="text-center" style="font-size: 13px">No</th>
                  <th class="text-center" style="font-size: 13px">Action</th>
                  <th class="text-center" style="font-size: 13px">OID</th>
                  <th class="text-center" style="font-size: 13px">SBU Name</th>
                  <th class="text-center width-min1" style="font-size: 13px">Type Of MoM</th>
                  <th class="text-center" style="font-size: 13px">Agenda</th>
                  <th class="text-center" style="font-size: 13px">Date</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($moms as $mom)
                <tr>
                  <td class="text-center">{{$loop->iteration}}</td>
                  <td style="max-width: 30px;" class="px-0 text-center">
                    <div class="dropdown" style="background-color: transparent">
                      <a  class="btn px-3 action-table" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <iconify-icon icon="akar-icons:more-horizontal" class="text-success" style="font-size: 20px"></iconify-icon>
                      </a>
                      <div class="dropdown-menu px-3" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-item">
                          <a  href="{{url("/adddoc/{$mom->oid_mom}")}}" class="text-decoration-none text-success" >
                            <iconify-icon icon="fluent:document-add-48-regular" width="20"></iconify-icon> Add Documentation
                          </a>
                        </div>

                        <div class="dropdown-item">
                          <a href="{{url("/mom/{$mom->oid_mom}/edit")}}" class="text-decoration-none text-yellow">
                            <i class="fa-solid fa-pen-to-square"></i> Edit 
                          </a>
                        </div>

                        <div class="dropdown-item">
                          <a href="#" class="c-btn text-decoration-none text-danger delete">
                            <i class="fa-solid fa-trash-can"></i> Hapus
                          </a>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="width-min07"><a href="{{url("/mom/{$mom->oid_mom}")}}">{{$mom->oid_mom}}</a></td>
                  <td>{{$mom->sbu_name}}</td>
                  <td>{{$mom->jenis_mom}}</td>
                  <td>{{$mom->agenda}}</td>
                  {{-- Mengolah data waktu --}}
                  <?php $split = array_reverse(explode('-',$mom->tgl_mom));
                        $tanggal = '';
                        for($i = 0; $i<count($split); $i++){
                          if($i==0){
                            $tanggal .= $split[$i];
                          }else{
                            $tanggal .= '/' . $split[$i];
                          }
                        }
                  ?>
                  <td>{{$mom->hari}}, {{$tanggal}}</td>
                </tr>
              @endforeach
              {{-- hh --}}
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
          <form action=""  id="deleteform" method="POST">
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
        
        $('#text-notif').html('Are you sure want to delete mom data whit oid :<br>' + data[2] +' ?');
        var oid_mom = $('#text-notif a').html();
        $('#deleteform').attr('action', '/mom/'+ oid_mom);
        $('#deleteModal').modal('show');
      });
    });
    
</script>

@endpush
