<?php

namespace App\Http\Controllers;

use App\Models\SubholdingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $subholding =
            DB::table('tb_mas_sub_holdings')
            ->where('tb_mas_sub_holdings.crud', 'C')
            ->orWhere('tb_mas_sub_holdings.crud', 'U')
            ->leftJoin('tb_mas_holdings', 'tb_mas_holdings.oid_holding', '=', 'tb_mas_sub_holdings.oid_holding')
            ->get();
        $holdings = DB::table('tb_mas_holdings')->get();
        $title = "Sub Holding";
        return view('subholding', compact('title', 'subholding', 'holdings'));
    }
    
    public function store(Request $request)
    {

        //memvalidasi request yang diterima
        $request->validate([
            'subholding' => 'required',
            'oid_holding' => 'required'
        ]);

        //men-generate angka pada oid
        $max_id = DB::table('tb_mas_sub_holdings')->max('id');
        $newId = (int) $max_id + 1;
        $num = '0';
        if ($newId >= 9) {
            $num = '';
        }
        $oid = 'SH-' . $num . $newId;

        //membuat data baru ke database
        SubholdingModel::create([
            'oid_subholding' => $oid,
            'subholding' => $request->subholding,
            'oid_holding' => $request->oid_holding,
            'crud' => 'C',
            'usercreate' => Auth::user()->username,
            'userupdate' => null,
            'userdelete' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        //mengembalikan halaman ke /subholding
        return redirect('/subholding');
    }
    
    public function update(Request $request, SubholdingModel $subholding)
    {
        $validatedData = $request->validate([
            'subholding' => 'required',
            'oid_holding' => 'required',
        ]);

        $inputSubholding = array(
            'subholding' => $validatedData['subholding'],
            'oid_holding' => $validatedData['oid_holding'],
            'crud' => 'U',
            'userupdate' => Auth::user()->username,
            'updated_at' => date('Y-m-d H:i:s')
        );
        // return dd($inputSubholding);
        SubholdingModel::where('oid_subholding', $subholding->oid_subholding)
            ->update($inputSubholding);
        return redirect('/subholding');
        // return dd($inputSubholding);
    }

    public function destroy(SubholdingModel $subholding)
    {
        $newSubholding = array(
            'crud' => 'D',
            'userdelete' => Auth::user()->username,
            'updated_at' => date('Y-m-d H:i:s')
        );
        // return dd($subholding);
        SubholdingModel::where('oid_subholding', $subholding->oid_subholding)
            ->update($newSubholding);
        return redirect('/subholding');
    }
}
