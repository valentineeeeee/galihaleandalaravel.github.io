<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductCustController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('layout.addtrans', compact('products'));
    }
}
