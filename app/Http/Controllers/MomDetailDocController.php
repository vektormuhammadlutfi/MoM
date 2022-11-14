<?php

namespace App\Http\Controllers;

use App\Models\MomDetailDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MomDetailDocController extends Controller
{
    public function index() {
        $doc_detail_mom = MomDetailDoc::where('tb_trans_doc_details.crud', 'C')
            ->orWhere('tb_trans_doc_details.crud', 'U')
            ->get();
        // dd($description);
        return view('momdetaildoc', [
            'title' => 'Mom Detail Documentation',
            'doc_detail_mom' => $doc_detail_mom
        ]);
    }
}
