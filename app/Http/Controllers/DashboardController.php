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
            ->select(DB::raw('YEAR(tgl_mom) as Tahun'))
            ->selectRaw("count(case when oid_jen_mom = 'JM-001' then 1 end) as Year")
            ->selectRaw("count(case when oid_jen_mom = 'JM-003' then 1 end) as Kuarta")
            ->selectRaw("count(case when oid_jen_mom = 'JM-004' then 1 end) as Monthly")
            ->selectRaw("count(case when oid_jen_mom = 'JM-002' then 1 end) as Weekly")
            ->selectRaw("count(*) as Total")
            ->whereYear('tgl_mom', $tahun)
            ->groupBy('Tahun')
            ->get();
            // dd($jenismom);
        return view('dashboard', [
            'title' => 'Dashboard',
            'jenismom'=>$jenismom
        ]);
    }
}

