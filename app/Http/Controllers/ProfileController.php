<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        // dd(auth()->user()->oid_user);
        return view('profile', [
            'title' => 'Profile',
        ]);
    }
    public function editprofile(Request $request, User $user)
    {

        if ($request->username != auth()->user()->username) {           
            $data = [
                // 'username' => 'required|min:3|max:20|unique:users',
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'telp' => 'required',
            ];
        }else{
            $data = [
                // 'username' => 'required|min:3|max:20',
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'telp' => 'required',
            ];
        }
        $validatedata = $request->validate($data);
        // return dd($validatedata);
        User::where('oid_user', auth()->user()->oid_user)->update($validatedata);
        return redirect('/profile')->with('success', 'Profile has update!');
    }
    public function changeprofile(Request $request)
    {
        // return $request->file('image_profile')->store('profrile-image');
        $validatedata = $request->validate([
            'profile_photo_path' => 'image|file|max:2048'
        ]);

        if ($request->file('profile_photo_path')) {
            if (!empty(auth()->user()->profile_photo_path)) {
                if('storage/' . auth()->user()->profile_photo_path == null){
                    unlink('storage/' . auth()->user()->profile_photo_path);
                }
            }
            $input = $request->file('profile_photo_path')->store('user-image');
            $validatedata['profile_photo_path'] = $input;
        } else {
            $validatedata['profile_photo_path'] = auth()->user()->profile_photo_path;
        }
        User::where('oid_user', auth()->user()->oid_user)->update($validatedata);
        return redirect('/profile')->with('success_pass', 'Photo has update!');
    }

    public function changepassword(Request $request)
    {
        $request->validate([
            'password' => 'min:5|max:30|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required'
        ]);
        $validatedata = [
            'password' => $request->password,
        ];
        $validatedata['password'] = bcrypt($validatedata['password']);
        // return dd($validateData['password']);
        User::where('oid_user', auth()->user()->oid_user)->update($validatedata);
        return redirect('/profile')->with('success_pass', 'Password has update!');
    }
}
