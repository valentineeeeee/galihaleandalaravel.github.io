<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Supplier;
use App\Models\Material;

class NotificationController extends Controller
{
    public function index(){

    }

    public function store(Request $request, $key){
        $material = Material::where('id', $key)->first();
        $supplier = Supplier::where('id', $material->supplier_id)->first();

         $notification = new Notification();

        $notification->user_id = $supplier->user_id;
        $notification->notification_title = 'Resupply Material';
        $notification->notification_message = 'Bahan';

        $notification->save();
    }
    
}
