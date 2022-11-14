<?php

namespace App\Http\Controllers;

use App\Models\SbuModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SbuController extends Controller
{
    public function index()
    {
        $dataSbu = SbuModel::Join('tb_mas_sub_holdings', 'tb_mas_sub_holdings.oid_subholding', '=', 'tb_mas_sbus.oid_subholding')
            ->where('tb_mas_sbus.crud', '=', 'C')
            ->orWhere('tb_mas_sbus.crud', '=', 'U')
            ->get();
        // dd($dataSbu);
        $datasubholding = DB::table('tb_mas_sub_holdings')
            ->where('tb_mas_sub_holdings.crud', '=', 'C')
            ->orWhere('tb_mas_sub_holdings.crud', '=', 'U')
            ->get();
        $title = 'SBU';
        return view('sbu', compact('title', 'dataSbu', 'datasubholding'));
    }
    
    public function store(Request $request)
    {
        // return dd($request);

        $request->validate([
            'sbu_name' => 'required',
            'oid_subholding' => 'required',
        ]);

        //men-generate angka pada oid
        $max_id = DB::table('tb_mas_sbus')->max('id');
        $newId = (int) $max_id + 1;
        $num = '0';
        if ($newId >= 9) {
            $num = '';
        }
        $oid = 'SBU-' . $num . $newId;


        SbuModel::create([
            'oid_sbu' => $oid,
            'oid_subholding' => $request['oid_subholding'],
            'sbu_name' => $request['sbu_name'],
            'crud' => 'C',
            'usercreate' => Auth::user()->username,
            'userupdate' => null,
            'userdelete' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect('/sbu');
    }
    
    public function update(Request $request, SbuModel $sbu)
    {
        $validatedData = $request->validate([
            'sbu_name' => 'required',
            'subholding' => 'required',
        ]);

        $inputsbu = array(
            'sbu_name' => $validatedData['sbu_name'],
            'oid_subholding' => $validatedData['subholding'],
            'crud' => 'U',
            'userupdate' => Auth::user()->username,
            'updated_at' => date('Y-m-d H:i:s')
        );
        // return dd($inputsbu);
        SbuModel::where('oid_sbu', $sbu->oid_sbu)
            ->update($inputsbu);
        return redirect('/sbu');
    }
    
    public function destroy(SbuModel $sbu)
    {
        $inputsbu = array(
            'crud' => 'D',
            'userdelete' => Auth::user()->username,
            'updated_at' => date('Y-m-d H:i:s')
        );
        // return dd($inputsbu);
        SbuModel::where('oid_sbu', $sbu->oid_sbu)
            ->update($inputsbu);
        return redirect('/sbu');
    }
}
