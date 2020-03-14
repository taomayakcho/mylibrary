<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class MemberDashController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('memberdashboard')->with('members',$user->members);
    }
}
