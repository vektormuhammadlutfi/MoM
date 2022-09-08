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

}
