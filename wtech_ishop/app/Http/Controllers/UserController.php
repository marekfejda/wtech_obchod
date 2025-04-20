<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function account()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Najprv sa prihlás');
        }

        return view('pages.account', compact('user'));
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = User::where('name', $request->input('name'))
                            ->where('password', $request->input('password')) // bez hashovania zatiaľ
                            ->first();

            if ($user) {
                session(['user' => $user]);
                return redirect()->route('account');
            } else {
                return back()->with('error', 'Nesprávne meno alebo heslo');
            }
        }

        return view('pages.login');
    }
    
    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = User::create([
                'username' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'role' => 'user',
                'created_at' => Carbon::now(),
            ]);

            session(['user' => $user]);

            return redirect()->route('account');
        }

        return view('pages.register');
    }
}

