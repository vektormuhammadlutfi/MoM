<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\Detailmom;
use Illuminate\Http\Request;
use App\Exports\DetailMomExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\PDF;
use Dompdf\Dompdf;
// use PDF;

class MomReportController extends Controller
{
    public function index()
    {
        $mom_report = DB::table('tb_trans_moms')
            ->where('tb_trans_moms.crud', 'U')
            ->orWhere('tb_trans_moms.crud', 'C')
            ->leftJoin('tb_trans_mom_details', 'tb_trans_moms.oid_mom', '=', 'tb_trans_mom_details.oid_mom')
            ->leftJoin('tb_mas_mom_jenis', 'tb_trans_moms.oid_jen_mom', '=', 'tb_mas_mom_jenis.oid_jen_mom')
            ->get();
        // dd($mom_report);
        return view('momreport.momreport', [
            'title' => 'Mom Report',
            'mom_report' => $mom_report
        ]);
    }
    public function exportExcel() 
    {
        return Excel::download(new DetailMomExport, 'momreport.xlsx');
    }
    public function exportPDF(Request $request)
    {
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');
        
        $query = DB::table('tb_trans_moms')
        ->where('tb_trans_moms.crud', 'U')
        ->orWhere('tb_trans_moms.crud', 'C')
        ->leftJoin('tb_trans_mom_details', 'tb_trans_moms.oid_mom', '=', 'tb_trans_mom_details.oid_mom')
        ->leftJoin('tb_mas_mom_jenis', 'tb_trans_moms.oid_jen_mom', '=', 'tb_mas_mom_jenis.oid_jen_mom');
        
        if($from_date && $to_date) {
            $mom_report = $query->where('tb_trans_moms.tgl_mom', '>=', $from_date)
            ->where('tb_trans_moms.tgl_mom', '<=', $to_date)->get();
            // dd($mom_report);
        }elseif($from_date && empty($to_date)){
            $mom_report = $query->where('tb_trans_moms.tgl_mom', '>=', $from_date)->get();
        }elseif(empty($from_date) && $to_date){
            $mom_report = $query->where('tb_trans_moms.tgl_mom', '<=', $to_date)->get();
        }else{
            $mom_report = $query->get();
        }

        $html = view('print.mompdf', [
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'mom_report' => $mom_report
        ]);
        $pdf = new Dompdf();
        $pdf->loadHTML($html);
        // (Optional) Setup the paper size and orientation
        $pdf->setPaper('A4', 'landscape');
        // Render the HTML as PDF
        $pdf->render();
        $pdf->stream('report_mom_' . $request->from_date . '_' . $request->to_date);
    }
    
    public function momReportDoc()
    {
        $description = DB::table('tb_trans_documentations')
            ->where('tb_trans_documentations.crud', 'C')
            ->orWhere('tb_trans_documentations.crud', 'U')
            ->get();
        // dd($description);
        return view('momreport.momreportdoc', [
            'title' => 'Documentation',
            'description' => $description
        ]);
    }
    public function exportMomDoc()
    {
        $description = DB::table('tb_trans_documentations')
            ->where('tb_trans_documentations.crud', 'C')
            ->orWhere('tb_trans_documentations.crud', 'U')
            ->get();
        $html = view('print.momdocPdf', [
            'description' => $description
        ]);
        $pdf = PDF::loadHTML($html);
        // $pdf = PDF::setPaper('A4', 'landscape');
        return $pdf->download('MomReportDoc.pdf');
    }
}
