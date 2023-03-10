<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SbuModel extends Model
{
    use HasFactory;
    protected $table = 'tb_mas_sbus';
    protected $guarded = ['id'];
    // protected $fillable = ['id', 'sbu_name', 'oid_sbu', 'oid_subholding', 'crud', 'usercreate', 'userupdate', 'userdelete', 'created_at', 'updated_at',];

    public function getRouteKeyName()
    {
        return 'oid_sbu';
    }
    public static function getAll()
    {
        $sbuData = DB::table('tb_mas_sbus')
            ->where('tb_mas_sbus.crud', 'C')
            ->orWhere('tb_mas_sbus.crud', 'U')
            ->get();
        return $sbuData;
    }
}
