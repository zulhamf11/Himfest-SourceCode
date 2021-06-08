<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function create() {
        $team = Team::get();
        $member = Member::get();
        $admin = Auth::User()->name;

        return view('admin.dashboard', ['member'=>$member,'team'=>$team, 'admins'=>$admin]);
    }
}
