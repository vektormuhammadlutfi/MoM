<?php

namespace App\Exports;

use App\Models\Detailmom;
use Clockwork\Request\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class DetailMomExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $mom_report = DB::table('tb_trans_moms')
            ->where('tb_trans_moms.crud', 'U')
            ->orWhere('tb_trans_moms.crud', 'C')
            ->leftJoin('tb_trans_mom_details', 'tb_trans_moms.oid_mom', '=', 'tb_trans_mom_details.oid_mom')
            ->leftJoin('tb_mas_mom_jenis', 'tb_trans_moms.oid_jen_mom', '=', 'tb_mas_mom_jenis.oid_jen_mom')
            ->select('tb_mas_mom_jenis.jenis_mom', 'tb_trans_moms.tgl_mom', 'tb_trans_mom_details.highlight_issues', 'tb_trans_mom_details.pic', 'tb_trans_mom_details.informasi', 'tb_trans_mom_details.progres_minggu_lalu','tb_trans_mom_details.rencana_minggu_ini', 'tb_trans_mom_details.due_date_info', 'tb_trans_mom_details.sts_issue')
            ->get();
        return  $mom_report;
    }
    public function headings(): array
    {
        return ["JENIS MOM", "TANGGAL", "KIP/HIGHLIGHT ISSUES", "PIC", "INFORMASI", "PROGRES MINGGU LALU", "RENCANA MINGGU INI", "DUE DATE", "STATUS"];
    }
}
