@extends('layout.coreview')

@section('content')

{{-- content utama dibawah ini yaa --}}
<div data-aos="fade-up" class="header bg-body mt--150 px-4">

  <div class="row-grid mb-3">
    <div class="card">
      <a href="/dashboard/weekly">
        <div class="card-body p-3 hov-card">
          <div class="row">
            <div class="col">
              <h3 class="card-title mb-1 hov-title">Weekly BoD</h3>   
              <span id="weekly" class="h2 mb-0 font-weight-bolder body-number weekly"></span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                <iconify-icon icon="bi:bar-chart-line-fill" style="font-size: 22px"></iconify-icon>
              </div>
            </div>
          </div>
        </div>               
      </a>        
    </div>
    <div class="card">
      <a href="/dashboard/monthly">
        <div class="card-body p-3 hov-card">
          <div class="row">
            <div class="col">
              <h3 class="card-title mb-1 hov-title">PDCA Month KG</h3> 
              <span id="monthly" class="h2 mb-0 font-weight-bolder body-number"></span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                <iconify-icon icon="bi:bar-chart-line-fill" style="font-size: 22px"></iconify-icon>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="card">
      <a href="/dashboard/kuartal">
        <div class="card-body p-3 hov-card">
          <div class="row">
            <div class="col">
              <h3 class="card-title mb-1 hov-title">Kuartal Meeting</h3>
              <span id="kuartal" class="h2 mb-0 font-weight-bolder body-number"></span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape text-white rounded-circle shadow" style="background-color: rgb(241, 197, 0)">
                <iconify-icon icon="bi:bar-chart-line-fill" style="font-size: 22px"></iconify-icon>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="card">
      <a href="/dashboard/yearly">
        <div class="card-body p-3 hov-card">
          <div class="row">
            <div class="col">                  
              <h3 class="card-title mb-1 hov-title">End Year Meeting</h3>
              <span id="yearly" class="h2 mb-0 font-weight-bolder body-number"></span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                <iconify-icon icon="bi:bar-chart-line-fill" style="font-size: 22px"></iconify-icon>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
  {{-- dropdown filter year --}}
  @if (count($jenismom) >= 2)
  <div class="row-grid mb-3">
    <select id="filterYear" class="form-control form-control-sm" style="font-size: 15px;" onchange="filterAllData()">
      @foreach ($jenismom as $year)
        <option  value="{{$year->Tahun}}" {{ ($year->Tahun == $list_year) ? 'selected' : '' }}>{{$year->Tahun}}</option>
      @endforeach
    </select>
  </div>
  @else
    <div class="row-grid mb-3">
      <select id="filterYear" class="form-control form-control-sm" style="font-size: 15px;" onchange="filterYearData()">
        <option value="2022">2022</option>
        <option value="2021">2021</option>
      </select>
    </div>
  @endif
  <div class="row-grid-chart">
      <!-- pie chart -->
      <div class="card">
        <div class="card-header">
          <h2 class="mb-0"></i>All PDCA</h2>
        </div>
        <div class="card-body text-center">
          <div data-aos="fade-up" id="piechart" class="border-0 mx-auto" style="height: 100%;"></div>
        </div>
      </div>
      <!-- bar old -->
      <div class="card">
        <div class="card-header bg-transparent">
            <div class="row align-items-center">
                <div class="col-5">
                    <h2 class="mb-0">ALL PDCA Status</h2>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="chart">
            <!-- <div id="chartContainer" style="height: 370px; width: 100%;"></div> -->
            <div id="barchart_material" style="height: 100%;"></div>
            </div>
        </div>
      </div>
  </div>
</div>
{{-- footer gaess --}}
@include('layout.footer')

@endsection

