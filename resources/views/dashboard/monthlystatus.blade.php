@extends('layout.coreview')

@section('content')
{{-- content utama dibawah ini yaa --}}
<div data-aos="fade-up" class="header bg-body mt--150 px-4">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <h3 class="mb-0"><i class="fa-solid fa-list text-success"></i> PDCA Month KGsd</h3>
        <a href="/dashboard" class="btn btn-secondary py-1"><i class="fa-solid fa-backward-fast"></i> Back</a>
      </div>
      <hr class="my-3">
      <div class="row">
        <div class="col-lg-5 col-md-12">
          <div style="overflow-x: auto">
            <table style="width: 100%" class="mx-auto">
              <div class="card body">
                <div data-aos="fade-up" id="piechart" class="border-0 mx-auto" style="width: 100%; height:400px;"></div>
              </div>
            </table>
          </div>
        </div>
        <div class="col-lg-7 col-md-12">
          <div class="table-responsive">
            {{-- label --}}
            <h4 class="mb-3 h2" id="title-tabel"></h1>
            <table id="example" class="mt-5 table-striped table-bordered table-data" style="min-width: 400px">
              <thead >
                  <tr>
                    <th class="text-center" style="font-size: 13px">No</th>
                      <th class="text-center" style="font-size: 13px">OID</th>
                      <th class="text-center" style="font-size: 13px">HIGHLIGHT ISSUE</th>
                      <th class="text-center" style="font-size: 13px">PIC</th>
                      <th class="text-center width-min1" style="font-size: 13px">DUE DATE INFO</th>
                  </tr>
              </thead>
              <tbody id="tbody">
                  
              </tbody>
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
        @foreach($monthly_status as $monthly)
          @if($monthly->sts_issue == 'On Progress')
            onprogress = <?php echo $monthly->total_issues; ?>;
          @endif

          @if($monthly->sts_issue == 'Open')
            open = <?php echo $monthly->total_issues; ?>;
          @endif

          @if($monthly->sts_issue == 'Close')
            closed = <?php echo $monthly->total_issues; ?>;
          @endif
          
          @if($monthly->sts_issue == 'Hold')
            hold = <?php echo $monthly->total_issues; ?>;
          @endif
          
        @endforeach
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Meeting Progress'],
        ['On Progress', onprogress],
        ['Close', closed],
        ['Hold',  hold],
        ['Open', open]
    ]);

    var options = {
        title: ''
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);

    google.visualization.events.addListener(chart, 'select', selectHandler);

    let datas = {!! $mom_monthly !!};
    let dataOpen = datas.filter((data) => data.sts_issue == 'Open');
    let tbody = document.getElementById('tbody');
    var title = document.getElementById('title-tabel');
    let no = 1;
    tbody.innerHTML = `${dataOpen.map((dataitem) =>
      `
      <tr>
        <td class="text-center">${no++}</td>
        <td>${dataitem.oid_high_issues}</td>
        <td>${dataitem.highlight_issues}</td>
        <td>${dataitem.pic}</td>
        <td>${dataitem.due_date_info}</td>
      </tr>
      `
    ).join("")}`;
    title.innerHTML= `<span class="badge badge-success">Open</span>`;
    console.log(dataOpen);

    function selectHandler() {
      // Show data based on clicked area in chart
      var selectedItem = chart.getSelection()[0];
          if (selectedItem) {
            var DataCategory = data.getValue(selectedItem.row, 0);

            if (DataCategory == 'Open') {
              var item = datas.filter((data) => data.sts_issue == DataCategory);
              title.innerHTML= `<span class="badge badge-success">Open</span>`;
              no = 1;
            }else if(DataCategory == 'On Progress'){
              var item = datas.filter((data) => data.sts_issue == DataCategory);
              title.innerHTML= `<span class="badge badge-primary">On Progress</span>`; 
              no = 1;               
            }else if(DataCategory == 'Hold'){
              var item = datas.filter((data) => data.sts_issue == DataCategory);
              title.innerHTML= `<span class="badge badge-warning">Hold</span>`;  
              no = 1;              
            }else if(DataCategory == 'Close'){
              var item = datas.filter((data) => data.sts_issue == DataCategory);     
              title.innerHTML= `<span class="badge badge-danger ">Close</span>`;    
              no = 1;       
            }
            tbody.innerHTML = `${item.map((dataitem) =>
              `
              <tr>
                <td class="text-center">${no++}</td>
                <td>${dataitem.oid_high_issues}</td>
                <td>${dataitem.highlight_issues}</td>
                <td>${dataitem.pic}</td>
                <td>${dataitem.due_date_info}</td>
              </tr>
              `
            ).join("")}`;
            console.log(datas);
            console.log(item);
          }

    }
  }
</script>
