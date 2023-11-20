<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Material_Product;
use App\Models\Material;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('materials')->get();

        $materials = Material::all();

        $materials_stock = $materials->pluck('material_stock', 'id')->toArray();


        return view('layout.product', compact('products'));
    }

    public function create()
    {
        $materials = Material::get()->all();
        return view('layout.addproduct', compact('materials'));
    }

    public function store(Request $request)
    {
        $newName = '';

        if ($request->file('product_image')) {
            $extension = $request->file('product_image')->getClientOriginalExtension();
            $newName = $request->product_name . '-' . now()->timestamp . '.' . $extension;
            $request->file('product_image')->storeAs('photo', $newName);
        }

        $request->validate(
            [
                'product_name' => 'required',
                'product_description' => 'required',
                'product_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'product_price' => 'required',
            ],
            [
                'product_name' => 'Nama material tidak boleh kosong',
                'product_description' => 'Deskripsi tidak boleh kosong',
                'product_image' => 'Gambar material tidak boleh kosong',
                'product_price' => 'Harga material tidak boleh kosong',
            ]
        );

        $data = [
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_image' => $newName,
            'product_price' => $request->product_price,
        ];
        $product = Product::create($data);

        // if($data) {
        //     Session::flash('status', 'success');
        //     Session::flash('message', 'Material berhasil dibuat !');
        // }

        // return redirect('/product');

        if ($request->input('product_material')) {
            $product_material = $request->input('product_material');

            $product_material = array_filter($product_material, function ($value) {
                return $value != null && $value > 0;
            });
            foreach ($product_material as $material => $quantity) {
                $data = [
                    'material_quantity' => $quantity,
                    'product_id' => $product->id,
                    'material_id' => $material
                ];
                Material_Product::create($data);
            }
        }
        return redirect('/product');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        // Storage::delete('storage/photo/'.$users->image);
        if ($product) {
            Session::flash('status', 'success');
            Session::flash('message', 'Product berhasil dihapus !');
        }
        return redirect('/product');
    }
}