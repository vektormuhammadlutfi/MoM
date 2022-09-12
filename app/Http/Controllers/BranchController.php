<?php

namespace App\Http\Controllers;

use App\Models\BranchModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Branches = DB::table('tb_mas_branches')
            ->where('tb_mas_branches.crud', 'Ç')
            ->orWhere('tb_mas_branches.crud', 'U')
            ->get();
        // return dd($Branches);
        // $Branches = BranchModel::all();
        $title = 'Branch';
        return view('branch.branch', compact('title', 'Branches'));
    }

    public function detailBranch(BranchModel $Branch)
    {
        $DataBranch = DB::table('tb_mas_branches')
            ->where('tb_mas_branches.oid_branch', '=', $Branch->oid_branch)
            ->rightJoin('tb_mas_sbus', 'tb_mas_sbus.oid_sbu', '=', 'tb_mas_branches.oid_sbu')
            ->rightJoin('tb_mas_sub_holdings', 'tb_mas_sub_holdings.oid_subholding', '=', 'tb_mas_sbus.oid_subholding')
            ->rightJoin('tb_mas_holdings', 'tb_mas_holdings.oid_holding', '=', 'tb_mas_sub_holdings.oid_holding')
            ->select(
                'tb_mas_branches.id',
                'tb_mas_branches.usercreate',
                'tb_mas_branches.userupdate',
                'tb_mas_branches.userdelete',
                'tb_mas_branches.created_at',
                'tb_mas_branches.updated_at',
                'tb_mas_branches.address',
                'tb_mas_branches.email',
                'tb_mas_branches.phone',
                'tb_mas_branches.branch_name',
                'tb_mas_branches.oid_branch',
                'tb_mas_branches.ket',
                'tb_mas_sub_holdings.oid_subholding',
                'tb_mas_sub_holdings.subholding',
                'tb_mas_sbus.oid_sbu',
                'tb_mas_sbus.sbu_name',
                'tb_mas_holdings.oid_holding',
                'tb_mas_holdings.holding'
            )
            ->first();
        // return dd($DataBranch);
        $title = 'Branch';
        return view('branch.detailbranch', compact('title', 'DataBranch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBranch()
    {
        $dataSbu = DB::table('tb_mas_sbus')
            ->get();

        // return dd($dataSubHolding);
        return view('branch.createbranch', compact('dataSbu'));
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
            'sbu_name' => 'required',
            'branch_name' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'ket' => 'required'
        ]);
        $num = 0;
        if (BranchModel::all()->count() >= 9) {
            $num = '';
        }
        $count = BranchModel::all()->count();
        $inputbranch = array(
            'oid_branch' => 'BR-' . $num . $count + 1,
            'branch_name' => $request->branch_name,
            'oid_sbu' => $request->sbu_name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'ket' => $request->ket,
            'crud' => 'C',
            'usercreate' => 'ADZ',
            'userupdate' => 'null',
            'userdelete' => 'null',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        // return dd($inputsbu);
        BranchModel::create($inputbranch);
        return redirect('/branch');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BranchModel  $branchModel
     * @return \Illuminate\Http\Response
     */
    public function show(BranchModel $branchModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BranchModel  $branchModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BranchModel $Branch)
    {
        $DataBranchEdit = DB::table('tb_mas_branches')
            ->where('tb_mas_branches.oid_branch', '=', $Branch->oid_branch)
            ->rightJoin('tb_mas_sbus', 'tb_mas_sbus.oid_sbu', '=', 'tb_mas_branches.oid_sbu')
            ->select(
                'tb_mas_branches.id',
                'tb_mas_branches.oid_branch',
                'tb_mas_branches.branch_name',
                'tb_mas_branches.usercreate',
                'tb_mas_branches.userupdate',
                'tb_mas_branches.userdelete',
                'tb_mas_branches.created_at',
                'tb_mas_branches.updated_at',
                'tb_mas_branches.address',
                'tb_mas_branches.email',
                'tb_mas_branches.phone',
                'tb_mas_branches.ket',
                'tb_mas_branches.crud',
                'tb_mas_sbus.oid_sbu',
                'tb_mas_sbus.sbu_name',
            )->first();
        $SbuData = DB::table('tb_mas_sbus')->get();
        // return dd($SbuData);
        $title = 'Branch';
        return view('branch.editbranch', compact('title', 'DataBranchEdit', 'SbuData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BranchModel  $branchModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BranchModel $Branch)
    {
        $request->validate([
            'sbu_name' => 'required',
            'branch_name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'ket' => 'required'
        ]);
        $updatebranch = array(
            'oid_sbu' => $request->sbu_name,
            'branch_name' => $request->branch_name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'ket' => $request->ket,
            'crud' => 'U',
            'userupdate' => 'null',
            'updated_at' => date('Y-m-d H:i:s')
        );
        DB::table('tb_mas_branches')->where('oid_branch', $Branch->oid_branch)->update($updatebranch);
        return redirect('/branch');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BranchModel  $branchModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BranchModel $Branch)
    {
        $inputdelete = array(
            'crud' => 'D',
            'userdelete' => 'UserDelete01',
            'updated_at' => date('Y-m-d H:i:s')
        );
        BranchModel::where('oid_branch', $Branch->oid_branch)
            ->update($inputdelete);
        return redirect('/branch');
    }
}
