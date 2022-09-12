<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JenisMom extends Model
{
    use HasFactory;

    protected $table = 'tb_mas_mom_jenis';
    protected $guarded = ['id'];
    public function getRouteKeyName()
    {
        return 'oid_jen_mom';
    }

    public static function getAll()
    {
        $datas = DB::table('tb_mas_mom_jenis')
            ->where('tb_mas_mom_jenis.crud', 'C')
            ->orWhere('tb_mas_mom_jenis.crud', 'U')
            ->get();
        return $datas;
    }
}
