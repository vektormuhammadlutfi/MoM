<?php

namespace App\Http\Controllers;

use App\Models\SbuModel;
use App\Models\Subholding;
use Illuminate\Http\Request;

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
        $this->SbuModel = new SbuModel();
        // $dataSbu = Sbu::all();
        $dataSbu = [
            'sbu' => $this->SbuModel->Sbu(),
        ];
        return view('sbu', $dataSbu);
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
        $request->validate([
            'name' => 'required',
            'subholding' => 'required',
        ]);
        $count = SbuModel::all()->count();;
        $oid_sbu = 'SBU'.'-'.$count+1;
        // $inputsbu = $request->all();
        $inputsbu = array([
            'name' => $request->name,
            'oid_subholding' => $request->subholding,
            'crud' => 'C',
            'oid_sbu' => $oid_sbu,
        ]);
        // SbuModel::create($inputsbu);
        return dd($inputsbu);
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
        //
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
        //
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
