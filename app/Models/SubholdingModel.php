<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SubholdingModel extends Model
{
    use HasFactory;
    protected $table = 'tb_mas_sub_holdings';
    protected $guarded = ['id'];

    /* Function dibawah merupakan cara lain mengambil data ke database

        public function sbus(){
            $this->hasMany(Sbu::class, 'oid_subholding','oid_subholding');
        }
        public function subholding()
        {
            return DB::table('tb_mas_sub_holdings')
                ->leftJoin('tb_mas_holdings', 'tb_mas_holdings.oid_holding', '=', 'tb_mas_sub_holdings.oid_holding')
                ->get();
        }

    */
    /*function dibawah ini cara lain selain Models::all()
            public function index()
            {
                return DB::table('tb_mas_sub_holdings')
                    ->get();
            }
    */
    /* Function berikut merupakan cara menambahkan data ke database
        public function insert($datas)
        {
            DB::table('tb_mas_sub_holdings')->insert($datas);
        }
    */
}
