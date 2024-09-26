<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TableadminController;
use App\Http\Controllers\OrderfoodController;
use App\Http\Controllers\HistoryOController;
use App\Http\Controllers\TotalpriceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\BillController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('editemp/{id}',[EmployeeController::class,'update'])->name('edit_emp');
Route::get('/editemp', function () {
    return view('editemp');
});

Route::get('/empdata', function () {
    return view('empdata');
});

Route::get('/allbill', [BillController::class, 'showall_bill'])->name('all_bill.showall_bill');


Route::get('/admin', function () {
    return view('admin');
});

Route::get('/home_admin', [AdminController::class, 'index'])->name('home_admin');
Route::get('/editmenu', [AdminController::class, 'editmenu'])->name('editmenu');
Route::get('/table_admin', [TableadminController::class, 'index'])->name('table_admin');
Route::get('/Orderfood', [OrderfoodController::class, 'index'])->name('Orderfood_user');
Route::get('/historyoder', [HistoryOController::class, 'index'])->name('historyoder');
Route::get('/Totalprice', [HistoryOController::class, 'index'])->name('totalprice');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


