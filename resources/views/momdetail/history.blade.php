@extends('layout.coreview')

@section('content')
    <div data-aos="fade-up" class="card shadow-lg bg-body mx-4 mt--150">
        <div class="card-body">
    <div class="d-flex justify-content-between">
      <h3 class="mb-0"><i class="fa-solid fa-list text-success"></i> Mom history</h3>
    </div>
    <hr class="mt-2 mb-4">
    <div class="table-responsive">
      <table id="example" class="mt-5 table-striped table-bordered table-data" style="min-width: 400px">
        <thead >
            <tr>
                <th class="text-center" style="font-size: 13px">No</th>
                <th class="text-center" style="font-size: 13px">Tanggal</th>
                <th class="text-center" style="font-size: 13px">User Update</th>
                <th class="text-center" style="font-size: 13px">Progres Minggu Lalu</th>
                <th class="text-center" style="font-size: 13px">Rencana Minggu Ini</th>
                <th class="text-center" style="font-size: 13px">Status Old</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($histories as $history)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="width-min07 text-center">{{$history->created_at}}</td>
                    <td class="width-min07 text-center">{{$history->usercreate}}</td>
                    <td>{{$history->progress_minggu_lalu}}</td>
                    <td>{{$history->rencana_minggu_ini}}</td>
                    <td>
                      <?php $colorStatus = 'btn-info';
                      switch($history->sts_issue){
                          case('Open'):
                              $colorStatus = "btn-success rounded";
                              break;
                          case('On Progress'):
                              $colorStatus = "btn-warning rounded";
                              break;
                          case('Hold'):
                              $colorStatus = "btn-danger rounded";
                              break;
                          case('Closed'):
                              $colorStatus = "btn-secondary rounded";
                              break;
                            }
                      ?>
                      <div class="{{$colorStatus}} text-center status-rounded ">{{$history->sts_issue}}</div>
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
@endsection