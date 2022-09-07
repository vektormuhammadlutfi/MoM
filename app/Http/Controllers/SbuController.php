<?php

namespace App\Http\Controllers;

use App\Models\SbuModel;
use App\Models\Subholding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SbuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Sbu::where('id', 1)->value('oid_subholding');
        // // $data = $data->oid_subholding;
        // $cek = Subholding::firstWhere('oid_subholding', $data);
        // $data = Sbu::all();
        // return $data->subholding->subholding;
    }
    
    public function sbu()
    {
        $dataSbu = DB::table('tb_mas_sbus')
            ->Join('tb_mas_sub_holdings', 'tb_mas_sub_holdings.oid_subholding', '=', 'tb_mas_sbus.oid_subholding')
            ->get();
        
        $datasubholding = DB::table('tb_mas_sub_holdings')
            ->get();

        // return view('sbu', compact('dataSbu', 'datasubholding'));
        return view('sbu', ['dataSbu'=> $dataSbu, 'datasubholding' => $datasubholding]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sbu_name' => 'required',
            'subholding' => 'required',
        ]);
        $count = SbuModel::all()->count();;
        $oid_sbu = 'SBU'.'-'.$count+1;
        
        $inputsbu = array(
            'oid_sbu' => $oid_sbu,
            'oid_subholding' => $validatedData['subholding'],
            'sbu_name' => $validatedData['sbu_name'],
            'crud' => 'C',
            'usercreate' => 'ADZ',
            'userupdate' => 'null',
            'userdelete' => 'null',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        // return dd($inputsbu);
        SbuModel::create($inputsbu);
        return redirect('/sbu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sbu  $sbu
     * @return \Illuminate\Http\Response
     */
    public function show(SbuModel $sbu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sbu  $sbu
     * @return \Illuminate\Http\Response
     */
    public function edit(SbuModel $sbu)
    {
        // return view('/sbu');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sbu  $sbu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SbuModel $sbu)
    {
        $validatedData = $request->validate([
            'sbu_name' => 'required',
            'subholding' => 'required',
        ]);
        $count = SbuModel::all()->count();;
        $oid_sbu = 'SBU'.'-'.$count+1;
        
        $inputsbu = array(
            'oid_sbu' => $oid_sbu,
            'sbu_name' => $validatedData['sbu_name'],
            'oid_subholding' => $validatedData['subholding'],
            'crud' => 'C',
            'usercreate' => 'ADZ',
            'userupdate' => 'null',
            'userdelete' => 'null',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        return dd($inputsbu);
        // SbuModel::create($inputsbu);
        // return redirect('/sbu');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sbu  $sbu
     * @return \Illuminate\Http\Response
     */
    public function destroy(SbuModel $sbu)
    {
        //
    }
}
