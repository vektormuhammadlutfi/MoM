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
        $jenismom = DB::table('tb_mas_mom_jenis')
            ->join('tb_trans_moms', 'tb_trans_moms.oid_jen_mom', '=', 'tb_mas_mom_jenis.oid_jen_mom')
            ->join('tb_trans_mom_details', 'tb_trans_mom_details.oid_mom', '=','tb_trans_moms.oid_mom',)
            ->where(function($query){
                $query->where('tb_trans_mom_details.crud', 'C')
                ->orWhere('tb_trans_mom_details.crud', 'U')
                ->where(function($query){
                    $query->where('tb_trans_moms.crud', 'C')
                    ->orWhere('tb_trans_moms.crud', 'U');
                });
            })
            ->where(function($query){
                $query->where('tb_mas_mom_jenis.crud', 'U')
                ->orWhere('tb_mas_mom_jenis.crud', 'C'); 
            })
            ->select(
                DB::raw('YEAR(tb_trans_mom_details.created_at) as Tahun'),
                DB::raw("count(case when tb_mas_mom_jenis.oid_jen_mom = 'JM-001' then 1 end) as Yearly"),
                DB::raw("count(case when tb_mas_mom_jenis.oid_jen_mom = 'JM-003' then 1 end) as Kuartal"),
                DB::raw("count(case when tb_mas_mom_jenis.oid_jen_mom = 'JM-004' then 1 end) as Monthly"),
                DB::raw("count(case when tb_mas_mom_jenis.oid_jen_mom = 'JM-002' then 1 end) as Weekly"),
                DB::raw("count(*) as Total"),
            )
            ->groupBy('Tahun')
            ->get();

        $totalStatus = DB::table('tb_mas_mom_jenis')
            ->join('tb_trans_moms', 'tb_trans_moms.oid_jen_mom', '=', 'tb_mas_mom_jenis.oid_jen_mom')
            ->join('tb_trans_mom_details', 'tb_trans_mom_details.oid_mom', '=','tb_trans_moms.oid_mom',)
            ->where(function($query){
                $query->where('tb_trans_mom_details.crud', 'C')
                ->orWhere('tb_trans_mom_details.crud', 'U')
                ->where(function($query){
                    $query->where('tb_trans_moms.crud', 'C')
                    ->orWhere('tb_trans_moms.crud', 'U');
                });
            })
            ->where(function($query){
                $query->where('tb_mas_mom_jenis.crud', 'U')
                ->orWhere('tb_mas_mom_jenis.crud', 'C'); 
            })
            ->select(
                'tb_mas_mom_jenis.oid_jen_mom',
                'tb_mas_mom_jenis.jenis_mom',
                DB::raw('YEAR(tb_trans_mom_details.created_at) as Tahun'),
                DB::raw('count(case when sts_issue = "Open" then 1 end) as open'),
                DB::raw('count(case when sts_issue = "On Progress" then 1 end) as on_progress'),
                DB::raw('count(case when sts_issue = "Hold" then 1 end) as hold'),
                DB::raw('count(case when sts_issue = "Close" then 1 end) as close'),
            )
            ->groupBy('Tahun')
            ->groupBy('oid_jen_mom')
            ->groupBy('jenis_mom')
            ->get();
        // dd($totalStatus);
        return view('dashboard.dashboard', [
            'title' => 'Dashboard',
            'jenismom'=> $jenismom,
            'totalStatus' => $totalStatus
        ]);
    }
    public function weekly_status(){
        $weekly_status = DB::table('tb_mas_mom_jenis')
            ->join('tb_trans_moms', 'tb_mas_mom_jenis.oid_jen_mom', '=', 'tb_trans_moms.oid_jen_mom')
            ->join('tb_trans_mom_details', 'tb_trans_moms.oid_mom','=','tb_trans_mom_details.oid_mom')
            ->where('tb_mas_mom_jenis.oid_jen_mom', 'JM-002')
            ->select('sts_issue', DB::raw('count(*) as total_issues'))
            ->groupBy('sts_issue')
            ->get();
            dd($weekly_status);
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

