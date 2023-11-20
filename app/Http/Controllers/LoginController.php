<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index(){
        if (Auth::user()){
/*             if ($user->level == '1') {
                return redirect()->intended('Manufaktur');
            } elseif ($user->level == '2') {
                return redirect()->intended('Supplier');
            } elseif ($user->level == '3') {
                return redirect()->intended('Customer');
            } */
        }
        return view('login');
    }

    public function proses(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],
    [
        'email.required' => 'Email tidak boleh kosong',
        'password.required' => 'Password tidak boleh kosong',
    ]);

    $kredensial = $request->only('email', 'password');

    if (Auth::attempt($kredensial)) {
        $request->session()->regenerate();
        $user = Auth::user();
/*             if ($user->level == '1') {
                return redirect()->intended('Manufaktur');
            } elseif ($user->level == '2') {
                return redirect()->intended('Supplier');
            } elseif ($user->level == '3') {
                return redirect()->intended('Customer');
            } */

            if($user){
                return redirect()->intended('home');
            }
            
            return redirect()->intended('/');
    }

        return back()->withErrors([
            'email' => 'Maaf Email atau Password anda salah' 
        ])->onlyInput('email');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
