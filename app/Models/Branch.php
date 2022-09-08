<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Branch extends Model
{
    use HasFactory;
    protected $table = 'tb_mas_branches';
    protected $guarded = ['id'];
    // protected $fillable = ['oid_branch', 'oid_sbu', 'usercreate','userupdate','userdelete','created_at','updated_at', 'branch_name', "address", 'email', 'phone', 'ket'];

    // public function insert($datas){
    //    DB::table('tb_mas_branches')->insert($datas);

    // }
}
