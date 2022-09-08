<?php

namespace App\Http\Controllers;

use app\Models\JenisMom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisMomController extends Controller
{
    public function jenismom()
    {
        $jenismom = DB::table('tb_mas_mom_jenis')->get();
        // $jenismom = JenisMom::all();
        return view('jenismom', [
            'jenismom' => $jenismom
        ]);
    }
}
