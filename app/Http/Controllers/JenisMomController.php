<?php

namespace App\Http\Controllers;

use App\Models\JenisMom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisMomController extends Controller
{
    public function index()
    {
        $jenismom = DB::table('tb_mas_mom_jenis')
            ->where('tb_mas_mom_jenis.crud', 'C')
            ->orWhere('tb_mas_mom_jenis.crud', 'U')
            ->get();

        return view('jenismom', [
            'jenismom' => $jenismom
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisMom  $jenismom
     * @return \Illuminate\Http\Response
     */
    public function show(JenisMom $jenisMom)
    {
        return view('momdetail.moremomdetail', []);
    }
}
