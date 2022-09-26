<?php

namespace App\Http\Controllers;

use App\Models\Detailmom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MomDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('momdetail.momdetail', [
            'title' => 'Mom Detail',
            'details' => Detailmom::getAll()
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
        return view('momdetail.editmomdetail', [
            'title' => 'Mom Detail',
            'detail' => $detailmom
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
        // dd($request);
        $request->validate([
            'highlight_issues' => 'required',
            'due_date_info' => 'required',
            'pic' => 'required',
            'informasi' => 'required',
            'progres_minggu_lalu' => 'required',
            'rencana_minggu_ini' => 'required',
            'sts_issue' => 'required',
            'ket' => 'required',
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
        //update
        DB::table('tb_trans_mom_details')->where('oid_high_issues', $detailmom->oid_high_issues)->update($updateMomDetail);
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
        Detailmom::where('oid_high_issues', $detailmom->oid_high_issues)
            ->update([
                'crud' => 'D',
                'userdelete' => Auth::user()->username,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        return redirect('/momdetail');
    }
}
