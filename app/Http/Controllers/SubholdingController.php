<?php

namespace App\Http\Controllers;

use App\Models\SubholdingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubholdingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subholding =
            DB::table('tb_mas_sub_holdings')
            ->where('tb_mas_sub_holdings.crud', 'C')
            ->orWhere('tb_mas_sub_holdings.crud', 'U')
            ->leftJoin('tb_mas_holdings', 'tb_mas_holdings.oid_holding', '=', 'tb_mas_sub_holdings.oid_holding')
            ->get();
        return view('subholding', compact('subholding'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //memvalidasi request yang diterima
        $request->validate([
            'subholding' => 'required',
            'oid_holding' => 'required'
        ]);

        //men-generate angka pada oid
        $num = '0';
        if (count(SubholdingModel::all()) >= 9) {
            $num = '';
        }

        //membuat data baru ke database
        SubholdingModel::create([
            'oid_subholding' => 'SH-' . $num . (count(SubholdingModel::all()) + 1),
            'subholding' => $request->subholding,
            'oid_holding' => $request->oid_holding,
            'crud' => 'C',
            'usercreate' => 'ADZ',
            'userupdate' => null,
            'userdelete' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        //mengembalikan halaman ke /subholding
        return redirect('/subholding');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subholding  $subholding
     * @return \Illuminate\Http\Response
     */
    public function show(SubholdingModel $subholding)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subholding  $subholding
     * @return \Illuminate\Http\Response
     */
    public function edit(SubholdingModel $subholding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subholding  $subholding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubholdingModel $subholding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subholding  $subholding
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubholdingModel $subholding)
    {
    }
}
