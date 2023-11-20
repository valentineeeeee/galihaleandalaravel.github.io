<?php

use App\Http\Controllers\Customer;
use App\Http\Controllers\CustomerConfig;
use App\Http\Controllers\SuppConfig;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Supplier;
use App\Http\Controllers\ManufakturController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\editakunController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\ProductCustController;
use App\Http\Controllers\RessuplyController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\UserTransController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/daftar', function () {
    return view('register');
});

Route::get('/detail', function () {
    return view('detail');
});

Route::get('/home', [LayoutController::class,'index']) -> middleware('auth');

Route::controller(LoginController::class)->group(function(){
    Route::get('login', 'index')->name('login');
    Route::post('login/proses','proses');
    Route::get('logout', 'logout');
});

Route::controller(CustomerController::class)->group(function(){
    Route::get('register', 'index')->name('register');
    Route::post('register/create','store');
});

Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' =>['CekUserLogin:1']],function(){
        Route::resource('Manufaktur', ManufakturController::class);
        Route::resource('customer', CustomerConfig::class);
        Route::resource('supplier', SuppConfig::class);
        Route::resource('product', ProductController::class);
        Route::resource('material', MaterialController::class);
        Route::resource('transaction', TransactionController::class);
        Route::resource('dashboard', DashboardController::class);
    });

    Route::group(['middleware' =>['CekUserLogin:2']],function(){
        Route::resource('Supplier', Supplier::class);
        Route::get('resupply', [RessuplyController::class, 'index'])->name('resupply.index');
        Route::post('/confirm_resupply', [RessuplyController::class, 'confirm'])->name('confirm_resupply');
        Route::post('/complete_resupply', [RessuplyController::class, 'complete'])->name('complete_resupply');
        Route::post('/change_status', [RessuplyController::class, 'change_status'])->name('change_status');
    });

    Route::group(['middleware' =>['CekUserLogin:3']],function(){
        Route::get('customerProduct', [UserProductController::class, 'index'])->name('customerProduct.index');
        Route::post('customerProduct/create', [UserProductController::class, 'create'])->name('customerProduct.create');
        Route::post('customerProduct/terima', [UserProductController::class, 'terima'])->name('customerProduct.terima');
        Route::post('customerProduct/store', [UserProductController::class, 'store'])->name('customerProduct.store');
        Route::post('customerProduct/finish_transaksi', [UserProductController::class, 'finish'])->name('finish_transaksi');
        Route::resource('customerTransaksi', UserTransController::class);
        Route::resource('editakun', editakunController::class);
        Route::resource('addtrans', ProductCustController::class);

        Route::get('ressuply', [RessuplyController::class, 'index'])->name('ressuply.index');
        Route::get('ressuply/create', [RessuplyController::class, 'create'])->name('ressuply.create');
        Route::get('ressuply/reordertest', [RessuplyController::class, 'reordertest'])->name('ressuply.reorder');

    });
    
});