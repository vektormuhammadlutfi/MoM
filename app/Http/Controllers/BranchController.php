<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use View;

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
        // $Branches = Branch::all();
        // return dd('branch.detailbranch', compact('Branch'));
        return view('branch.detailbranch', compact('Branch'));
    }
    
}
