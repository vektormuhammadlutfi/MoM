<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
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
        $mom_weekly = DB::table('tb_trans_mom_details')
            ->leftJoin('tb_trans_moms', 'tb_trans_mom_details.oid_mom', '=', 'tb_trans_moms.oid_mom')
            ->leftJoin('tb_mas_mom_jenis', 'tb_trans_moms.oid_jen_mom', '=', 'tb_mas_mom_jenis.oid_jen_mom')
            ->select('oid_high_issues', 'pic', 'highlight_issues', 'sts_issue', 'due_date_info')
            ->where('tb_mas_mom_jenis.oid_jen_mom', 'JM-002')
            ->get();
        // dd($mom_weekly);
        return view('dashboard.weeklystatus', [
            'title' => 'dashboard',
            'weekly_status' => $weekly_status,
            'mom_weekly' => $mom_weekly
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
                 // dd($weekly_status);
        $mom_monthly = DB::table('tb_trans_mom_details')
            ->leftJoin('tb_trans_moms', 'tb_trans_mom_details.oid_mom', '=', 'tb_trans_moms.oid_mom')
            ->leftJoin('tb_mas_mom_jenis', 'tb_trans_moms.oid_jen_mom', '=', 'tb_mas_mom_jenis.oid_jen_mom')
            ->select('oid_high_issues', 'pic', 'highlight_issues', 'sts_issue', 'due_date_info')
            ->where('tb_mas_mom_jenis.oid_jen_mom', 'JM-004')
            ->get();
        // dd($mom_monthly);
       
        return view ('dashboard.monthlystatus', [
            'title' => 'dashboard',
            'monthly_status' => $monthly_status,
            'mom_monthly' => $mom_monthly
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
        $mom_kuartal = DB::table('tb_trans_mom_details')
            ->leftJoin('tb_trans_moms', 'tb_trans_mom_details.oid_mom', '=', 'tb_trans_moms.oid_mom')
            ->leftJoin('tb_mas_mom_jenis', 'tb_trans_moms.oid_jen_mom', '=', 'tb_mas_mom_jenis.oid_jen_mom')
            ->select('oid_high_issues', 'pic', 'highlight_issues', 'sts_issue', 'due_date_info')
            ->where('tb_mas_mom_jenis.oid_jen_mom', 'JM-003')
            ->get();
        // dd($mom_kuartal);
       
        return view ('dashboard.kuartalstatus', [
            'title' => 'dashboard',
            'kuartal_status' => $kuartal_status,
            'mom_kuartal' => $mom_kuartal
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
        $mom_yearly = DB::table('tb_trans_mom_details')
            ->leftJoin('tb_trans_moms', 'tb_trans_mom_details.oid_mom', '=', 'tb_trans_moms.oid_mom')
            ->leftJoin('tb_mas_mom_jenis', 'tb_trans_moms.oid_jen_mom', '=', 'tb_mas_mom_jenis.oid_jen_mom')
            ->select('oid_high_issues', 'pic', 'highlight_issues', 'sts_issue', 'due_date_info')
            ->where('tb_mas_mom_jenis.oid_jen_mom', 'JM-001')
            ->get();
        // dd($mom_yearly);
       
        return view ('dashboard.yearlystatus', [
            'title' => 'dashboard',
            'yearly_status' => $yearly_status,
            'mom_yearly' => $mom_yearly
        ]);
    }
}

