<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subholding extends Model
{
    use HasFactory;
    protected $table = 'tb_mas_sub_holdings';
    protected $guarded = ['id'];

    // public function sbus(){
    //     $this->hasMany(Sbu::class, 'oid_subholding','oid_subholding');
    // }
}
