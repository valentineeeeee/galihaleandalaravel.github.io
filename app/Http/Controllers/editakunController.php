<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class editakunController extends Controller
{

    public function index(){
        $user = Auth::user();
        return view('layout.editakun', compact('user'));
    }

    public function edit($id){
        $user = Auth::user();
        $users = User::findOrFail($id);
        dd($users);
        return view('layout.editakun', compact('users'));
    }

    public function update(Request $request, $id) {
        $users = User::findOrFail($id);

        $newName = '';

        if($request->file('image')){
        $extension = $request->file('image')->getClientOriginalExtension();
        $newName = $request->username.'-'.now()->timestamp.'.'.$extension;
        $request->file('image')->storeAs('photo', $newName);
        }
        $request->validate([
            'email' => 'required|email',
            'username' => 'required|max:25',
            'password' => 'required|min:8',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
    [
        'email.required' => 'Email tidak boleh kosong',
        'username.required' => 'Username tidak boleh kosong',
        'password.required' => 'Password tidak boleh kosong',
        'email.unique' => 'Email telah digunakan',
        'password.min' => 'Password tidak kurang dari :min karakter',
        'image.required' => 'Image tidak boleh kosong',
    ]);

        $users->email = $request->email;
        $users->username = $request->username;
        $users->password = Hash::make($request->password);
        $users->image = $newName;
        $users->save();

        if($users) {
            Session::flash('status', 'success');
            Session::flash('message', 'Akun berhasil diupdate !');
        }

        return redirect('/home');    
    }
}
