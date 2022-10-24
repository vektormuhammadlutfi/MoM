@extends('layout.coreview')

@section('content')

{{-- content utama dibawah ini yaa --}}
<div data-aos="fade-up" class="header bg-body mt--150 px-4">

  <div class="row-grid mb-4">
    @foreach($jenismom as $item)
      <div class="card">
        <a href="/dashboard/weekly">
          <div class="card-body p-3 hov-card">
            <div class="row">
              <div class="col">
                <h3 class="card-title mb-1 hov-title">Weekly BoD</h3>   
                <span class="h2 mb-0 font-weight-bolder body-number">{{$item->Weekly}}</span>
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
                <span class="h2 mb-0 font-weight-bolder body-number">{{$item->Monthly}}</span>
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
                <span class="h2 mb-0 font-weight-bolder body-number">{{$item->Kuarta}}</span>
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
                <span class="h2 mb-0 font-weight-bolder body-number">{{$item->Year}}</span>
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
    @endforeach
  </div>
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
  {{-- footer gaess --}}
  @include('layout.footer')
</div>

@endsection
<script src="./assets/js/plugins/chart.js/dist/Chart.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<!-- new -->
{{-- <script src='https://cdn.plot.ly/plotly-2.14.0.min.js'></script> --}}




<!-- pie chart settings -->
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
      @foreach($jenismom as $item)
          var weekly = parseInt(<?php echo $item->Weekly; ?>);
          var monthly = parseInt(<?php echo $item->Monthly; ?>);
          var kuartal = parseInt(<?php echo $item->Kuarta; ?>);
          var yearly = parseInt(<?php echo $item->Year; ?>);
      @endforeach
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
</script>

<!-- bar chart settings -->
  <script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      // variabel default total status jenmom 
      let yearopen = 0; let yearonprogress = 0; let yearhold = 0; let yearclose = 0;
      let kuartalopen = 0; let kuartalonprogress = 0; let kuartalhold = 0; let kuartalclose = 0;
      let monthopen = 0; let monthonprogress = 0; let monthhold = 0; let monthclose = 0;
      let weekopen = 0; let weekonprogress = 0; let weekhold = 0; let weekclose = 0;

        @foreach($totalstatus as $status)
          @if($status->jenis_mom == 'End Year Meeting 2022')
            yearopen = <?php echo $status->open; ?>;
            yearonprogress = <?php echo $status->on_progress; ?>;
            yearhold = <?php echo $status->hold; ?>;
            yearclose = <?php echo $status->close; ?>;
          @endif          
          @if($status->jenis_mom == 'Kuartal Meeting')
            kuartalopen = <?php echo $status->open; ?>;
            kuartalonprogress = <?php echo $status->on_progress; ?>;
            kuartalhold = <?php echo $status->hold; ?>;
            kuartalclose = <?php echo $status->close; ?>;
          @endif          
          @if($status->jenis_mom == 'PDCA Month KGsd')
            monthopen = <?php echo $status->open; ?>;
            monthonprogress = <?php echo $status->on_progress; ?>;
            monthhold = <?php echo $status->hold; ?>;
            monthclose = <?php echo $status->close; ?>;
          @endif          
          @if($status->jenis_mom == 'Weekly BoD')
            weekopen = <?php echo $status->open; ?>;
            weekonprogress = <?php echo $status->on_progress; ?>;
            weekhold = <?php echo $status->hold; ?>;
            weekclose = <?php echo $status->close; ?>;
          @endif          
        @endforeach

      console.log(`nilai onpress : ${yearonprogress}`)
      console.log(`nilai open : ${yearopen}`)
      console.log(`nilai close : ${yearclose}`)
      console.log(`nilai hold : ${yearhold}`)
      
      var data = google.visualization.arrayToDataTable([
        ['Status', 'Weekly BoD', 'PDCA Month KG', 'Kuartal Meeting','End Year Meeting'],
        ['Open', weekopen , monthopen, kuartalopen, yearopen],
        ['Hold', weekhold , monthhold, kuartalhold, yearhold],
        ['On Progress', weekonprogress , monthonprogress, kuartalonprogress, yearonprogress],
        ['Close', weekclose , monthclose, kuartalclose, yearclose]
        // ['Open', 1, 2 ,5, 1],
        // ['Hold', 1, 2 ,5, 1],
        // ['On Progress', 1, 2 ,5, 1],
        // ['Close', 1, 2 ,5, 1]
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
  </script>

