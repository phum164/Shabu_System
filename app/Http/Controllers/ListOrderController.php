<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListOrder;

class ListOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $loder = ListOrder::whereNotIn('status', [1, 2])->get();
        $loder = ListOrder::all();
        return view('#',compact('loder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
{
    // ตรวจสอบการ validate ก่อน ว่าข้อมูลที่ส่งมาถูกต้อง
    $request->validate([
        'menu_id' => 'required|array',
        'menu_id.*' => 'required|integer', // ตรวจสอบว่าค่า menu_id แต่ละค่าต้องเป็นตัวเลข
        'amount' => 'required|array',
        'amount.*' => 'required|integer|min:1', // ตรวจสอบว่าจำนวนต้องเป็นตัวเลข และอย่างน้อย 1
    ]);

    // วนลูปผ่านค่า menu_id และ amount พร้อมกัน
    foreach ($request->menu_id as $index => $menuId) {
        $listOrder = new ListOrder();
        
        // กำหนดค่า menu_id และ amount ให้กับโมเดล
        $listOrder->menu_id = $menuId;
        $listOrder->amount = $request->amount[$index]; // ใช้ $index ในการจับคู่ค่า amount กับ menu_id
        $listOrder->bill_id = $id;
        
        // บันทึกข้อมูลลงในฐานข้อมูล
        $listOrder->save();
    }

    // เมื่อบันทึกข้อมูลเสร็จแล้ว ให้ redirect กลับไปพร้อมกับข้อความ success
    return redirect()->back()->with('success', 'คำสั่งซื้อถูกเพิ่มเรียบร้อยแล้ว!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
