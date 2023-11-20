<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Material;
use App\Models\Transaction;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class UserProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('layout.customerProduct', compact('products'));
    }

    //make a function to show the detail of the product
    // public function show($idProduct){
    //     $product = Product::findOrFail($idProduct);
    //     return view('layout.customerProduct', compact('product'));
    // }

    public function create(Request $request)
    {
        $products = Product::findOrFail($request->product_id);

        return view('layout.customerAddProduct', compact('products'));
    }

    public function terima(Request $request)
    {
        $request->validate([
            'transaction_qty' => 'required|numeric|min:1',
        ]);


        $products = Product::findOrFail($request->product_id);

        $quantity = $request->transaction_qty;
        $total_price = $quantity * $products->product_price;

        return view('layout.confirmProduct', compact('products', 'quantity', 'total_price'));
    }



    public function store(Request $request)
    {

        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $total_price = $request->total_price;

        $status = 'Pending';
        $transaction_arrival_date = date('Y-m-d H:i:s', strtotime('+3 days'));

        $product = Product::findOrFail($product_id);
        $materials = Material::all();

        $materials_stock = $materials->pluck('material_stock', 'id')->toArray();
        $materials_qty = $product->materials->pluck('pivot.material_quantity', 'id')->toArray();

        foreach ($materials_qty as $key => $value) {
            if ($materials_stock[$key] < $value * $quantity) {
                return redirect('/customerProduct')->with([
                    'status' => 'error',
                    'message' => 'Bahan baku tidak mencukupi'
                ]);
            }
            // if ($materials_stock[$key] < $value * $quantity) {
            //     Session::flash('status', 'success');
            //     Session::flash('message', 'Bahan baku tidak mencukupi');
            // }



             $current_material_stock = $materials_stock[$key];
            $materials_stock[$key] -= $value * $quantity;
            $current_material = $materials->where('id', $key)->first();

            $reorder_point = $current_material->material_rop;



            if ($current_material_stock > $reorder_point && $materials_stock[$key] <= $reorder_point) {
                app()->make('App\Http\Controllers\RessuplyController')->reordertest($key);
            }
        }

        foreach ($materials as $material) {
            $material->update(['material_stock' => $materials_stock[$material->id]]);
        }

        $transaction = new Transaction();

        $transaction->user_id = auth()->user()->id;
        $transaction->product_id = $product_id;
        $transaction->transaction_qty = $quantity;
        $transaction->transaction_total_price = $total_price;
        $transaction->transaction_status = $status;
        $transaction->transaction_arrival_date = $transaction_arrival_date;

        $transaction->save();

        return redirect('/customerTransaksi');

    }

    public function finish(Request $request)
    {
        $transaction = Transaction::find($request->transaction_id);
        $transaction->transaction_status = 'Finished';
        $transaction->save();

        return redirect('/customerTransaksi');
    }

}