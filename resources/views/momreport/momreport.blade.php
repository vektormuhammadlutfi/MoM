@extends('layout.coreview')

@section('content')
{{-- content utama dibawah ini yaa --}}
<div data-aos="fade-up" class="card shadow-lg bg-body mx-4 mt--150">
    <div class="card-body">
      <div class="">
        <h3 class="mb-0"><i class="fa-solid fa-list text-success"></i> MoM Report</h3>
      </div>
      <div class="mt-4" style="margin-bottom: 5px">
        <form action="/momreportexportpdf" method="post" class="form-inline d-flex justify-content-center">
          @csrf
          @method('post')
          <div class="form-group mr-sm-4 mb-3">
            <label for="from_date" class="mr-2">From</label>
            <input type="date" name="from_date" class="form-control form-control-sm" id="from_date" placeholder="Password" style="min-width: 250px;">
            {{-- <input type="date" name="from_date" class="form-control form-control-sm" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" placeholder="Input tanggal awal"> --}}
          </div>
          <div class="form-group mr-sm-4 mb-3">
            <label for="to_date" class="mr-2">Until</label>
            <input type="date" name="to_date" class="form-control form-control-sm" id="to_date" placeholder="Password" style="min-width: 250px;">
            {{-- <input type="date" name="to_date" class="form-control form-control-sm" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" placeholder="Input tanggal akhir"> --}}
          </div>
          <div class="form-group mr-sm-4 mb-3">
            <button  class="btn btn-danger py-1">Download <i class="fa-solid fa-file-pdf fi-2"></i></button>
            <a href="{{ route('momreport.export') }}" class="btn btn-success py-1">Download <i class="fa-solid fa-file-excel fi-2"></i></a>
          </div>
        </form>
      </div>
      <hr class="mt-2 mb-3" >
      <div class="table-responsive">
        <table id="example" class=" table-striped table-bordered table-data" style="min-width: 400px">
          <thead >
              <tr>
                <th class="text-center" style="font-size: 13px">No</th>
                <th class="text-center" style="font-size: 13px">Type Of MoM MoM</th>
                <th class="text-center" style="font-size: 13px">Date</th>
                <th class="text-center" style="font-size: 13px">KPI/Highlight Issues</th>
                <th class="text-center" style="font-size: 13px">PIC</th>
                <th class="text-center" style="font-size: 13px">Due Date Info</th>
                <th class="text-center" style="font-size: 13px">Status</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($mom_report as $mom)
                <tr>
                  <td class="text-center">{{$loop->iteration}}</td>
                  <td class="width-min07">{{$mom->jenis_mom}}</a></td>
                  <td>{{$mom->tgl_mom}}</td>
                  <td>{{$mom->highlight_issues}}</td>
                  <td>{{$mom->pic}}</td>
                  <td>{{ $mom->due_date_info }}</td>
                  <td>{{$mom->sts_issue}}</td>
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
