<?php

namespace App\Http\Controllers;

use App\Models\SbuModel;
use App\Models\Subholding;
use App\Models\SubholdingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SbuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {

    // }
    public function sbu()
    {
        // $dataSbu = SbuModel::all();
        $dataSbu = DB::table('tb_mas_sbus')
            ->leftJoin('tb_mas_sub_holdings', 'tb_mas_sbus.oid_subholding', '=', 'tb_mas_sub_holdings.oid_subholding')
            ->get();
        // $dataSbu = DB::table('tb_mas_sub_holdings')
        //     ->leftJoin('tb_mas_holdings', 'tb_mas_holdings.oid_holding', '=', 'tb_mas_sub_holdings.oid_holding')
        //     ->get();
        $dataSubholding = SubholdingModel::all();
        return view('sbu', compact('dataSbu', 'dataSubholding'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //memvalidasi request yang diterima
        $request->validate([
            'sbu_name' => 'required',
            'oid_subholding' => 'required'
        ]);

        //men-generate angka pada oid
        $num = '0';
        if (count(SbuModel::all()) >= 9) {
            $num = '';
        }

        //membuat data baru ke database
        SbuModel::create([
            'oid_sbu' => 'SBU-' . $num . (count(SbuModel::all()) + 1),
            'sbu_name' => $request->sbu_name,
            'oid_subholding' => $request->oid_subholding,
            'crud' => 'C',
            'usercreate' => 'ADZ',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        //mengembalikan halaman ke /sbu
        return redirect('/sbu');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\SbuModel $sbu
     * @return \Illuminate\Http\Response
     */
    public function show(SbuModel $sbu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\SbuModel $sbu
     * @return \Illuminate\Http\Response
     */
    public function edit(SbuModel $sbu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SbuModel $sbu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SbuModel $sbu)
    {
        $request->validate([
            'sbu_name' => 'required',
            'subholding' => 'subholding'
        ]);

        SbuModel::where('id', $sbu->id)->update($request);

        return redirect('sbu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\SbuModel $sbu
     * @return \Illuminate\Http\Response
     */
    public function destroy(SbuModel $sbu)
    {
        //
    }
}
