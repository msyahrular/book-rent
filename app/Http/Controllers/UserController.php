<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        return view('profile');
    }

    public function index()
    {
        $user = User::where(['status' => 'active', 'role_id' => 2])->get();
        return view('user', ['users' => $user]);
    }

    public function registeredUser()
    {
        $registeredUser = User::where(['status' => 'inactive', 'role_id' => 2])->get();
        return view('registered-user', ['registeredUsers' => $registeredUser]);
    }

    public function show($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('user-detail', ['user' => $user]);
    }

    public function approve($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();


        return redirect('user-detail/'.$slug)->with('status', 'User Approved Successfuly!');
    }

    public function delete($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('user-delete', ['user' => $user]);
    }

    public function destroy($slug)
    {
        $user = User::where('slug', $slug)->first()->delete();
        return redirect('users')->with('status', 'User Banned Successfuly!');
    }

    public function bannedUser()
    {
        $bannedUser = User::onlyTrashed()->get();
        return view('user-banned', ['bannedUser' => $bannedUser]);
    }

    public function restore($slug)
    {
        $user = User::withTrashed()->where('slug', $slug)->first()->restore();
        return redirect('users')->with('status', 'User Unbanned Successfuly!');
    }
}
