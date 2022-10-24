@extends('layout.coreview')

@section('content')
{{-- content utama dibawah ini yaa --}}
<div data-aos="fade-up" class="card shadow-lg bg-body mx-4 mt--150 mb-5" >
  <div class="card-body">
    {{-- Header --}}
    <div class="d-flex justify-content-between mb-3">
      <h3 class="mb-0"><i class="fa-solid fa-list text-success"></i> Summary</h3>
      <div class="">
        <a href="{{ url('/summaryexcel') }}" class="btn btn-success py-1">Download <i class="fa-solid fa-file-excel fi-2"></i></a>
        <a href="{{ url('/summarypdf') }}" class="btn py-1 text-white" style="background-color: #5e72e4">Download <i class="fa-solid fa-file-pdf fi-2"></i></a>
        {{-- <a href="{{ url('/summarypdf') }}" class="text-danger py-0 mr-2" style="font-size: 38px"><i class="fa-sharp fa-solid fa-file-pdf"></i></a>
        <a href="{{ url('/summaryexcel') }}" class="text-success py-0" style="font-size: 38px"><i class="fa-sharp fa-solid fa-file-excel"></i></a> --}}
      </div>
    </div>
    <hr class="mt-2 mb-4">
    {{-- Table --}}
    <div class="table-responsive">
        <table id="example" class="mt-5 table-striped table-bordered table-data" style="min-width: 400px">
          <thead >
              <tr>
                  <th style="font-size: 13px">No</th>
                  <th style="font-size: 13px">Pic</th>
                  <th style="font-size: 13px">Amount Of MoM</th>
                  <th style="font-size: 13px">Open</th>
                  <th style="font-size: 13px">On Progres</th>
                  <th style="font-size: 13px">Hold</th>
                  <th style="font-size: 13px">Close</th>
              </tr>
          </thead>
          <tbody>
            <?php $no=1; ?>
            
            @foreach ($data_summary as $item)
            <tr>
              <td >{{ $no++ }}</td>
              <td class="width-min1">{{ $item->pic }}</td>
              <td class="width-min1">{{ $item->total }}</td>
              <td class="width-min07">{{ $item->open }}</td>
              <td class="width-min07">{{ $item->on_progress }}</td>
              <td class="width-min07">{{ $item->hold }}</td>
              <td class="width-min07">{{ $item->close }}</td>
            </tr>
            @endforeach
          </tbody>
          <tbody>
          <?php 
            $total_sts_open = 0;
            $total_sts_hold = 0;
            $total_sts_onprogress = 0;
            $total_sts_close = 0;

            $persen_sts_open = 0;
            $persen_sts_hold = 0;
            $persen_sts_onprogress = 0;
            $persen_sts_close = 0;
            
            foreach ($issues as $item) {
              if ($item->sts_issue == 'Open'){
                $total_sts_open = $item->Total_sts;
                $persen_sts_open =  round(($item->Total_sts / $total_issues)* 100, 2);
              }
              if ($item->sts_issue == 'On Progress'){
                $total_sts_hold = $item->Total_sts;
                $persen_sts_hold =  round(($item->Total_sts / $total_issues)* 100, 2);
              }
              if ($item->sts_issue == 'Hold'){
                $total_sts_onprogress = $item->Total_sts;
                $persen_sts_onprogress =  round(($item->Total_sts / $total_issues)* 100, 2);
              }
              if ($item->sts_issue == 'Close'){
                $total_sts_close = $item->Total_sts;
                $persen_sts_close =  round(($item->Total_sts / $total_issues)* 100, 2);
              }
            }
          ?>
            <tr>
              <td colspan="2" rowspan="2">Total</td>
              <td rowspan="2">{{ $total_issues }}</td>
              <td>{{ $total_sts_open }}</td> 
              <td>{{ $total_sts_hold }}</td>
              <td>{{ $total_sts_onprogress }}</td>
              <td>{{ $total_sts_close }}</td>
            </tr>
            <tr>
              <td>{{ $persen_sts_open }}%</td>
              <td>{{ $persen_sts_hold }}%</td>
              <td>{{ $persen_sts_onprogress }}%</td>
              <td>{{ $persen_sts_close }}%</td>
            </tr>
          </tbody>
        </table>
      </div>
  </div>
  {{-- footer gaess --}}
</div>
@include('layout.footer')
@endsection
