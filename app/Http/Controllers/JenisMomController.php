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

        // return view('jenismom');
        return view('jenismom.jenismom', compact('jenismom'));
    }

    public function create()
    {
       //
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_mom' => 'required'
        ]);
        $num = 0;
        if  (JenisMom::all()->count() >=9 ){
            $num = "";
        };
        $count = JenisMom::all()->count();
        $inputjenismom = array(
            'oid_jen_mom' => 'JM' . '-' . $num . $count + 1,
            'jenis_mom' => $request->jenis_mom,
            'crud' => 'C',
            'usercreate' => 'Administrator',
            'userupdate' => 'Administrator',
            'userdelete' => 'Administrator',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        // return dd($inputjenismom);
        JenisMom::create($inputjenismom);
        return redirect('/jenismom');
    }

    public function update(Request $request, JenisMom $jenismom){
        $request->validate([
            'jenis_mom' => 'required'
        ]);
        $inputjenismom = array(
            'jenis_mom' => $request->jenis_mom,
            'crud' => 'U',
            'userupdate' => 'Update-02',
            'updated_at' => date('Y-m-d H:i:s')
        );
        // return dd($inputjenismom);
        JenisMom::where('oid_jen_mom', $jenismom->oid_jen_mom)->update($inputjenismom);
        return redirect('/jenismom');
    }
    public function destroy(JenisMom $jenismom)
    {
        $statusdelete = array(
            'crud' => 'D',
            'userupdate' => 'Delete-2',
            'updated_at' => date('Y-m-d H:i:s')
        );
        // return dd($statusdelete);
        JenisMom::where('oid_jen_mom', $jenismom->oid_jen_mom)
        ->update($statusdelete);
        return redirect('/jenismom');
    }
}
