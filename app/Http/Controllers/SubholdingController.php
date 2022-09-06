<?php

namespace App\Http\Controllers;

use App\Models\Subholding;
use Illuminate\Http\Request;

class SubholdingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data = Subholding::all();
        // return($data);
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
     * @param  \App\Models\Subholding  $subholding
     * @return \Illuminate\Http\Response
     */
    public function show(Subholding $subholding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subholding  $subholding
     * @return \Illuminate\Http\Response
     */
    public function edit(Subholding $subholding)
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
    public function update(Request $request, Subholding $subholding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subholding  $subholding
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subholding $subholding)
    {
        //
    }
}
