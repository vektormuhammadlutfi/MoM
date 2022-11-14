<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MomDetailDoc extends Model
{
    use HasFactory;
    protected $table = 'tb_trans_doc_details';
    protected $guarded = ['id'];
}