@push('addon-script')
<script src="./assets/js/plugins/chart.js/dist/Chart.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
{{-- script google pie chart --}}
<script type="text/javascript"> 
  // function card mom jenis 
  const jenMom = () => {
    jenisMoms.filter((datafilter) => datafilter.Tahun == valueYear).map((dataloop) => {
      document.getElementById("weekly").innerText = `${dataloop.Weekly}`;
      document.getElementById("monthly").innerText = `${dataloop.Monthly}`;
      document.getElementById("kuartal").innerText = `${dataloop.Kuartal}`;
      document.getElementById("yearly").innerText = `${dataloop.Yearly}`;
    })
  }

  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart); 
  var valueYear = new Date().getFullYear();
  var jenisMoms = {!! $jenismom !!};
  var weekly = 0; var monthly = 0; var kuartal = 0; var yearly = 0;

  function drawChart() {
    jenisMoms.filter((data) => data.Tahun == valueYear).map((dataloop) => {
      weekly = dataloop.Weekly;
      monthly = dataloop.Monthly;
      kuartal = dataloop.Kuartal;
      yearly = dataloop.Yearly;
    });
    console.log(valueYear);
    // console.log(weekly, monthly, kuartal, yearly);
    var data = google.visualization.arrayToDataTable([
      ['Task', 'Meeting Progress'],
      ['Weekly BoD',     weekly],
      ['PDCA Month',      monthly],
      ['Kuartal Meeting',  kuartal],
      ['End Year Meeting', yearly]
    ]);

    var options = {
        title: ''
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
  }
  // function card jenis mom
  jenMom();
  // pie chart settings
  function filterYearData() {
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart); 
    valueYear = document.getElementById("filterYear").value;

    // function card jenis mom
    jenMom();
    // pie chart
    function drawChart() {

      jenisMoms.filter((data) => data.Tahun == valueYear).map((dataloop) => {
        weekly = dataloop.Weekly;
        monthly = dataloop.Monthly;
        kuartal = dataloop.Kuartal;
        yearly = dataloop.Yearly;
      });
      console.log(valueYear);
      // console.log(weekly, monthly, kuartal, yearly);
      var data = google.visualization.arrayToDataTable([
        ['Task', 'Meeting Progress'],
        ['Weekly BoD',     weekly],
        ['PDCA Month',      monthly],
        ['Kuartal Meeting',  kuartal],
        ['End Year Meeting', yearly]
      ]);

      var options = {
          title: ''
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
      chart.draw(data, options);
    }
  }
</script>
{{-- script google grafik bar --}}
<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);
  var totalStatus = {!! $totalStatus !!};  
  var valueYear = new Date().getFullYear();

  function drawChart() {
    // variabel default total status jenmom 
    let yearopen = 0; let yearonprogress = 0; let yearhold = 0; let yearclose = 0;
    let weekopen = 0; let weekonprogress = 0; let weekhold = 0; let weekclose = 0;
    let kuartalopen = 0; let kuartalonprogress = 0; let kuartalhold = 0; let kuartalclose = 0;
    let monthopen = 0; let monthonprogress = 0; let monthhold = 0; let monthclose = 0;
    // filter year and jen_mom
    let jen_year = totalStatus.filter((e) => e.Tahun == valueYear && e.oid_jen_mom == 'JM-001');
    let jen_week = totalStatus.filter((e) => e.Tahun == valueYear && e.oid_jen_mom == 'JM-002');
    let jen_kuartal = totalStatus.filter((e) => e.Tahun == valueYear && e.oid_jen_mom == 'JM-003');
    let jen_month = totalStatus.filter((e) => e.Tahun == valueYear && e.oid_jen_mom == 'JM-004');

    jen_year.map((e) => { yearopen = e.open; yearonprogress = e.on_progress; yearhold = e.hold; yearclose = e.close;});
    jen_week.map((e) => { weekopen = e.open; weekonprogress = e.on_progress; weekhold = e.hold; weekclose = e.close;});
    jen_kuartal.map((e) => { kuartalopen = e.open; kuartalonprogress = e.on_progress; kuartalhold = e.hold; kuartalclose = e.close;});
    jen_month.map((e) => { monthopen = e.open; monthonprogress = e.on_progress; monthhold = e.hold; monthclose = e.close; });

    var data = google.visualization.arrayToDataTable([
      ['Status', 'Weekly BoD', 'PDCA Month KG', 'Kuartal Meeting','End Year Meeting'],
      ['Open', weekopen , monthopen, kuartalopen, yearopen],
      ['Hold', weekhold , monthhold, kuartalhold, yearhold],
      ['On Progress', weekonprogress , monthonprogress, kuartalonprogress, yearonprogress],
      ['Close', weekclose , monthclose, kuartalclose, yearclose]
    ]);

    var options = {
      chart: {
        title: '',
      },
      bars: 'vertical' // Required for Material Bar Charts.
    };

    var chart = new google.charts.Bar(document.getElementById('barchart_material'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
  function filterStatusData() {
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);
    valueYear = document.getElementById("filterYear").value;
    console.table(totalStatus);
  
    function drawChart() {
       // variabel default total status jenmom 
      let yearopen = 0; let yearonprogress = 0; let yearhold = 0; let yearclose = 0;
      let weekopen = 0; let weekonprogress = 0; let weekhold = 0; let weekclose = 0;
      let kuartalopen = 0; let kuartalonprogress = 0; let kuartalhold = 0; let kuartalclose = 0;
      let monthopen = 0; let monthonprogress = 0; let monthhold = 0; let monthclose = 0;

      // filter year and jen_mom
      let jen_year = totalStatus.filter((e) => e.Tahun == valueYear && e.oid_jen_mom == 'JM-001');
      let jen_week = totalStatus.filter((e) => e.Tahun == valueYear && e.oid_jen_mom == 'JM-002');
      let jen_kuartal = totalStatus.filter((e) => e.Tahun == valueYear && e.oid_jen_mom == 'JM-003');
      let jen_month = totalStatus.filter((e) => e.Tahun == valueYear && e.oid_jen_mom == 'JM-004');

      // ganti nilai default 0 menjadi nilai dari data array jika ada data
      jen_year.map((e) => { yearopen = e.open; yearonprogress = e.on_progress; yearhold = e.hold; yearclose = e.close;});
      jen_week.map((e) => { weekopen = e.open; weekonprogress = e.on_progress; weekhold = e.hold; weekclose = e.close;});
      jen_kuartal.map((e) => { kuartalopen = e.open; kuartalonprogress = e.on_progress; kuartalhold = e.hold; kuartalclose = e.close;});
      jen_month.map((e) => { monthopen = e.open; monthonprogress = e.on_progress; monthhold = e.hold; monthclose = e.close; });

      var data = google.visualization.arrayToDataTable([
        ['Status', 'Weekly BoD', 'PDCA Month KG', 'Kuartal Meeting','End Year Meeting'],
        ['Open', weekopen , monthopen, kuartalopen, yearopen],
        ['Hold', weekhold , monthhold, kuartalhold, yearhold],
        ['On Progress', weekonprogress , monthonprogress, kuartalonprogress, yearonprogress],
        ['Close', weekclose , monthclose, kuartalclose, yearclose]
      ]);

      var options = {
        chart: {
          title: '',
        },
        bars: 'vertical' // Required for Material Bar Charts.
      };

      var chart = new google.charts.Bar(document.getElementById('barchart_material'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
  }
</script>
<script>
  //function filter all
  const filterAllData = () => {
    filterYearData();
    filterStatusData();
  }
</script>
@endpush


