<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use View;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{
     public function index()
    {
        $Branches = Branch::all();
        // return dd($Branches);
        return view('branch.branch', compact('Branches'));
        // return view('branch.branch', ['Data' => $Branches]);
    }
    public function detailBranch(Branch $Branch)
    {
        $Sbu = DB::table('tb_mas_branches')
        ->where('tb_mas_branches.id', '=', $Branch->id)
        ->rightJoin('tb_mas_sbus', 'tb_mas_sbus.oid_sbu', '=', 'tb_mas_branches.oid_sbu')
        ->rightJoin('tb_mas_sub_holdings', 'tb_mas_sub_holdings.oid_subholding', '=', 'tb_mas_sbus.oid_subholding')
        ->rightJoin('tb_mas_holdings', 'tb_mas_holdings.oid_holding', '=', 'tb_mas_sub_holdings.oid_holding')
        ->select(
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
            'tb_mas_holdings.holding')
        ->first();
        // ->get();
        // return dd($Sbu);
        return view('branch.detailbranch', ['datas'=> $Sbu]);
    }
//create
    public function createbranch(){
        $dataSubHolding = DB::table('tb_mas_sub_holdings')
        ->get();
        $dataSbu = DB::table('tb_mas_sbus')
        ->get();
        $holding = DB::table('tb_mas_holdings')
        ->select('holding')
        ->first();

        // return dd($holding);
        return view('branch.createbranch',[
            'SubHolding' => $dataSubHolding,
            'Sbu' => $dataSbu,
            'holding'=>$holding,
        ]);

    }

    public function storedata(Request $request){
        $validatedData = $request -> validate ([
            'branch' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'ket' => 'required',
            'oid_sbu'=>'required'
        ]);


        return redirect()->route('branch.branch');

    //     UserData

    //    $this->BranchModel = new Branch;
    //    $this->BranchModel->insert([
    //         'branch_name' => $validatedData->branch_name,
    //         'address' => $validatedData->address,
    //         'email' => $validatedData->email,
    //         'phone' => $validatedData->phone,
    //         'ket' => $validatedData->ket,
    //         'oid_sbu'=>$validatedData->oid_sbu,

    //    ]);


        // Branch::create($validatedData);
        // post::createBranch($validatedData);
        // return redirect('/branch.branch');

        // return dd($validatedData);
    }


}
