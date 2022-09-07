<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Subholding extends Model
{
    use HasFactory;
    protected $table = 'tb_mas_sub_holdings';
    protected $primaryKey = ['id'];
    // protected $fillable = [
    //     'id', 'nama',
    // ];
    // public function sbus(){
    //     $this->hasMany(Sbu::class, 'oid_subholding','oid_subholding');
    // }
    public function subholding()
    {
        return DB::table('tb_mas_sub_holdings')
            ->leftJoin('tb_mas_holdings', 'tb_mas_holdings.oid_holding', '=', 'tb_mas_sub_holdings.oid_holding')
            ->get();
    }
    public function index()
    {
        return DB::table('tb_mas_sub_holdings')
            ->get();
    }

    public function insert($datas)
    {
        DB::table('tb_mas_sub_holdings')->insert($datas);
    }
    public function drop($id)
    {
        // DB::table('tb_mas_sub_holdings')->delete($id);
        // DB::delete('DELETE FROM tb_mas_sub_holdings WHERE id = ' . $id);
    }
}
