<?php

namespace App\Http\Controllers;

use App\Models\Detailmom;
use Illuminate\Http\Request;
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

        return view('momdetail.showmomdetail', [
            'title' => 'Mom Detail',
            'momdetail' => $detailmom
        ]);
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
        dd($detailmom);
        Detailmom::where('oid_high_issues', $detailmom->oid_high_issues)
            ->update([
                'crud' => 'D',
                'userdelete' => Auth::user()->name,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        return redirect('/momdetail');
    }
}
