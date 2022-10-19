@extends('layout.coreview')

@section('content')
{{-- content utama dibawah ini yaa --}}
<div data-aos="fade-up" class="header bg-body mt--150 px-4">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <h3 class="mb-0"><i class="fa-solid fa-list text-success"></i> End Year Meeting 2022</h3>
        <a href="/dashboard" class="btn btn-secondary py-1"><i class="fa-solid fa-backward-fast"></i> Back</a>
      </div>
      <hr class="my-3">
      <div class="row">
        <div class="col">
          <div style="overflow-x: auto">
            <table style="width: 100%" class="mx-auto">
              <div class="card body">
               <div data-aos="fade-up" id="piechart" class="border-0 mx-auto" style="width: 75%; max-width: 900px; height: 590px;"></div>
              </div>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- footer gaess --}}
  <!-- Footer -->
  @include('layout.footer')
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
      let onprogress = 0;
      let open = 0;
      let hold = 0;
      let closed = 0;
        @foreach($yearly_status as $yearly)
          @if($yearly->sts_issue == 'On Progress')
            onprogress = <?php echo $yearly->total_issues; ?>;
          @endif

          @if($yearly->sts_issue == 'Open')
            open = <?php echo $yearly->total_issues; ?>;
          @endif

          @if($yearly->sts_issue == 'Close')
            closed = <?php echo $yearly->total_issues; ?>;
          @endif
          
          @if($yearly->sts_issue == 'Hold')
            hold = <?php echo $yearly->total_issues; ?>;
          @endif
          
        @endforeach
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Meeting Progress'],
        ['Open', open],
        ['On Progress', onprogress],
        ['Hold',  hold],
        ['Close', closed]
    ]);

    var options = {
        title: ''
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);

    google.visualization.events.addListener(chart, 'select', selectHandler);

    function selectHandler(e) {
      alert('table_div');
    }
    }
</script>
