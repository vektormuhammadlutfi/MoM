<?php

namespace App\Http\Controllers;

use App\Models\Detailmom;
use Illuminate\Http\Request;

class MomDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('momdetail.momdetail');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('momdetail.createmomdetail');
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
        return view('momdetail.editmomdetail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detailmom  $detailmom
     * @return \Illuminate\Http\Response
     */
    public function edit(Detailmom $detailmom)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detailmom  $detailmom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detailmom $detailmom)
    {
        //
    }
    public function moreMomDetail()
    {
        return view('momdetail.moremomdetail');
    }
}
