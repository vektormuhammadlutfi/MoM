<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mom extends Model
{
    use HasFactory;
    protected $table = 'tb_trans_moms';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'oid_mom';
    }
}
