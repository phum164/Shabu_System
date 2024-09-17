<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TableadminController;
use App\Http\Controllers\OrderfoodController;
use App\Http\Controllers\HistoryOController;
use App\Http\Controllers\TotalpriceController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ListorderController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/home_admin', [AdminController::class, 'index'])->name('home_admin');
Route::get('/editmenu', [AdminController::class, 'editmenu'])->name('editmenu');
Route::get('/table_admin', [TableadminController::class, 'index'])->name('table_admin');
Route::get('/Orderfood', [OrderfoodController::class, 'index'])->name('Orderfood');
Route::get('/historyoder', [HistoryOController::class, 'index'])->name('historyoder');
Route::get('/Totalprice', [TotalpriceController::class, 'index'])->name('totalprice');
Route::post('/listorders', [ListOrderController::class, 'store'])->name('listorders.store');





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
