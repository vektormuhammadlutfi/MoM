<?php

namespace App\Http\Controllers;

use App\Models\BranchModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{
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
    
    public function create()
    {
        $dataSbu = DB::table('tb_mas_sbus')
            ->get();

        // return dd($dataSubHolding);
        $title = 'Branch';
        return view('branch.createbranch', compact('title', 'dataSbu'));
    }
    
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

        //men-generate angka pada oid
        $max_id = DB::table('tb_mas_branches')->max('id');
        $newId = (int) $max_id + 1;
        $num = '0';
        if ($newId >= 9) {
            $num = '';
        }
        $oid = 'BR-' . $num . $newId;

        $inputbranch = array(
            'oid_branch' => $oid,
            'branch_name' => $request->branch_name,
            'oid_sbu' => $request->sbu_name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'ket' => $request->ket,
            'crud' => 'C',
            'usercreate' => Auth::user()->username,
            'userupdate' => null,
            'userdelete' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        // return dd($inputsbu);
        BranchModel::create($inputbranch);
        return redirect('/branch');
    }
    
    public function show(BranchModel $Branch)
    {
        $DataBranch = DB::table('tb_mas_branches')
            ->where('tb_mas_branches.oid_branch', '=', $Branch->oid_branch)
            ->rightJoin('tb_mas_sbus', 'tb_mas_sbus.oid_sbu', '=', 'tb_mas_branches.oid_sbu')
            ->rightJoin('tb_mas_sub_holdings', 'tb_mas_sub_holdings.oid_subholding', '=', 'tb_mas_sbus.oid_subholding')
            ->rightJoin('tb_mas_holdings', 'tb_mas_holdings.oid_holding', '=', 'tb_mas_sub_holdings.oid_holding')
            ->first();

        $title = 'Branch';
        return view('branch.detailbranch', compact('title', 'DataBranch'));
    }
    
    public function edit(BranchModel $Branch)
    {
        $DataBranchEdit = DB::table('tb_mas_branches')
            ->where('tb_mas_branches.oid_branch', '=', $Branch->oid_branch)
            ->rightJoin('tb_mas_sbus', 'tb_mas_sbus.oid_sbu', '=', 'tb_mas_branches.oid_sbu')
            ->first();
        $SbuData = DB::table('tb_mas_sbus')->get();
        $title = 'Branch';
        return view('branch.editbranch', compact('title', 'DataBranchEdit', 'SbuData'));
    }
    
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
            'userupdate' => Auth::user()->username,
            'updated_at' => date('Y-m-d H:i:s')
        );
        DB::table('tb_mas_branches')->where('oid_branch', $Branch->oid_branch)->update($updatebranch);
        return redirect('/branch');
    }

    public function destroy(BranchModel $Branch)
    {
        $inputdelete = array(
            'crud' => 'D',
            'userdelete' => Auth::user()->username,
            'updated_at' => date('Y-m-d H:i:s')
        );
        BranchModel::where('oid_branch', $Branch->oid_branch)
            ->update($inputdelete);
        return redirect('/branch');
    }
}
