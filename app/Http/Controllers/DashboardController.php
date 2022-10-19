<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // $tahun= 2022;
        // $jenismom = DB::table('tb_trans_moms')
        //     ->select(DB::raw('YEAR(tgl_mom) as Tahun'))
        //     ->selectRaw("count(case when oid_jen_mom = 'JM-001' then 1 end) as Year")
        //     ->selectRaw("count(case when oid_jen_mom = 'JM-003' then 1 end) as Kuarta")
        //     ->selectRaw("count(case when oid_jen_mom = 'JM-004' then 1 end) as Monthly")
        //     ->selectRaw("count(case when oid_jen_mom = 'JM-002' then 1 end) as Weekly")
        //     ->selectRaw("count(*) as Total")
        //     ->whereYear('tgl_mom', $tahun)
        //     ->groupBy('Tahun')
        //     ->get();
        $tahun= 2022;
        $jenismom = DB::table('tb_trans_moms')
            ->Leftjoin('tb_trans_mom_details','tb_trans_moms.oid_mom','=','tb_trans_mom_details.oid_mom')
            ->select(
                DB::raw('YEAR(tgl_mom) as Tahun'),
                DB::raw("count(case when sts_issue = 'open' then 1 end) as open"),
                DB::raw("count(case when sts_issue = 'progress' then 1 end) as progress"),
                DB::raw("count(case when sts_issue = 'close' then 1 end) as close"),
                DB::raw("count(case when sts_issue = 'hold' then 1 end) as hold"),
                DB::raw("count(case when oid_jen_mom = 'JM-001' then 1 end) as Year"),
                DB::raw("count(case when oid_jen_mom = 'JM-003' then 1 end) as Kuarta"),
                DB::raw("count(case when oid_jen_mom = 'JM-004' then 1 end) as Monthly"),
                DB::raw("count(case when oid_jen_mom = 'JM-002' then 1 end) as Weekly"),
                DB::raw("count(*) as Total"),
            )
            ->groupBy('tahun')
            ->get();
        // dd($jenismom);
        $totalStatus = DB::table('tb_trans_mom_details')
            ->leftJoin('tb_trans_moms', 'tb_trans_mom_details.oid_mom', '=', 'tb_trans_moms.oid_mom')
            ->leftJoin('tb_mas_mom_jenis', 'tb_trans_moms.oid_jen_mom', '=', 'tb_mas_mom_jenis.oid_jen_mom')
            ->select(
                'jenis_mom',
                DB::raw('count(*) as total'),
                DB::raw('count(case when sts_issue = "Open" then 1 end) as open'),
                DB::raw('count(case when sts_issue = "On Progress" then 1 end) as on_progress'),
                DB::raw('count(case when sts_issue = "Hold" then 1 end) as hold'),
                DB::raw('count(case when sts_issue = "Close" then 1 end) as close'),
            )
            ->groupBy('jenis_mom')
            ->get();
        // dd($totalStatus);
        return view('dashboard.dashboard', [
            'title' => 'Dashboard',
            'jenismom'=> $jenismom,
            'totalstatus' => $totalStatus
        ]);
    }
    public function weekly_status(){
        $tahun = 2022;
        $weekly_status = DB::table('tb_mas_mom_jenis')
            ->join('tb_trans_moms', 'tb_mas_mom_jenis.oid_jen_mom', '=', 'tb_trans_moms.oid_jen_mom')
            ->join('tb_trans_mom_details', 'tb_trans_moms.oid_mom','=','tb_trans_mom_details.oid_mom')
            ->where('tb_mas_mom_jenis.oid_jen_mom', 'JM-002')
            ->select('sts_issue', DB::raw('count(*) as total_issues'))
            ->groupBy('sts_issue')
            ->get();
            // dd($weekly_status);
        $mom_weekly_open = DB::table('tb_trans_mom_details')
        ->leftJoin('tb_trans_moms', 'tb_trans_mom_details.oid_mom', '=', 'tb_trans_moms.oid_mom')
        ->leftJoin('tb_mas_mom_jenis', 'tb_trans_moms.oid_jen_mom', '=', 'tb_mas_mom_jenis.oid_jen_mom')
            ->where('tb_mas_mom_jenis.oid_jen_mom', 'JM-002')
            ->where('tb_trans_mom_details.sts_issue', 'Open')
            ->get();
            // dd($mom_weekly_open);
        return view ('dashboard.weeklystatus', [
            'title' => 'dashboard',
            'weekly_status' => $weekly_status,
            'mom_weekly_open' => $mom_weekly_open
        ]);
    }
    public function monthly_status(){
        $tahun = 2022;
        $monthly_status = DB::table('tb_mas_mom_jenis')
            ->join('tb_trans_moms', 'tb_mas_mom_jenis.oid_jen_mom', '=', 'tb_trans_moms.oid_jen_mom')
            ->join('tb_trans_mom_details', 'tb_trans_moms.oid_mom','=','tb_trans_mom_details.oid_mom')
            ->where('tb_mas_mom_jenis.oid_jen_mom', 'JM-004')
            ->select('sts_issue', DB::raw('count(*) as total_issues'))
            ->groupBy('sts_issue')
            ->get();
       
        return view ('dashboard.monthlystatus', [
            'title' => 'dashboard',
            'monthly_status' => $monthly_status
        ]);
    }
    public function kuartal_status(){
        $tahun = 2022;
        $kuartal_status = DB::table('tb_mas_mom_jenis')
            ->join('tb_trans_moms', 'tb_mas_mom_jenis.oid_jen_mom', '=', 'tb_trans_moms.oid_jen_mom')
            ->join('tb_trans_mom_details', 'tb_trans_moms.oid_mom','=','tb_trans_mom_details.oid_mom')
            ->where('tb_mas_mom_jenis.oid_jen_mom', 'JM-003')
            ->select('sts_issue', DB::raw('count(*) as total_issues'))
            ->groupBy('sts_issue')
            ->get();
       
        return view ('dashboard.kuartalstatus', [
            'title' => 'dashboard',
            'kuartal_status' => $kuartal_status
        ]);
    }
    public function yearly_status(){
        $tahun = 2022;
        $yearly_status = DB::table('tb_mas_mom_jenis')
            ->join('tb_trans_moms', 'tb_mas_mom_jenis.oid_jen_mom', '=', 'tb_trans_moms.oid_jen_mom')
            ->join('tb_trans_mom_details', 'tb_trans_moms.oid_mom','=','tb_trans_mom_details.oid_mom')
            ->where('tb_mas_mom_jenis.oid_jen_mom', 'JM-001')
            ->select('sts_issue', DB::raw('count(*) as total_issues'))
            ->groupBy('sts_issue')
            ->get();
       
        return view ('dashboard.yearlystatus', [
            'title' => 'dashboard',
            'yearly_status' => $yearly_status
        ]);
    }
}

