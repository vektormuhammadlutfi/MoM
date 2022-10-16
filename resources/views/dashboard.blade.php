@extends('layout.coreview')

@section('content')

{{-- content utama dibawah ini yaa --}}
<div data-aos="fade-up" class="header bg-body mt--150 px-4">

  <div class="row-grid mb-3">
    @foreach($jenismom as $item)
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
              <div class="col">
                  <h3 class="card-title mb-1">Weekly BoD</h3>
                  <span class="h2 mb-0 font-weight-bolder body-number">{{$item->Weekly}}</span>
              </div>
              <div class="col-auto">
                  <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                      <iconify-icon icon="bi:bar-chart-line-fill" style="font-size: 22px"></iconify-icon>
                  </div>
              </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
              <div class="col">
                  <h3 class="card-title mb-1">PDCA Month KG</h3>
                  <span class="h2 mb-0 font-weight-bolder body-number">{{$item->Monthly}}</span>
              </div>
              <div class="col-auto">
                  <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                      <iconify-icon icon="bi:bar-chart-line-fill" style="font-size: 22px"></iconify-icon>
                  </div>
              </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
              <div class="col">
                  <h3 class="card-title mb-1">Kuartal Meeting</h3>
                  <span class="h2 mb-0 font-weight-bolder body-number">{{$item->Kuarta}}</span>
              </div>
              <div class="col-auto">
                  <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                      <iconify-icon icon="bi:bar-chart-line-fill" style="font-size: 22px"></iconify-icon>
                  </div>
              </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
              <div class="col">
                  <h3 class="card-title mb-1">End Year Meeting</h3>
                  <span class="h2 mb-0 font-weight-bolder body-number">{{$item->Year}}</span>
              </div>
              <div class="col-auto">
                  <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                      <iconify-icon icon="bi:bar-chart-line-fill" style="font-size: 22px"></iconify-icon>
                  </div>
              </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  {{-- <div class="d-flex pb-4" style="gap: 12px">
      @foreach($jenismom as $item)
      <div class="col-lg-4 col-xl-3 col-md-6 card mb-4 mb-xl-0">
        <div class="card-body p-3">
          <div class="row">
              <div class="col">
                  <h3 class="card-title mb-1">Weekly BoD</h3>
                  <span class="h2 mb-0 font-weight-bolder body-number">{{$item->Weekly}}</span>
              </div>
              <div class="col-auto">
                  <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                      <iconify-icon icon="bi:bar-chart-line-fill" style="font-size: 22px"></iconify-icon>
                  </div>
              </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-xl-3 col-md-6 card mb-4 mb-xl-0">
        <div class="card-body p-3 py-4">
          <div class="row">
              <div class="col">
                  <h3 class="card-title mb-1">PDCA Month KG</h3>
                  <span class="h2 mb-0 font-weight-bolder body-number">{{$item->Monthly}}</span>
              </div>
              <div class="col-auto">
                  <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                      <iconify-icon icon="bi:bar-chart-line-fill" style="font-size: 22px"></iconify-icon>
                  </div>
              </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-xl-3 col-md-6 card mb-4 mb-xl-0">
        <div class="card-body p-3 py-4">
          <div class="row">
              <div class="col">
                  <h3 class="card-title mb-1">Kuartal Meeting</h3>
                  <span class="h2 mb-0 font-weight-bolder body-number">{{$item->Kuarta}}</span>
              </div>
              <div class="col-auto">
                  <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                      <iconify-icon icon="bi:bar-chart-line-fill" style="font-size: 22px"></iconify-icon>
                  </div>
              </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-xl-3 col-md-6 card mb-4 mb-xl-0">
        <div class="card-body p-3 py-4">
          <div class="row">
              <div class="col">
                  <h3 class="card-title mb-1">End Year Meeting</h3>
                  <span class="h2 mb-0 font-weight-bolder body-number">{{$item->Year}}</span>
              </div>
              <div class="col-auto">
                  <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                      <iconify-icon icon="bi:bar-chart-line-fill" style="font-size: 22px"></iconify-icon>
                  </div>
              </div>
          </div>
        </div>
      </div>
      @endforeach
  </div> --}}
  {{-- <div class="row mb-4 border">
    @foreach($jenismom as $item)
    <div class="col-lg-4 col-xl-3 col-md-6 card mb-4 mb-xl-0">
      <div class="card-body px-2">
        <div class="row">
            <div class="col">
                <h3 class="card-title mb-1">Weekly BoD</h3>
                <span class="h2 mb-0 font-weight-bolder body-number">{{$item->Weekly}}</span>
            </div>
            <div class="col-auto">
                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                    <iconify-icon icon="bi:bar-chart-line-fill" style="font-size: 22px"></iconify-icon>
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-xl-3 col-md-6 card mb-4 mb-xl-0">
      <div class="card-body px-2">
        <div class="row">
            <div class="col">
                <h3 class="card-title mb-1">PDCA Month KG</h3>
                <span class="h2 mb-0 font-weight-bolder body-number">{{$item->Monthly}}</span>
            </div>
            <div class="col-auto">
                <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                    <iconify-icon icon="bi:bar-chart-line-fill" style="font-size: 22px"></iconify-icon>
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-xl-3 col-md-6 card mb-4 mb-xl-0">
      <div class="card-body px-2">
        <div class="row">
            <div class="col">
                <h3 class="card-title mb-1">Kuartal Meeting</h3>
                <span class="h2 mb-0 font-weight-bolder body-number">{{$item->Kuarta}}</span>
            </div>
            <div class="col-auto">
                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                    <iconify-icon icon="bi:bar-chart-line-fill" style="font-size: 22px"></iconify-icon>
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-xl-3 col-md-6 card mb-4 mb-xl-0">
      <div class="card-body px-2">
        <div class="row">
            <div class="col">
                <h3 class="card-title mb-1">End Year Meeting</h3>
                <span class="h2 mb-0 font-weight-bolder body-number">{{$item->Year}}</span>
            </div>
            <div class="col-auto">
                <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                    <iconify-icon icon="bi:bar-chart-line-fill" style="font-size: 22px"></iconify-icon>
                </div>
            </div>
        </div>
      </div>
    </div>
    @endforeach
  </div> --}}
  <div class="row">
    <div class="col-lg-6 col-md-6 mb-xl-0">
      <!-- pie chart -->
      <div class="card">
        <div class="card-header">
          <h2 class="mb-0"></i>All PDCA</h2>
        </div>
        <div class="card body">
          <div data-aos="fade-up" id="piechart" class="border-0" style="width: 500px; height: 490px;"></div>
        </div>
      </div>
    </div>
      <!-- bar old -->
      <div data-aos="fade-up" class="col-lg-6 col-md-6">
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
                  <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                  </div>
              </div>
          </div>
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
<script src="./assets/js/plugins/chart.js/dist/Chart.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>




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
@foreach($jenismom as $item)
    <?php
    $dataPoints1 = array(
	array("label"=> "Done", "y"=> $item->Weekly),
	array("label"=> "Done", "y"=> $item->Weekly),
	array("label"=> "Done", "y"=> $item->Weekly),
	array("label"=> "Done", "y"=> $item->Weekly)
    );
    $dataPoints2 = array(
	array("label"=> "Info", "y"=> $item->Monthly),
	array("label"=> "Info", "y"=> $item->Monthly),
	array("label"=> "Info", "y"=> $item->Monthly),
    	array("label"=> "Info", "y"=> $item->Monthly)
    );
    $dataPoints3 = array(
	array("label"=> "on Progress", "y"=> $item->Kuarta),
	array("label"=> "On Progress", "y"=> $item->Kuarta),
	array("label"=> "On Progress", "y"=> $item->Kuarta),
	array("label"=> "On Progress", "y"=> $item->Kuarta)
    );
    $dataPoints4 = array(
	array("label"=> "Open", "y"=> $item->Year),
	array("label"=> "Open", "y"=> $item->Year),
	array("label"=> "Open", "y"=> $item->Year),
	array("label"=> "Open", "y"=> $item->Year)
    );
    $dataPoints5 = array(
	array("label"=> "Done"),
	array("label"=> "Info"),
	array("label"=> "On Progress"),
	array("label"=> "Open")
    );
	
    ?>
@endforeach
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "red",
	title:{
		text: ""
	},
	axisY:{
		includeZero: true
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "top",
		horizontalAlign: "center",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Weekly BoD",
		// indexLabel: "{y}",
		// yValueFormatString: "",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "PDCA Month KG",
		// indexLabel: "{y}",
		// yValueFormatString: "",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Kuartal Meeting",
		// indexLabel: "{y}",
		// yValueFormatString: "",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "End Year Meeting",
		// indexLabel: "{y}",
		// yValueFormatString: "",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "",
		// indexLabel: "{y}",
		// yValueFormatString: "",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints5, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
}
 
}
</script>