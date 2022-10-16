<!DOCTYPE html>
<html>
<head>
<style>
body {
  
}
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-size: 12px;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
  <h3 class="mb-5">MoM Report</h3>
  <p>Dari Tanggal : {{ $from_date }}</p>
  <p>Sampai Tanggal : {{ $to_date }}</p>
  <table id="customers" class="mt-5 table-striped table-bordered table-data" style="min-width: 400px">
    <thead >
      <tr>
        <th class="text-center" style="font-size: 13px">No</th>
        <th class="text-center" style="font-size: 13px">Jenis MoM</th>
        <th class="text-center" style="font-size: 13px">Tanggal</th>
        <th class="text-center" style="font-size: 13px">KPI/Highlight Issues</th>
        <th class="text-center" style="font-size: 13px">PIC</th>
        <th class="text-center" style="font-size: 13px">Informasi</th>
        <th class="text-center" style="font-size: 13px">Progres Minggu Lalu</th>
        <th class="text-center" style="font-size: 13px">Rencana Minggu Ini</th>
        <th class="text-center" style="font-size: 13px">Due Date</th>
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
          <td>{{$mom->informasi}}</td>
          <td>{{$mom->progres_minggu_lalu}}</td>
          <td>{{$mom->rencana_minggu_ini}}</td>
          <td>{{ $mom->due_date_info }}</td>
          <td>{{$mom->sts_issue}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>

</body>
</html>