<?php

namespace App\Http\Controllers;

use App\Models\Detailmom;
use Illuminate\Http\Request;
use App\Models\Documentation;
use App\Models\HistoryMomDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MomDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Detailmom::where('tb_trans_mom_details.crud', 'C')
        ->orWhere('tb_trans_mom_details.crud', 'U')
        ->get();
        return view('momdetail.momdetail', [
            'title' => 'Mom Detail',
            'details' => $details
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('momdetail.createmomdetail');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detailmom  $detailmom
     * @return \Illuminate\Http\Response
     */
    public function show(Detailmom $detailmom)
    {

        // return view('momdetail.showmomdetail', [
        //     'title' => 'Mom Detail',
        //     'momdetail' => $detailmom
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detailmom  $detailmom
     * @return \Illuminate\Http\Response
     */
    public function edit(Detailmom $detailmom)
    {
        $sts_input = [
            'Open' => 'Open',
            'On_Progress' => 'On Progress',
            'Hold' => 'Hold',
            'Close' => 'Close',
        ];
        
        // dd($detailmom);
        return view('momdetail.editmomdetail', [
            'title' => 'Mom Detail',
            'detail' => $detailmom,
            'sts_input' => $sts_input,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detailmom  $detailmom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detailmom $detailmom)
    {

        $request->validate([
            'highlight_issues' => 'required',
            'due_date_info' => 'required',
            'pic' => 'required',
            'informasi' => 'required',
            'progres_minggu_lalu' => 'required',
            'rencana_minggu_ini' => 'required',
            'sts_issue' => 'required',
            'ket' => '',
        ]);

        $updateMomDetail = [
            'highlight_issues' => $request->highlight_issues,
            'due_date_info' => $request->due_date_info,
            'pic' => $request->pic,
            'informasi' => $request->informasi,
            'progres_minggu_lalu' => $request->progres_minggu_lalu,
            'rencana_minggu_ini' => $request->rencana_minggu_ini,
            'sts_issue' => $request->sts_issue,
            'ket' => $request->ket,
            'crud' => 'U',
            'userupdate' => Auth::user()->username,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Create History if status is changed
        if ($request->sts_issue != $detailmom->sts_issue) {
            $max_id_history = DB::table('tb_trans_history_mom')->max('id');
            $newId = (int) $max_id_history + 1;
            $num = '0';
            if (
                $newId >= 9
            ) {
                $num = '';
            }
            $oid_history = 'HM-' . $num . $newId;

            $createHistory = [
                'oid_history_mom' => $oid_history,
                'oid_high_issues' =>  $detailmom->oid_high_issues,
                'progress_minggu_lalu' => $detailmom->progres_minggu_lalu,
                'rencana_minggu_ini' => $detailmom->rencana_minggu_ini,
                'sts_issue' => $detailmom->sts_issue,
                'usercreate' => Auth::user()->username,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            HistoryMomDetail::create($createHistory);
        }
        //update mom detail
        DB::table('tb_trans_mom_details')->where(
            'oid_high_issues',
            $detailmom->oid_high_issues
        )->update($updateMomDetail);

        return redirect('/momdetail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detailmom  $detailmom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detailmom $detailmom)
    {
        $update = array(
            'crud' => 'D',
            'userdelete' => Auth::user()->username,
            'updated_at' => date('Y-m-d H:i:s')
        );

        // Update Table Mom ===========================
        Detailmom::where('oid_high_issues', $detailmom->oid_high_issues)
            ->update($update);

        // Update Table Documnetations ===========================
        // Documentation::where('oid_mom', $detailmom->oid_mom)
        //     ->update($update);

        return redirect('/momdetail');
    }

    public function history(Detailmom $detailmom)
    {
        $histories = DB::table('tb_trans_history_mom')
            ->select('*', DB::raw("DATE_FORMAT(created_at,'%d %M %Y') as created_at"))
            ->where('oid_high_issues', $detailmom->oid_high_issues)
            ->get();

        return view('momdetail.history', [
            'title' => 'Mom Detail',
            'histories' => $histories
        ]);
    }
}
