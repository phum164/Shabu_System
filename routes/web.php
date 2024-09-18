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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home_admin', [AdminController::class, 'index'])->name('home_admin');
Route::get('/editmenu', [AdminController::class, 'editmenu'])->name('editmenu');
Route::get('/table_admin', [TableadminController::class, 'index'])->name('table_admin');
Route::get('/Orderfood', [OrderfoodController::class, 'index'])->name('Orderfood_user');
Route::get('/historyoder', [HistoryOController::class, 'index'])->name('historyoder');
Route::get('/Totalprice', [HistoryOController::class, 'index'])->name('totalprice');
Route::get('/showstock', [MenuController::class, 'showstock'])->name('showstock');
Route::post('/addstock/{id}', [MenuController::class, 'stock'])->name('add_stock');
Route::get('/Menulist', [MenuListAdminController::class, 'index'])->name('menulist');
Route::get('/Managetable', [ManageTableAdminController::class, 'index'])->name('Managetable');
Route::get('/Addmenuadmin', [AddMenuAdminController::class,'index'])->name('Addmenuadmin');
Route::post('/insertmenu',[MenuController::class,'create'])->name('insertmenu');
route::get('/adminpage',[MenuController::class,'page'])->middleware(('admin'));
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
