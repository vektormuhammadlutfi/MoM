<?php

namespace App\Http\Controllers;

use App\Models\Detailmom;
use App\Models\Documentation;
use App\Models\JenisMom;
use App\Models\Mom;
use App\Models\SbuModel;
use Illuminate\Http\Request;
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
        $num = '0';
        if (count(Mom::all()) >= 9) {
            $num = '';
        }
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
            'oid_mom' => 'MOM-' . $num . (count(Mom::all()) + 1),
            'oid_sbu' => $request->oid_sbu,
            'oid_jen_mom' => $request->oid_jen_mom,
            'agenda' => $request->agenda,
            'hari' => $day,
            'tgl_mom' => $request->tanggal,
            'tempat' => $request->tempat,
            'notulen' => $request->notulen,
            'attendees' => $request->attendees,
            'crud' => 'C',
            'usercreate' => 'ADZ',
            'userupdate' => null,
            'userdelete' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        //mengembalikan halaman ke /subholding
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
        $mom = DB::table('tb_trans_moms')
            ->where('tb_trans_moms.oid_mom', '=', $mom->oid_mom)
            ->leftJoin('tb_mas_sbus', 'tb_trans_moms.oid_sbu', '=', 'tb_mas_sbus.oid_sbu')
            ->leftJoin('tb_mas_mom_jenis', 'tb_trans_moms.oid_jen_mom', '=', 'tb_mas_mom_jenis.oid_jen_mom')
            ->get()->first();
        // return dd($mom);
        return view('mom.detailmom', [
            'title' => 'Mom',
            'mom' => $mom
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
            ->select(
                'tb_trans_moms.id',
                'tb_trans_moms.oid_mom',
                'tb_trans_moms.oid_sbu',
                'tb_trans_moms.oid_jen_mom',
                'tb_trans_moms.agenda',
                'tb_trans_moms.tgl_mom',
                'tb_trans_moms.crud',
                'tb_mas_sbus.sbu_name',
                'tb_mas_mom_jenis.jenis_mom',
            )
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
            'hari' => $day,
            'tgl_mom' => $request->tgl_mom,
            'crud' => 'U'
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
        $newMom = array(
            'crud' => 'D',
            'userupdate' => 'Update-02',
            'updated_at' => date('Y-m-d H:i:s')
        );
        // return dd($mom);
        Mom::where('oid_mom', $mom->oid_mom)
            ->update($newMom);
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
        $request->validate([
            'tanggalmulai' => 'required',
            'highlight_issues' => 'required',
            'due_date_info' => 'required',
            'pic' => 'required',
            'informasi' => 'required',
            'dokumen' => 'required',
        ]);
        //update mom
        $updatemom = [
            'tgl_mulai' => $request->tanggalmulai,
            'crud' => 'U',
            'userupdate' => null,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        //update di trans moms
        DB::table('tb_trans_moms')->where('oid_mom', $mom->oid_mom)->update($updatemom);

        //create detail mom
        //men-generate angka pada oid
        $detailMom = Detailmom::all(); //data di database detail moms
        $num = '0';
        if (count($detailMom) >= 9) {
            $num = '';
        }
        //kirim data
        Detailmom::create([
            'oid_high_issues' => 'MD-' . $num . (count($detailMom) + 1),
            'oid_mom' => $mom->oid_mom,
            'highlight_issues' => $request->highlight_issues,
            'due_date_info' => $request->due_date_info,
            'pic' => $request->pic,
            'informasi' => $request->informasi,
            'crud' => 'C',
            'usercreate' => 'ADZ',
            'userupdate' => null,
            'userdelete' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        //create documentation
        //men-generate oid documentation
        $countDoc = count(Documentation::all());
        $numDoc = '0';
        if ($countDoc >= 9) {
            $numDoc = '';
        }
        //kirim data
        Documentation::create([
            'oid_document' => 'DOC-' . $numDoc . ($countDoc + 1),
            'oid_mom' => $mom->oid_mom,
            'crud' => 'C',
            'usercreate' => 'user1',
            'userupdate' => null,
            'userdelete' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('/mom');
    }
}
