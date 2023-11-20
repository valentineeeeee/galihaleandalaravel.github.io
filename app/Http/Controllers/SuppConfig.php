<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Supplier;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SuppConfig extends Controller
{
    public function index(){
        $suppliers = Supplier::with('user')->get();
        return view('layout.supplier', compact('suppliers'));
    }

    public function create(){
        $users = User::where('level', '=', '2')->whereDoesntHave('supplier')->get();
        return view('layout.addsupp', compact('users'));
    }

    public function store(Request $request){

        $newName = '';

        if($request->file('image')){
        $extension = $request->file('image')->getClientOriginalExtension();
        $newName = $request->username.'-'.now()->timestamp.'.'.$extension;
        $request->file('image')->storeAs('photo', $newName);
        }
        $request->validate([
            'supplier_name' => 'required',
            'supplier_address' => 'required|max:25',
            'supplier_phone' => 'required|min:8',
        ],
    [
        'supplier_name.required' => 'Nama Supplier tidak boleh kosong',
        'supplier_address.required' => 'Alamat tidak boleh kosong',
        'supplier_address.max' => 'Alamat tidak panjang dari :min karakter',
        'supplier_phone.required' => 'No Telepon tidak boleh kosong',
        'supplier_phone.min' => 'No Telepon tidak kurang dari :min karakter',
    ]);

        $data  = [
            'user_id' => $request->user_id,
            'supplier_name' => $request->supplier_name,
            'supplier_address' => $request->supplier_address,
            'supplier_phone' => $request->supplier_phone,
        ];
        Supplier::create($data);

        if($data) {
            Session::flash('status', 'success');
            Session::flash('message', 'Akun berhasil dibuat !');
        }

        return redirect('/supplier');
    }

    public function destroy($id){
        $suppliers = Supplier::findOrFail($id);
        $suppliers->delete();
        
        // Storage::delete('storage/photo/'.$users->image);
        return redirect('/supplier')->with('message', 'Berhasil mletup');   
    }

    public function edit($id){
        $suppliers = Supplier::with('user')->findOrFail($id);
        return view('layout.editsupp', compact('suppliers'));
        // $users = Supplier::findOrFail($id);
        // return view('layout.editsupp', compact('users'));
    }

    public function update(Request $request, $id) {
        $users = Supplier::findOrFail($id);

        $request->validate([
            'supplier_name' => 'required',  
            'supplier_address' => 'required|max:25',
            'supplier_phone' => 'required|min:8',
        ],
    [
        'supplier_name.required' => 'Nama supplier tidak boleh kosong',
        'supplier_address.required' => 'Alamat supplier tidak boleh kosong',
        'supplier_phone.required' => 'No Telp. tidak boleh kosong',

    ]);
        
        $users->supplier_phone = $request->supplier_phone;
        $users->supplier_address = $request->supplier_address;
        $users->supplier_phone = $request->supplier_phone;
        $users->save();

        return redirect('/supplier');   
    }
}
