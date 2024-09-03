<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TableadminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/home', [AdminController::class, 'index'])->name('home_admin');
Route::get('/table_admin', [TableadminController::class, 'index'])->name('table_admin');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
