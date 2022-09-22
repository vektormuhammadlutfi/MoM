<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index()
    {
        $usergroupinput = array(
            'sysdev' => 'sysdev',
            'admin' => 'admin',
            'report' => 'report'
        );
        $users = DB::table('users')
        ->where('users.usergroup', '=', 'admin')
        ->orWhere('users.usergroup', '=', 'report')
        ->orWhere('users.usergroup', '=', null)
        ->get();
        // dd($usergroupinput['item']);
        return view('user.user', [
            'title' => 'User',
            'users' => $users,
            'usergroupinput' => $usergroupinput
        ]);
    }
    public function detailuser(User $User)
    {
        $dataUser = DB::table('users')
        ->where('users.oid_user', '=', $User->oid_user )
        ->first();
        // $usergroupinput = [
        //     'admin' => 'admin',
        //     'record' => 'record',
        //     'sysdev' => 'sysdev'
        // ];
      
        // return dd($dataUser);
        return view('user.detailuser', [
            'title' => 'User',
            'detailuser' => $dataUser
        ]);
    }
    public function create()
    {
        return view('user.adduser', [
            'title' => 'User'
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3|max:20|unique:users',
            'email' => 'required|email',
            'hp' => 'max:15',
            'password' => 'min:5|max:30|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required'
        ]);

        $kode = DB::table('users')->max('id');
    	$addNol = '';
    	$incrementKode = (int) $kode + 1;

    	if (strlen($incrementKode) == 1) {
    		$addNol = "0";
    	}
    	$kodeBaru = "U-".$addNol.$incrementKode;

        $validateData = [
            'oid_user' => $kodeBaru,
            'username' => $request->username,
            'email' => $request->email,
            'telp' => $request->hp,
            'password' => $request->password,
        ];
        $validateData['password'] = bcrypt($validateData['password']);

        // return dd($validateData); 
        User::create($validateData);
        return redirect('/user')->with('success', 'Register Successfull!');
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'usergroup' => 'required'
        ]);
        // dd($data);
        User::where('oid_user', $user->oid_user)->update($data);
        return redirect('/user');
    }
    public function destroy(User $user)
    {
        // DB::table('users')->where('oid_user', $user->oid_user)->delete();
        $user->delete();
        return redirect('/user');
    }
}
