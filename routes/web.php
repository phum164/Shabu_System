<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderfoodController;
use App\Http\Controllers\HistoryOController;
use App\Http\Controllers\TotalpriceController;
use App\Http\Controllers\AddMenuAdminController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ListorderController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\RegisterController;






Route::get('/edithistory', function () {
    return view('edithistory');
});

Route::get('/admin', function () {
    return view('admin');
});
Route::get('/', function () {
    return redirect()->route('home_admin');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/home_admin', [AdminController::class, 'index'])->name('home_admin');
    Route::middleware(['admin'])->group(function () {
        Route::get('/adminpage', [MenuController::class, 'page'])->name('admin.page');
    });
    Route::middleware(('cash'))->group(function () {
        //ใส่ route ของพนักงานต้อนรับ คิดเงิน
        Route::get('/Totalprice', [TotalpriceController::class, 'index'])->name('totalprice');
        Route::get('/Billadmin/{id}', [BillController::class, 'showBill'])->name('Billadmin');
        Route::post('/bill/create', [BillController::class, 'create'])->name('bill.create');
        Route::post('/bill/update', [BillController::class, 'update'])->name('bill.update');
        Route::post('/checkbill/{id}', [BillController::class, 'checkbill'])->name('checkbill');
        Route::post('/update-total-pay', [BillController::class, 'updateTotalPay'])->name('update-total-pay');
        Route::get('/allbill', [BillController::class, 'allBill'])->name('all_bill.showBill');
        Route::get('/allbill/search', [BillController::class, 'search'])->name('search_bill');
        Route::get('/managetable/{id}', [TableController::class, 'manage'])->name('Managetable');
        Route::get('/table_admin', [TableController::class, 'index'])->name('table_admin');
        Route::get('/Orderfood/{id}', [OrderfoodController::class, 'index'])->name('Orderfood');
        Route::get('/historyoder/{id}', [HistoryOController::class, 'index'])->name('historyoder');
        Route::post('listorders/{id}', [ListOrderController::class, 'store'])->name('listorders.store');
    });
    });
    Route::middleware(('kitch'))->group(function () {
        //ใส่ route ของพนักงานครัว
        Route::get('/Menulist', [ListOrderController::class, 'index'])->name('menulist');
        Route::post('/Menulist-update', [ListOrderController::class, 'update'])->name('update.status');
    Route::middleware(('manager'))->group(function () {
        //ใส่ route ของผู้บริหาร
        Route::get('/register', [RegisterController::class, 'showForm'])->name('addemp');
        Route::post('/register', [RegisterController::class, 'store'])->name('register');
        Route::get('/empdata', [EmployeeController::class, 'index'])->name('empdata');
        Route::post('editemp/{id}', [EmployeeController::class, 'update'])->name('edit_emp');
        Route::get('/edit.position/{id}', [PositionController::class, 'update'])->name('edit.position');
        Route::post('/edit.position/{id}', [PositionController::class, 'update'])->name('edit.position');
        Route::get('/showedit/{id}', [EmployeeController::class, 'edit'])->name('show_edit');
        Route::get('/delete/{id}', [EmployeeController::class, 'destroy'])->name('delete_emp');
    });
    Route::middleware(('stock'))->group(function () {
        //ใส่ route ของ stock
        Route::get('/editmenu', [AdminController::class, 'editmenu'])->name('editmenu');
        Route::post('/addstock/{id}', [MenuController::class, 'stock'])->name('add_stock');
        Route::post('/insertmenu', [MenuController::class, 'create'])->name('insertmenu');
        Route::get('/edit/{id}', [MenuController::class, 'edit'])->name('edit');
        Route::put('/editmenu/{id}', [MenuController::class, 'update'])->name('editmenu');
        Route::get('/delete/{id}', [MenuController::class, 'destroy'])->name('deletemenu');
        Route::get('/Addmenuadmin', [AddMenuAdminController::class, 'index'])->name('Addmenuadmin');
        Route::get('/showstock', [MenuController::class, 'showstock'])->name('showstock');
        Route::get('/showstock/search', [MenuController::class, 'search'])->name('searchstock');
    });
});
