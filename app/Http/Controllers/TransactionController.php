<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;

class TransactionController extends Controller
{   
    public function index(){
        $transactions = Transaction::with('users')->get();
        return view('layout.transaction', compact('transactions'));
    }

    // public function create(){
    //     $purchase = Product::with('materials')->get()->all();
    //     return view ('layout.create', compact('purchase'));
    // }
}
