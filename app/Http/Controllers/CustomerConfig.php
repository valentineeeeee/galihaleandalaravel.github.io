<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class CustomerConfig extends Controller
{
    public function index(Request $request)
    {
        $pengguna = User::all()->where('level', '!=', 1);

        $search = $request->search;
        // $users = User::where('username', 'LIKE', '%'.$search.'%');

        $users = User::where('level', '!=', 1)
            ->where('username', 'LIKE', '%' . $search . '%')
            ->Where('email', 'LIKE', '%' . $search . '%')
            ->paginate(5);
        return view('layout.customer', compact('users', 'pengguna'));
    }

    public function create()
    {
        return view('layout.addcust');
    }

    public function store(Request $request)
    {

        $newName = '';

        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->username . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('photo', $newName);
        }

        $request->validate(
            [
                'email' => 'required|email|unique:users',
                'username' => 'required|max:25',
                'password' => 'required|min:8',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'level' => 'required',
            ],
            [
                'email.required' => 'Email tidak boleh kosong',
                'username.required' => 'Username tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
                'email.unique' => 'Email telah digunakan',
                'password.min' => 'Password tidak kurang dari :min karakter',
                'image.required' => 'Photo tidak boleh kosong',
            ]
        );

        $user_name = '';

        if ($request->level == 1) {
            $user_name = "Manufaktur";
        } elseif ($request->level == 2) {
            $user_name = "Supplier";
        } else {
            $user_name = "Customer";
        }

        $data = [
            'name' => $user_name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'image' => $newName,
            'level' => $request->level,
        ];
        User::create($data);

        if ($data) {
            Session::flash('status', 'success');
            Session::flash('message', 'Akun berhasil dibuat !');

        }

        return redirect('/customer');
    }


    public function destroy($id)
    {
        $users = User::findOrFail($id);

        $users->delete();

        // Storage::delete('storage/photo/'.$users->image);
        if ($users) {
            Session::flash('status', 'success');
            Session::flash('message', 'Akun berhasil dihapus !');
        }
        return redirect('/customer');
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('layout.editcust', compact('users'));
    }


    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);

        $newName = '';

        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->username . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('photo', $newName);
        }
        $request->validate(
            [
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
            ]
        );

        $users->email = $request->email;
        $users->username = $request->username;
        $users->password = Hash::make($request->password);
        $users->image = $newName;
        $users->save();

        if ($users) {
            Session::flash('status', 'success');
            Session::flash('message', 'Akun berhasil diupdate !');
        }

        return redirect('/customer');
    }
}