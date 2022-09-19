<?php

namespace App\Http\Controllers;

use App\Models\Documentation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MomdescriptionController extends Controller
{
    public function index()
    {
        $description = DB::table('tb_trans_documentations')
            ->where('tb_trans_documentations.crud', 'C')
            ->orWhere('tb_trans_documentations.crud', 'U')
            // ->orderBy('tb_trans_documentations.oid_mom')
            ->get();
        // dd($description);
        return view('momdescription', [
            'title' => 'Mom Description',
            'description' => $description
        ]);
    }

    //Documen
}
