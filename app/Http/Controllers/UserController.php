<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show(string $name) {
        //userの取得
        $user = User::where('name', $name)->first();

        return view('users.show', ['user' => $user]);
    }

    public function unfollow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id)
        {
            return abort('404', '自分自身をフォローできません');
        }

        $request->user()->followings()->detach($user);

        return ['name' => $name];
    }
    
    public function follow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id)
        {
            return abort('404', '自分自身をフォローできません');
        }

        //一人が何回もフォローするのを防ぐ
        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return ['name' => $name];
    }
    
}
