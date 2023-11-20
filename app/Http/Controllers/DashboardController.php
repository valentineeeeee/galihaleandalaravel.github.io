<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $transaksi = Transaction::all();
        $users = User::all();
        $suppliers = Supplier::all();
        $product = Product::all();
        return view('layout.dashboard', compact('transaksi', 'users', 'suppliers', 'product'));
    }
}
