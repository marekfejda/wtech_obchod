<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;


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
            $user = User::where('username', $request->input('name'))->first();

            if ($user && $user->password === hash('sha256', $request->input('password'))) {
                $tempUserId = session('temp_user_id');
                session(['user' => $user]);
                session()->forget('temp_user_id');

                if ($tempUserId) { // ak v session existuje temp_user_id, tak preradime objednavky do trvaleho user_id
                    \App\Models\Order::where('temp_user_id', $tempUserId)->update(
                        [
                            'user_id' => $user->id,
                            'temp_user_id' => null,
                        ]);
                }

                return redirect()->route('index');
            } else {
                return back()->with('error', 'Nesprávne meno alebo heslo');
            }
        }

        $user = session('user');
        if ($user) return redirect()->route('account');
        return view('pages.login');
    }
    
    public function register(Request $request)
    {
        if ($request->isMethod('post')) {

            //validate
            $validation = User::where('username', $request->input('name'))->first();

            if ($validation) {
                return back()->with('error', 'Používateľské meno už existuje!');
            }

            $user = User::create([
                'username' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => hash('sha256', $request->input('password')),
                'role' => 'user',
                'created_at' => Carbon::now(),
            ]);

            $tempUserId = session('temp_user_id');
            session(['user' => $user]);
            session()->forget('temp_user_id');

            if ($tempUserId) { // ak v session existuje temp_user_id, tak preradime objednavky do trvaleho user_id
                \App\Models\Order::where('temp_user_id', $tempUserId)->update(
                    [
                        'user_id' => $user->id,
                        'temp_user_id' => null,
                    ]);
            }

            return redirect()->route('account')->with('success', 'Boli ste úspešne registrovaný.');
        }

        $user = session('user');
        if ($user) return redirect()->route('account');
        return view('pages.register');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user'); // zmaže len konkrétnu premennú
        // alebo celé session: $request->session()->flush();

        return redirect()->route('login')->with('success', 'Boli ste odhlásený.');
    }
}

