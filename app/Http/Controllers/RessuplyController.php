<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resupplie;
use App\Models\Supplier;
use App\Models\Material;
use App\Models\User;

class RessuplyController extends Controller
{
    public function reorder($key)
    {
        return null;
    }

    public function index()
    {
        if (auth()->user()->level == 1) {
            $ressuplies = Resupplie::with('supplier', 'material')->get();
            return view('layout.ressuply', compact('ressuplies'));
        } elseif (auth()->user()->level == 2) {
            $user = auth()->user();
            $supplier = Supplier::where('user_id', $user->id)->first();
            $ressuplies = Resupplie::with('supplier', 'material')->where('supplier_id', $supplier->id)->get();

            return view('layout.ressuply', compact('ressuplies'));
        } else {
            return redirect('/home');
        }
    }

    // public function indexlain(){
    //     $user = auth()->user();
    //     $supplier = Supplier::where('user_id', $user->id)->first();
    //     $ressuplies = Resupplie::with('supplier', 'material')->where('supplier_id', $supplier->id)->get();

    //     return view('layout.ressuplylain', compact('ressuplies'));
    // }

    public function create()
    {
        $materials = Material::all();
        $suppliers = Supplier::all();
        return view('layout.rsupplyConfirm', compact('materials', 'suppliers'));
    }

    public function reordertest($key)
    {
        $material = Material::where('id', $key)->first();

        // if(!$material->supplier_id){
        //     $admins = User::where('level', '1')->get();
        //     app()->make(\App\Http\Controllers\NotificationController::class)->sendNotification($admins->pluck('id'),'Supplier Tidak ada', 'Tidak ada supplier untuk material '.$material->material_name . ', silahkan tambahkan supplier untuk material ini' );
        //     return false;
        // } else {
        $supplier = Supplier::where('id', $material->supplier_id)->first();

        $ressuply = new Resupplie();
        $ressuply->supplier_id = $material->supplier_id;
        $ressuply->material_id = $material->id;
        $ressuply->resupply_qty = $material->material_mrp;
        // $ressuply->resupply_total_price = $material->material_mrp * $material->material_price;
        $ressuply->resupply_date_finished = date('Y-m-d', strtotime('+' . $material->material_lt . ' days'));
        $ressuply->resupply_status = 'Pending';
        $ressuply->save();

        // $notification_message = 'Bahan'
        // . wrapWithHtml('strong', $material->material_name)
        // . 'Perlu di supply sebanyak '
        // . wrapWithHtml('strong', $ressuply->ressuply_qty)
        // . ' dengan total harga '
        // . wrapWithHtml('strong', $ressuply->ressuply_total_price)
        // . ' dengan batas waktu '
        // . wrapWithHtml('strong', $ressuply->ressuply_date_finish)
        // . ' hari';

        // $notification = new Notification();

        // $notification->user_id = $supplier->user_id;
        // $notification->notification_title = 'Resupply Material';
        // $notification->notification_message = 'Bahan';

        // $notification->save();

        // app()->make(\App\Http\Controllers\NotificationController::class)->sendNotification($supplier->user_id, 'Resupply Material' /* , $notification_message */);

        return true;
        // }
    }

    public function confirm_resupply(Request $request)
    {
        $ressuply = Resupplie::where('id', $request->id)->first();

        $ressuply->ressuply_status = 'Confirmed';
        $ressuply->save();

        return redirect('layout.ressuply');
    }

    public function cancel_resupply(Request $request)
    {
        $ressuply = Resupplie::where('id', $request->id)->first();

        $ressuply->ressuply_status = 'Canceled';
        $ressuply->save();
        $message = 'Resupply bahan' . $ressuply->material->material_name . 'dibatalkan';
        $admins = User::where('level', '1')->get();
        $admins_id = $admins->pluck('id');
        app()->make(\App\Http\Controllers\NotificationController::class)->sendNotification($admins_id, 'Resupply Dibatalkan', $message);

        return redirect('layout.ressuply');
    }

    public function complete_resupply(Request $request)
    {
        $ressuply = Resupplie::where('id', $request->id)->first();
        $material = $ressuply->material;
        $material->material_stock = $material->material_stock + $ressuply->ressuply_qty;
        $material->save();

        $ressuply->ressuply_status = 'Completed';
        $ressuply->save();

        return redirect('layout.ressuply');
    }

    public function change_status(Request $request)
    {
        $resupply = Resupplie::find($request->resupply_id);
        $resupply->resupply_status = $request->status;

        if ($request->status == 'Complete') {
            $material = Material::where('id', $resupply->material_id)->first();
            $material->material_stock = $material->material_stock + $resupply->resupply_qty;
            $material->save();
        }

        $resupply->save();

        return redirect()->back();
    }

    public function store(Request $request)
    {
        $resupply_status = $this->status($request->resupplies_qty);

        return redirect('layout.ressuply')->with('success', 'Resuply berhasil ditambahkan');

        
    }

    public function status($resupply_qty)
    {
        if ($resupply_qty > 0) {
            return 'on process';
        } else {
            return 'done';
        }
    }

}