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
  background-color: #04AA6D;
  color: white;
}
.text-center {
  text-align: center;
}
</style>
</head>
<body>
  <h3 class="mb-5">Summary</h3>
  <table id="customers" class="mt-5 table-striped table-bordered table-data" style="min-width: 400px">
    <thead >
      <tr>
        <th class="text-center" style="font-size: 13px; max-width: 40px">No</th>
        <th class="text-center" style="font-size: 13px; max-width: 40px">Pic</th>
        <th class="text-center" style="font-size: 13px; max-width: 40px">Amount Of MoM</th>
        <th class="text-center" style="font-size: 13px; max-width: 40px">Open</th>
        <th class="text-center" style="font-size: 13px; max-width: 40px">On Progres</th>
        <th class="text-center" style="font-size: 13px; max-width: 40px">Hold</th>
        <th class="text-center" style="font-size: 13px; max-width: 40px">Close</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data_summary as $item)
      <tr>
        <td >{{ $loop->iteration }}</td>
        <td class="width-min1">{{ $item->pic }}</td>
        <td class="width-min1 text-center">{{ $item->total }}</td>
        <td class="width-min07 text-center">{{ $item->open }}</td>
        <td class="width-min07 text-center">{{ $item->on_progress }}</td>
        <td class="width-min07 text-center">{{ $item->hold }}</td>
        <td class="width-min07 text-center">{{ $item->close }}</td>
      </tr>
      @endforeach
      {{-- inialisasi nilai ke variabel --}}
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
        <td class="text-center" colspan="2" rowspan="2">Total</td>
        <td class="text-center" rowspan="2">{{ $total_issues }}</td> 
        <td class="text-center">{{ $total_sts_open }}</td>      
        <td class="text-center">{{ $total_sts_hold }}</td>      
        <td class="text-center">{{ $total_sts_onprogress }}</td>      
        <td class="text-center">{{ $total_sts_close }}</td>      
      </tr>
      
      <tr>
        <td class="text-center">{{ $persen_sts_open }}%</td>
        <td class="text-center">{{ $persen_sts_hold }}%</td>
        <td class="text-center">{{ $persen_sts_onprogress }}%</td>
        <td class="text-center">{{ $persen_sts_close }}%</td>
      </tr>
    </tbody>
  </table>
  <script>
    let datas = {!! $data_summary !!}
    console.log({!! $data_summary !!});
  </script>
</body>
</html>