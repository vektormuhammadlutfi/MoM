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
    public function subholding()
    {
        $this->Subholding = new Subholding();
        // $dataSbu = Sbu::all();
        $dataSubHolding = [
            'subholding' => $this->Subholding->subholding(),
        ];
        return view('subholding', $dataSubHolding);
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
        $this->SubHolding = new Subholding();
        $num = '0';
        if (count($this->SubHolding->subholding()) >= 9) {
            $num = '';
        }

        $this->SubHolding->insert(
            [
                'oid_subholding' => 'SH-' . $num . (count($this->SubHolding->subholding()) + 1),
                'subholding' => $request->subholding,
                'oid_holding' => $request->oid_holding
            ]
        );
        // $request->validate([
        //     'nama_subholding' => 'required',
        //     'holding' => 'required'
        // ]);

        // $data = [
        //     'oid_subholding' => 'SH-' . $num . (count($this->SubHolding->subholding()) + 1),
        //     'subholding' => $request->nama_subholding,
        //     'oid_holding' => $request->oid_holding,
        //     'holding' => $request->holding,
        //     'created_ad' =>
        // ]

        // Subholding::create($request->all());

        return redirect('/subholding');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subholding  $subholding
     * @return \Illuminate\Http\Response
     */
    public function show(Subholding $subholding)
    {
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
    public function destroy($id)
    {
        $this->SubHolding = new Subholding();
        $this->SubHolding->drop($id);

        return redirect('/subholding');
    }
    // public function destroy(Subholding $subholding)
    // {
    // }
}
