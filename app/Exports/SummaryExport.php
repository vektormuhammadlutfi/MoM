<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SummaryExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
      $data_summary = DB::table('tb_trans_mom_details')
        ->select('pic',
          DB::raw('count(*) as total'), 
          DB::raw('count(case when sts_issue = "Open" then 1 end) as open'),
          DB::raw('count(case when sts_issue = "On Progres" then 1 end) as on_progress'),
          DB::raw('count(case when sts_issue = "Hold" then 1 end) as hold'),
          DB::raw('count(case when sts_issue = "Close" then 1 end) as close'),
        )
        ->groupBy('pic')
        ->get();
      return $data_summary;
    }
    public function headings(): array
    {
        return [
          "PIC", 
          "JUMLAH MOM", 
          "OPEN", 
          "ON PROGRES", 
          "HOLD", 
          "CLOSE"];
    }
}
