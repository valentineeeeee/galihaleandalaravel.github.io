<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;

class UserTransController extends Controller
{
    public function index(){
        $transactions = Transaction::with('products')->get();
        return view('layout.customerTransaksi', compact('transactions'));
    }

    public function create($id){
        $product = Product::findOrFail($id);
        return view('layout.customerCreate', compact('product'));
    }
}
