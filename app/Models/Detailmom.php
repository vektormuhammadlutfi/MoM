<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Detailmom extends Model
{
    use HasFactory;
    protected $table = 'tb_trans_mom_details';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'oid_high_issues';
    }
    public static function getAll()
    {
        $datas = DB::table('tb_trans_mom_details')
            ->where('tb_trans_mom_details.crud', '=', 'C')
            ->orWhere('tb_trans_mom_details.crud', '=', 'U')
            ->get();
        return $datas;
    }
}
