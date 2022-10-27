<?php

namespace App\Http\Controllers;

use App\Models\GroupModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function index()
    {
        $group = GroupModel::all();
        return view('group', [
            'title' => 'group',
            'group' => $group
        ]);
    }
}
