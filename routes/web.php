<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TableadminController;
use App\Http\Controllers\OrderfoodController;
use App\Http\Controllers\HistoryOController;
use App\Http\Controllers\TotalpriceController;
use App\Http\Controllers\MenuListAdminController;
use App\Http\Controllers\AddMenuAdminController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ListorderController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\RegisterController;


Route::get('/', function () {
    return redirect()-> route('login');
});

Route::post('editemp/{id}',[EmployeeController::class,'update'])->name('edit_emp');
Route::get('/showedit/{id}', [EmployeeController::class,'edit'])->name('show_edit');

Route::get('/empdata', [EmployeeController::class,'index'])->name('showall_employee');
Route::get('/edithistory', function () {
    return view('edithistory');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/home_admin', [AdminController::class, 'index'])->name('home_admin');
Route::get('/editmenu', [AdminController::class, 'editmenu'])->name('editmenu');
Route::get('/table_admin', [TableController::class, 'index'])->name('table_admin');
Route::get('/Orderfood', [OrderfoodController::class, 'index'])->name('Orderfood');
Route::get('/historyoder', [HistoryOController::class, 'index'])->name('historyoder');
Route::get('/Totalprice', [TotalpriceController::class, 'index'])->name('totalprice');
Route::post('/listorders/{id}', [ListOrderController::class, 'store'])->name('listorders.store');
Route::get('/showstock', [MenuController::class, 'showstock'])->name('showstock');
Route::post('/addstock/{id}', [MenuController::class, 'stock'])->name('add_stock');
Route::get('/Menulist', [MenuListAdminController::class, 'index'])->name('menulist');
Route::get('/managetable/{id}', [TableController::class, 'manage'])->name('Managetable');
Route::post('/bill/create', [BillController::class, 'create'])->name('bill.create');
Route::post('/bill/update', [BillController::class, 'update'])->name('bill.update');
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
        // Route::get('/Orderfood/{id}', [OrderfoodController::class, 'index'])->name('Orderfood');

    });
    Route::middleware(('kich'))->group(function(){
        //ใส่ route ของพนักงานครัว
    });
    Route::middleware(('manager'))->group(function(){
        //ใส่ route ของผู้บริหาร
        Route::get('/register', [RegisterController::class, 'showForm'])->name('addemp');
        Route::post('/register', [RegisterController::class, 'store'])->name('register');
    });
    Route::middleware(('stock'))->group(function(){
        //ใส่ route ของพนักงานครัว
    });
});
Route::get('/createbill', [BillController::class, 'create'])->name('cratebill');
Route::get('/show-bill/{billId}', [BillController::class, 'showBill'])->name('bill.show');
