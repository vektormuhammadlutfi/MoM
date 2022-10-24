<?php

namespace App\Http\Controllers;

use App\Exports\SummaryExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Dompdf\Dompdf;

class SummaryController extends Controller
{
    public function index()
    {
        $data_summary = DB::table('tb_trans_mom_details')
            ->where('tb_trans_mom_details.crud', 'C')
            ->orWhere('tb_trans_mom_details.crud', 'U')
            ->select('pic', DB::raw('count(*) as total'), 
                DB::raw('count(case when sts_issue = "Open" then 1 end) as open'),
                DB::raw('count(case when sts_issue = "On Progress" then 1 end) as on_progress'),
                DB::raw('count(case when sts_issue = "Hold" then 1 end) as hold'),
                DB::raw('count(case when sts_issue = "Close" then 1 end) as close'),
            )
            ->groupBy('pic')
            ->get();
        $total_issues = DB::table('tb_trans_mom_details')
            ->where('tb_trans_mom_details.crud', 'C')
            ->orWhere('tb_trans_mom_details.crud', 'U')
            ->select('oid_high_issues', DB::raw('count(*) as total'))
            ->groupBy('oid_high_issues')
            ->get()->count();

        $issues = DB::table('tb_trans_mom_details')
            ->where('tb_trans_mom_details.crud', 'C')
            ->orWhere('tb_trans_mom_details.crud', 'U')
            ->select('sts_issue', DB::raw('count(*) as Total_sts'))
            ->groupBy('sts_issue')
            ->get();
        // dd( $data_summary);
        return view('momreport.summary', [
            "title" => "Summary",
            "data_summary" => $data_summary,
            "total_issues" => $total_issues,
            "issues" => $issues
        ]);
    }

    public function summaryPdf(Request $request)
    {
        $data_summary = DB::table('tb_trans_mom_details')
            ->where('tb_trans_mom_details.crud', 'C')
            ->orWhere('tb_trans_mom_details.crud', 'U')
            ->select('pic', DB::raw('count(*) as total'), 
                DB::raw('count(case when sts_issue = "Open" then 1 end) as open'),
                DB::raw('count(case when sts_issue = "On Progress" then 1 end) as on_progress'),
                DB::raw('count(case when sts_issue = "Hold" then 1 end) as hold'),
                DB::raw('count(case when sts_issue = "Close" then 1 end) as close'),
            )
            ->groupBy('pic')
            ->get();

            // $data_summary = DB::table('tb_trans_mom_details')
            // ->select('pic', DB::raw('count(*) as total'), 
            //     DB::raw('count(case when sts_issue = "Open" then 1 end) as open'),
            //     DB::raw('count(case when sts_issue = "On Progress" then 1 end) as on_progress'),
            //     DB::raw('count(case when sts_issue = "Hold" then 1 end) as hold'),
            //     DB::raw('count(case when sts_issue = "Close" then 1 end) as close'),
            // )
            // ->groupBy('pic')
            // ->get();
        
        $total_issues = DB::table('tb_trans_mom_details')
            ->where('tb_trans_mom_details.crud', 'C')
            ->orWhere('tb_trans_mom_details.crud', 'U')
            ->select('oid_high_issues', DB::raw('count(*) as total'))
            ->groupBy('oid_high_issues')
            ->get()->count();

        $issues = DB::table('tb_trans_mom_details')
            ->where('tb_trans_mom_details.crud', 'C')
            ->orWhere('tb_trans_mom_details.crud', 'U')
            ->select('sts_issue', DB::raw('count(*) as Total_sts'))
            ->groupBy('sts_issue')
            ->get();

        // dd($data_summary);
        // return view('print.summaryPdf', compact('data_summary', 'total_issues', 'issues'));

        $html = view('print.summaryPdf', compact('data_summary', 'total_issues', 'issues'));
        $pdf = new Dompdf();
        $pdf->loadHTML($html);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        $pdf->stream('summary');
    }
    public function summaryExcel() 
    {
        return Excel::download(new SummaryExport, 'Summary.xlsx');
    }
}
