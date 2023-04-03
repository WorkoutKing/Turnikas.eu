<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OnlineUser;


class OnlineUserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function onlineUser()
    {
        $onlineUsers = OnlineUser::where('last_seen', '>=', now()->subMinutes(5))->get();
        return view('online_users', compact('onlineUsers'));
    }
}
