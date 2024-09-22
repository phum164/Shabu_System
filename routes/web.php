<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TableadminController;
use App\Http\Controllers\OrderfoodController;
use App\Http\Controllers\HistoryOController;
use App\Http\Controllers\TotalpriceController;
use App\Http\Controllers\ManageTableAdminController;
use App\Http\Controllers\MenuListAdminController;
use App\Http\Controllers\AddMenuAdminController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ListorderController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/empdata', function () {
    return view('empdata');
});
Route::get('/edithistory', function () {
    return view('edithistory');
});
Route::get('/admin', function () {
    return view('admin');
});

Route::get('/home_admin', [AdminController::class, 'index'])->name('home_admin');
// Route::get('/editmenu', [AdminController::class, 'editmenu'])->name('editmenu');
Route::get('/table_admin', [TableadminController::class, 'index'])->name('table_admin');
Route::get('/Orderfood', [OrderfoodController::class, 'index'])->name('Orderfood');
Route::get('/historyoder', [HistoryOController::class, 'index'])->name('historyoder');
Route::get('/Totalprice', [TotalpriceController::class, 'index'])->name('totalprice');
Route::post('/listorders', [ListOrderController::class, 'store'])->name('listorders.store');
Route::get('/showstock', [MenuController::class, 'showstock'])->name('showstock');
Route::post('/addstock/{id}', [MenuController::class, 'stock'])->name('add_stock');
Route::get('/Menulist', [MenuListAdminController::class, 'index'])->name('menulist');
Route::get('/Managetable', [ManageTableAdminController::class, 'index'])->name('Managetable');
Route::get('/Addmenuadmin', [AddMenuAdminController::class,'index'])->name('Addmenuadmin');
Route::post('/insertmenu',[MenuController::class,'create'])->name('insertmenu');
Route::get('/edit/{id}',[MenuController::class,'edit'])->name('edit');
Route::put('/editmenu/{id}',[MenuController::class,'update'])->name('editmenu');
Route::get('/delete/{id}',[MenuController::class,'destroy'])->name('deletemenu');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/adminpage', [MenuController::class, 'page'])->name('admin.page');
    });
    Route::middleware(('cash'))->group(function(){
        //ใส่ route ของพนักงานต้อนรับ คิดเงิน
    });
    Route::middleware(('kich'))->group(function(){
        //ใส่ route ของพนักงานครัว
    });
    Route::middleware(('manager'))->group(function(){
        //ใส่ route ของผู้บริหาร
    });
    Route::middleware(('stock'))->group(function(){
        //ใส่ route ของพนักงานครัว
    });
});