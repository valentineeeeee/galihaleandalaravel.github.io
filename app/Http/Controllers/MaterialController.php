<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Supplier;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::with('supplier')->get();
        return view('layout.material', compact('materials'));
    }

    public function create()
    {
        $suppliers = Supplier::whereDoesntHave('material')->get();
        return view('layout.addmate', compact('suppliers'));
    }

    public function store(Request $request)
    {

        $newName = '';

        if ($request->file('material_image')) {
            $extension = $request->file('material_image')->getClientOriginalExtension();
            $newName = $request->material_name . '-' . now()->timestamp . '.' . $extension;
            $request->file('material_image')->storeAs('photo', $newName);
        }

        $request->validate(
            [
                'material_name' => 'required',
                'material_description' => 'required',
                'material_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'material_price' => 'required',
                'material_stock' => 'required',
                'material_lt' => 'required',
                'material_rop' => 'required',
            ],
            [
                'material_name' => 'Nama material tidak boleh kosong',
                'material_description' => 'Deskripsi material tidak boleh kosong',
                'material_image' => 'Gambar material tidak boleh kosong',
                'material_price' => 'Harga material tidak boleh kosong',
                'material_stock' => 'Stock material tidak boleh kosong',
                'material_lt' => 'Lead Time material tidak boleh kosong',
                'material_rop' => 'ROP material tidak boleh kosong',
            ]
        );


        $data = [
            'supplier_id' => $request->supplier_id,
            'material_name' => $request->material_name,
            'material_description' => $request->material_description,
            'material_image' => $newName,
            'material_price' => $request->material_price,
            'material_stock' => $request->material_stock,
            'material_lt' => $request->material_lt,
            'material_rop' => $request->material_rop,
            'material_mrp' => $request->material_mrp,
        ];

        Material::create($data);

        if ($data) {
            Session::flash('status', 'success');
            Session::flash('message', 'Material berhasil dibuat !');
        }

        return redirect('/material');
    }

    public function destroy($id)
    {
        $material = Material::findOrFail($id);
        $material->delete();

        if ($material) {
            Session::flash('status', 'success');
            Session::flash('message', 'Material berhasil dihapus');
        }
        return redirect('/material');
    }

    public function edit($id)
    {
        $material = Material::findOrFail($id);
        return view('layout.editmate', compact('material'));
    }

    public function update(Request $request, $id)
    {
        $material = Material::findOrFail($id);

        $newName = '';
        if ($request->file('material_image')) {
            $extension = $request->file('material_image')->getClientOriginalExtension();
            $newName = $request->material_name . '-' . now()->timestamp . '.' . $extension;
            $request->file('material_image')->storeAs('photo', $newName);
        }
        $request->validate(
            [
                'material_name' => 'required',
                'material_description' => 'required',
                'material_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'material_price' => 'required',
                'material_stock' => 'required',
                'material_lt' => 'required',
                'material_rop' => 'required',
                'material_mrp' => 'required',
            ],
            [
                'material_name' => 'Nama material tidak boleh kosong',
                'material_description' => 'Deskripsi material tidak boleh kosong',
                'material_image' => 'Gambar material tidak boleh kosong',
                'material_price' => 'Harga material tidak boleh kosong',
                'material_stock' => 'Stock material tidak boleh kosong',
                'material_lt' => 'Lead Time material tidak boleh kosong',
                'material_rop' => 'ROP material tidak boleh kosong',
                'material_mrp' => 'MRP material tidak boleh kosong',
            ]
        );

        $material->material_name = $request->material_name;
        $material->material_description = $request->material_description;
        $material->material_image = $request->material_image;
        $material->material_price = $request->material_price;
        $material->material_stock = $request->material_stock;
        $material->material_lt = $request->material_lt;
        $material->material_rop = $request->material_rop;
        $material->material_mrp = $request->material_mrp;
        $material->material_image = $newName;
        $material->save();

        if ($material) {
            Session::flash('status', 'success');
            Session::flash('message', 'Material berhasil diupdate');
        }
        return redirect('/material');
    }
}