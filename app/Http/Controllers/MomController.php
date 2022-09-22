<?php

namespace App\Http\Controllers;

use App\Models\Detailmom;
use App\Models\Documentation;
use App\Models\JenisMom;
use App\Models\Mom;
use App\Models\SbuModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $moms = DB::table('tb_trans_moms')
            ->where('tb_trans_moms.crud', 'U')
            ->orWhere('tb_trans_moms.crud', 'C')
            ->leftJoin('tb_mas_sbus', 'tb_trans_moms.oid_sbu', '=', 'tb_mas_sbus.oid_sbu')
            ->leftJoin('tb_mas_mom_jenis', 'tb_trans_moms.oid_jen_mom', '=', 'tb_mas_mom_jenis.oid_jen_mom')
            ->get();
        return view('mom.mom', [
            'title' => 'Mom',
            'moms' => $moms
        ]);
        // return dd($moms);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sbu = SbuModel::getAll();
        $jenisMom  = JenisMom::getAll();
        return view('mom.createmom', [
            'title' => 'Mom',
            'dataSbu' => $sbu,
            'dataJenisMom' => $jenisMom
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //memvalidasi request yang diterima
        $request->validate([
            'oid_sbu' => 'required',
            'oid_jen_mom' => 'required',
            'tanggal' => 'required',
            'tempat' => 'required',
            'notulen' => 'required',
            'attendees' => 'required',
        ]);

        //men-generate angka pada oid
        $max_id = DB::table('tb_trans_moms')->max('id');
        $newId = (int) $max_id + 1;
        $num = '0';
        if ($newId >= 9) {
            $num = '';
        }
        $oid = 'MOM-' . $num . $newId;

        //hari
        $timestamp = strtotime($request->tanggal);
        $dayNum = date('w', $timestamp);
        $day = '';
        switch ($dayNum) {
            case 0:
                $day = 'Minggu';
                break;
            case 1:
                $day = 'Senin';
                break;
            case 2:
                $day = 'Selasa';
                break;
            case 3:
                $day = 'Rabu';
                break;
            case 4:
                $day = 'Kamis';
                break;
            case 5:
                $day = 'Jumat';
                break;
            case 6:
                $day = 'Sabtu';
                break;
        }

        //membuat data baru ke database
        Mom::create([
            'oid_mom' => $oid,
            'oid_sbu' => $request->oid_sbu,
            'oid_jen_mom' => $request->oid_jen_mom,
            'agenda' => $request->agenda,
            'hari' => $day,
            'tgl_mom' => $request->tanggal,
            'tempat' => $request->tempat,
            'notulen' => $request->notulen,
            'attendees' => $request->attendees,
            'crud' => 'C',
            'usercreate' => Auth::user()->name,
            'userupdate' => null,
            'userdelete' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        //mengembalikan halaman ke /mom
        return redirect('/mom');
        // return dd($request->oid_sbu);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Mom $mom
     * @return \Illuminate\Http\Response
     */
    public function show(Mom $mom)
    {
        //hanya mengambil data mom yang berelasi dengan SBU dan Jenis Mom
        $momData = DB::table('tb_trans_moms')
            ->where('tb_trans_moms.oid_mom', '=', $mom->oid_mom)
            ->leftJoin('tb_mas_sbus', 'tb_trans_moms.oid_sbu', '=', 'tb_mas_sbus.oid_sbu')
            ->leftJoin('tb_mas_mom_jenis', 'tb_trans_moms.oid_jen_mom', '=', 'tb_mas_mom_jenis.oid_jen_mom')
            ->get()->first();
        //mengambil data mom detail
        $detailMom = DB::table('tb_trans_mom_details')
            ->where('tb_trans_mom_details.oid_mom', '=', $mom->oid_mom)
            ->where(function ($query) {
                $query->where('tb_trans_mom_details.crud', '=', 'C')
                    ->orWhere('tb_trans_mom_details.crud', '=', 'U');
            })->get();
        // ->where('tb_trans_mom_details.oid_mom', '=', $mom->oid_mom)
        // ->whereIn('tb_trans_mom_details.crud', '=', ['C', 'U'])
        // ->get();

        return view('mom.detailmom', [
            'title' => 'Mom',
            'mom' => $momData,
            'detailMom' => $detailMom
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Mom $mom
     * @return \Illuminate\Http\Response
     */
    public function edit(Mom $mom)
    {
        $momdata
            = DB::table('tb_trans_moms')
            ->where('tb_trans_moms.oid_mom', '=', $mom->oid_mom)
            ->leftJoin('tb_mas_sbus', 'tb_trans_moms.oid_sbu', '=', 'tb_mas_sbus.oid_sbu')
            ->leftJoin('tb_mas_mom_jenis', 'tb_trans_moms.oid_jen_mom', '=', 'tb_mas_mom_jenis.oid_jen_mom')
            ->get()
            ->first();

        $sbuData = SbuModel::getAll();
        $jenisMom = JenisMom::getAll();
        return view('mom.editmom', [
            'title' => 'Mom',
            'dataMomEdit' => $momdata,
            'sbuData' => $sbuData,
            'jenisMom' => $jenisMom
        ]);
        // return dd($momdata);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Mom $mom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mom $mom)
    {
        $request->validate([
            'oid_sbu' => 'required',
            'oid_jen_mom' => 'required',
            'agenda' => 'required',
            'tempat' => 'required',
            'notulen' => 'required',
            'attendees' => 'required',
            'tgl_mom' => 'required'
        ]);
        //generator hari
        $timestamp = strtotime($request->tgl_mom);
        $dayNum = date(
            'w',
            $timestamp
        );
        $day = '';
        switch ($dayNum) {
            case 0:
                $day = 'Minggu';
                break;
            case 1:
                $day = 'Senin';
                break;
            case 2:
                $day = 'Selasa';
                break;
            case 3:
                $day = 'Rabu';
                break;
            case 4:
                $day = 'Kamis';
                break;
            case 5:
                $day = 'Jumat';
                break;
            case 6:
                $day = 'Sabtu';
                break;
        }
        $updateMom = [
            'oid_sbu' => $request->oid_sbu,
            'oid_jen_mom' => $request->oid_jen_mom,
            'agenda' => $request->agenda,
            'tempat' => $request->tempat,
            'notulen' => $request->notulen,
            'attendees' => $request->attendees,
            'hari' => $day,
            'tgl_mom' => $request->tgl_mom,
            'crud' => 'U',
            'userupdate' => Auth::user()->name,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        // return dd($mom);
        DB::table('tb_trans_moms')->where('oid_mom', $mom->oid_mom)->update($updateMom);
        return redirect('/mom');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Mom $mom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mom $mom)
    {
        $update = array(
            'crud' => 'D',
            'userupdate' => 'Update-02',
            'userdelete' => Auth::user()->name,
            'updated_at' => date('Y-m-d H:i:s')
        );

        // Update Table Mom =============================
        Mom::where('oid_mom', $mom->oid_mom)
            ->update($update);

        // Update Table Mom Details =============================
        Detailmom::where('oid_mom', $mom->oid_mom)
            ->update($update);

        // Update Table Documnetations =============================
        Documentation::where('oid_mom', $mom->oid_mom)
            ->update($update);

        return redirect('/mom');
    }

    public function addDetail(Mom $mom)
    {
        // return dd($mom);
        return view('mom.addDetail', [
            'title' => 'mom',
            'mom' => $mom
        ]);
    }
    public function storeDetail(Request $request, Mom $mom)
    {
        // dd($request->file('dokumen')->getClientOriginalName());
        $request->validate([
            'highlight_issues' => 'required',
            'due_date_info' => 'required',
            'pic' => 'required',
            'informasi' => 'required',
            'dokumen' => 'required',
        ]);

        // //update mom
        // $updatemom = [
        //     'tgl_mulai' => $request->tanggalmulai,
        //     'crud' => 'U',
        //     'userupdate' => null,
        //     'updated_at' => date('Y-m-d H:i:s'),
        // ];
        // //update di trans moms
        // DB::table('tb_trans_moms')->where('oid_mom', $mom->oid_mom)->update($updatemom);

        //create detail mom
        //men-generate angka pada oid
        $max_id = DB::table('tb_trans_mom_details')->max('id');
        $newId = (int) $max_id + 1;
        $num = '0';
        if (
            $newId >= 9
        ) {
            $num = '';
        }
        $oid = 'MD-' . $num . $newId;

        //kirim data
        Detailmom::create([
            'oid_high_issues' => $oid,
            'oid_mom' => $mom->oid_mom,
            'highlight_issues' => $request->highlight_issues,
            'due_date_info' => $request->due_date_info,
            'pic' => $request->pic,
            'informasi' => $request->informasi,
            'crud' => 'C',
            'sts_issue' => 'Open',
            'ket' => '-',
            'usercreate' => Auth::user()->name,
            'userupdate' => null,
            'userdelete' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        //create documentation
        //men-generate oid documentation
        $max_id = DB::table('tb_trans_documentations')->max('id');
        $newId = (int) $max_id + 1;
        $numDoc = '0';
        if (
            $newId >= 9
        ) {
            $numDoc = '';
        }
        $oid_Doc = 'DOC-' . $numDoc . $newId;

        //kirim data (file)
        $nameDoc = str_replace('dok-image/', '', $request->file('dokumen')->store('dok-image'));
        $originalName = $request->file('dokumen')->getClientOriginalName();

        Documentation::create([
            'oid_document' => $oid_Doc,
            'oid_mom' => $mom->oid_mom,
            'dokumen' => $originalName,
            'gambar' => $nameDoc,
            'crud' => 'C',
            'usercreate' => Auth::user()->name,
            'userupdate' => null,
            'userdelete' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect('/mom' . '/' . $mom->oid_mom);
    }
}
