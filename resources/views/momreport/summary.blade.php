@extends('layout.coreview')

@section('content')
{{-- content utama dibawah ini yaa --}}
<div data-aos="fade-up" class="card shadow-lg bg-body mx-4 mt--150">
  <div class="card-body">
    {{-- Header --}}
    <div class="d-flex justify-content-between mb-3">
      <h3 class="mb-0"><i class="fa-solid fa-list text-success"></i> Summary</h3>
      <div class="">
        <a href="{{ url('/summarypdf') }}" class="btn btn-danger py-1">Download <i class="fa-solid fa-file-pdf fi-2"></i></a>
        <a href="{{ url('/summaryexcel') }}" class="btn btn-success py-1">Download <i class="fa-solid fa-file-excel fi-2"></i></a>
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
            <tr>
              <td class="" colspan="2" rowspan="2">Total</td>
              <td class="" rowspan="2">{{ $total_issues }}</td> 
              @foreach ($issues as $item)
                @if ($item->sts_issue == 'Open')
                  <td class="">{{ $item->Total_sts }}</td>
                @endif
              @endforeach
              @foreach ($issues as $item)
                @if ($item->sts_issue == 'On Progress')
                  <td class="">{{ $item->Total_sts }}</td>
                @endif
              @endforeach
              @foreach ($issues as $item)
                @if ($item->sts_issue == 'Hold')
                  <td class="">{{ $item->Total_sts }}</td>
                @endif
              @endforeach
              @foreach ($issues as $item)
                @if ($item->sts_issue == 'Close')
                  <td class="">{{ $item->Total_sts }}</td>  
                @endif
              @endforeach        
            </tr>
            <tr>
              @foreach ($issues as $item)
                @if ($item->sts_issue == 'Open')
                  <td class="text-center">{{ round(($item->Total_sts / $total_issues)* 100, 2) }}%</td>
                @endif
              @endforeach
              @foreach ($issues as $item)
                @if ($item->sts_issue == 'On Progress')
                  <td class="text-center">{{ round(($item->Total_sts / $total_issues)* 100, 2) }}%</td>
                @endif
              @endforeach
              @foreach ($issues as $item)
                @if ($item->sts_issue == 'Hold')
                  <td class="text-center">{{ round(($item->Total_sts / $total_issues)* 100, 2) }}%</td>
                @endif
              @endforeach
              @foreach ($issues as $item)
                @if ($item->sts_issue == 'Close')
                  <td class="text-center">{{ round(($item->Total_sts / $total_issues)* 100, 2) }}%</td>
                @endif
              @endforeach
            </tr>
          </tbody>
        </table>
      </div>
  </div>
</div>
@endsection
