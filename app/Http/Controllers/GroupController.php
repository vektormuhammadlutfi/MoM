<?php

namespace App\Http\Controllers;

use App\Models\GroupModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $group = GroupModel::all();
        // $group = DB::table('user_menu')->get();
        // dd($group);
        return view('group.group', [
            'title' => 'group',
            'group' => $group
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserMenuModel  $userMenuModel
     * @return \Illuminate\Http\Response
     */
    public function show(GroupModel $groupModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserMenuModel  $userMenuModel
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupModel $groupModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserMenuModel  $userMenuModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroupModel $groupModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserMenuModel  $userMenuModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupModel $groupModel)
    {
        //
    }
}
