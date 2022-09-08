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
        //
    }
    public function subholding()
    {
        // $this->Subholding = new Subholding();
        // $dataSubHolding = [
        //     'subholding' => $this->Subholding->subholding(),
        // ];
        $subholding =
            DB::table('tb_mas_sub_holdings')
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
        $num = '0';
        if (count(SubholdingModel::all()) >= 9) {
            $num = '';
        }
        $request->validate([
            'subholding' => 'required',
            'oid_holding' => 'required'
        ]);

        SubholdingModel::create([
            'oid_subholding' => 'SH-' . $num . (count(SubholdingModel::all()) + 1),
            'subholding' => $request->subholding,
            'oid_holding' => $request->oid_holding,
            'crud' => 'C',
            'usercreate' => 'ADZ',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        // $this->SubHolding->insert(
        //     [
        //         'oid_subholding' => 'SH-' . $num . (count(SubholdingModel::all()) + 1),
        //         'subholding' => $request->subholding,
        //         'oid_holding' => $request->oid_holding,
        //         'crud' => 'C',
        //         'usercreate' => 'ADZ',
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //     ]
        // );

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
    public function destroy($id)
    {
        $this->SubHolding = new SubholdingModel();
        $this->SubHolding->drop($id);

        return redirect('/subholding');
    }
    // public function destroy(Subholding $subholding)
    // {
    // }
}
