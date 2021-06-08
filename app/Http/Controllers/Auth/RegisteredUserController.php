<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Member;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:teams',
            'leader_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:members',
            'lineid' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'referrer' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:8',
        ]);
        
        $member = Member::create([
            'name' => $request->leader_name,
            'email' => $request->email,
            'lineid' => $request->lineid,
            'phone' => $request->phone,
        ]);

        $team = Team::create([
            'name' => $request->name,
            'category' => $request->category,
            'referrer' => $request->referrer,
            'password' => Hash::make($request->password),
        ]);

        $member->team_id = $team->id;
        $member->save();

        $team->leader_id = $member->id;
        $team->save();

        Auth::login($team);

        event(new Registered($team));

        return redirect(RouteServiceProvider::HOME);
    }
}
