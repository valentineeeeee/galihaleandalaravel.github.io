<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

//use App\Http\Controllers\Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newName = '';

        if($request->file('image')){
        $extension = $request->file('image')->getClientOriginalExtension();
        $newName = $request->username.'-'.now()->timestamp.'.'.$extension;
        $request->file('image')->storeAs('photo', $newName);
        }
        $request->validate([
            'email' => 'required|email|unique:users',
            'username' => 'required|max:25',
            'password' => 'required|min:8',
        ],
    [
        'email.required' => 'Email tidak boleh kosong',
        'username.required' => 'Username tidak boleh kosong',
        'password.required' => 'Password tidak boleh kosong',
        'email.unique' => 'Email telah digunakan',
        'password.min' => 'Password tidak kurang dari :min karakter',
    ]);
        $data  = [
            'name' => $request->name,
            'level' => $request->level,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'image' => $newName,

        ];
        User::create($data);

        if($data) {
            Session::flash('status', 'success');
            Session::flash('message', 'Akun berhasil dibuat !');
        }

        return Redirect('/login');
    } 

    /** 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('layout.customer');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
