<?php

namespace App\Http\Controllers;

use App\Models\Mom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moms = DB::table('tb_trans_moms')
            ->leftJoin('tb_mas_sbus', 'tb_trans_moms.oid_sbu', '=', 'tb_mas_sbus.oid_sbu')
            ->leftJoin('tb_mas_mom_jenis', 'tb_trans_moms.oid_jen_mom', '=', 'tb_mas_mom_jenis.oid_jen_mom')
            ->get();
        return view('mom', [
            'moms' => $moms
        ]);
        // return dd($moms);
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
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Mom $mom
     * @return \Illuminate\Http\Response
     */
    public function show(Mom $mom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Mom $mom
     * @return \Illuminate\Http\Response
     */
    public function edit(Mom $mom)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Mom $mom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mom $mom)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Mom $mom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mom $mom)
    {
    }
}
