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
            ->get();
        // dd($description);
        return view('momdescription', [
            'title' => 'Mom Documentation',
            'description' => $description
        ]);
    }

    //Documen
}
