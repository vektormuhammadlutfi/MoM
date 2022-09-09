<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisMom extends Model
{
    use HasFactory;

    protected $table = 'tb_mas_mom_jenis';
    protected $guarded = ['id'];
    public function getRouteKeyName()
    {
        return 'oid_jen_mom';
    }
}
