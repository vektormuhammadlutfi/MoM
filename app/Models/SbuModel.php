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
    // protected $fillable = [''];
    // protected $with=['subholding'];

    // public function subHolding(){
    //     $this->belongsTo(Subholding::class,'oid_subholding','oid_subholding');
    // }
    public function Sbu()
    {
        return DB::table('tb_mas_sbus')
            ->leftJoin('tb_mas_sub_holdings', 'tb_mas_sub_holdings.oid_subholding', '=', 'tb_mas_sbus.oid_subholding')
            ->get();
    }
}
