<?php

namespace App\Http\Controllers;

use App\Models\Sbu;
use Illuminate\Http\Request;

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
        $dataSbu = Sbu::all();
        return view('sbu', compact('dataSbu'));
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
            'namesbu' => 'required',
            'namesubholding' => 'required'
        ]);
        $inputsbu = $request->all();
        Sbu::create($inputsbu);
        return redirect('/sbu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sbu  $sbu
     * @return \Illuminate\Http\Response
     */
    public function show(Sbu $sbu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sbu  $sbu
     * @return \Illuminate\Http\Response
     */
    public function edit(Sbu $sbu)
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
    public function update(Request $request, Sbu $sbu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sbu  $sbu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sbu $sbu)
    {
        //
    }
}
