<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KonsumenController extends Controller
{
    public function index(){
        $user = Auth::user();
        $transactions = $user->transactions;
        return view ('layout.customerTransaksi', compact('transactions'));
    }

    public function create(){
        
        return view('layout.addtrans');
    }

    public function store(){
        
    }

    public function edit($id){
        $user = Auth::user();
        $users = User::findOrFail($id);
        return view('layout.editakun', compact('users'));
    }
}
