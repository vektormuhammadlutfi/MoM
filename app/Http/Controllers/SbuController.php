?php

namespace App\Http\Controllers;

use App\Models\Sbu;
use Illuminate\Http\Request;

class SbuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function index()
    {
        $dataSbu = DB::table('tb_mas_sbus')
            ->Join('tb_mas_sub_holdings', 'tb_mas_sub_holdings.oid_subholding', '=', 'tb_mas_sbus.oid_subholding')
            ->where('tb_mas_sbus.crud', '=', 'C')
            ->orWhere('tb_mas_sbus.crud', '=', 'U')
            ->get();

        $datasubholding = DB::table('tb_mas_sub_holdings')
            ->get();

        // return view('sbu', compact('dataSbu', 'datasubholding'));
        return view('sbu', ['dataSbu' => $dataSbu, 'datasubholding' => $datasubholding]);
    }

    // public function sbu()
    // {
    //     $dataSbu = DB::table('tb_mas_sbus')
    //         ->Join('tb_mas_sub_holdings', 'tb_mas_sub_holdings.oid_subholding', '=', 'tb_mas_sbus.oid_subholding')
    //         ->get();

    //     $datasubholding = DB::table('tb_mas_sub_holdings')
    //         ->get();

    //     // return view('sbu', compact('dataSbu', 'datasubholding'));
    //     return view('sbu', ['dataSbu' => $dataSbu, 'datasubholding' => $datasubholding]);
    // }

=======
    // public function index()
    // {

    // }
    public function sbu()
    {
        $dataSbu = Sbu::all();
        return view('sbu', compact('dataSbu'));
    }
>>>>>>> a50066e8be0fb42c33730c96491eabc7d86ebf62

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namesbu' => 'required',
            'namesubholding' => 'required'
        ]);
<<<<<<< HEAD
        $count = SbuModel::all()->count();;
        $oid_sbu = 'SBU' . '-' . $count + 1;

        $inputsbu = array(
            'oid_sbu' => $oid_sbu,
            'oid_subholding' => $validatedData['subholding'],
            'sbu_name' => $validatedData['sbu_name'],
            'crud' => 'C',
            'usercreate' => 'ADZ',
            'userupdate' => 'null',
            'userdelete' => 'null',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        // return dd($inputsbu);
        SbuModel::create($inputsbu);
=======
        $inputsbu = $request->all();
        Sbu::create($inputsbu);
>>>>>>> a50066e8be0fb42c33730c96491eabc7d86ebf62
        return redirect('/sbu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sbu  $sbu
     * @return \Illuminate\Http\Response
     */
    public function show(Sbu $sbu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sbu  $sbu
     * @return \Illuminate\Http\Response
     */
    public function edit(Sbu $sbu)
    {
<<<<<<< HEAD
=======
        //
>>>>>>> a50066e8be0fb42c33730c96491eabc7d86ebf62
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sbu  $sbu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sbu $sbu)
    {
<<<<<<< HEAD
        $validatedData = $request->validate([
            'sbu_name' => 'required',
            'subholding' => 'required',
        ]);

        $inputsbu = array(
            'sbu_name' => $validatedData['sbu_name'],
            'oid_subholding' => $validatedData['subholding'],
            'crud' => 'U',
            'userupdate' => 'Update-02',
            'updated_at' => date('Y-m-d H:i:s')
        );
        // return dd($inputsbu);
        SbuModel::where('oid_sbu', $sbu->oid_sbu)
            ->update($inputsbu);
        return redirect('/sbu');
=======
        //
>>>>>>> a50066e8be0fb42c33730c96491eabc7d86ebf62
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sbu  $sbu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sbu $sbu)
    {
        $inputsbu = array(
            'crud' => 'D',
            'userdelete' => 'delete-02',
            'updated_at' => date('Y-m-d H:i:s')
        );
        // return dd($inputsbu);
        SbuModel::where('oid_sbu', $sbu->oid_sbu)
            ->update($inputsbu);
        return redirect('/sbu');
    }
}
