<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListOrder;
use App\Models\Bill;
use App\Models\Menu;
use App\Models\User;

class ListOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listorders = ListOrder::where('status', '=', 0)->get()->groupBy(function($timeorder) {
            return $timeorder->created_at->format('Y-m-d H:i:s'); // จัดกลุ่มตามเวลาที่แน่นอน
        });
        
        return view('MenuListAdmin', compact('listorders'));
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
    public function store(Request $request, $id)
    {
        // ตรวจสอบการ validate ก่อน ว่าข้อมูลที่ส่งมาถูกต้อง
        $request->validate([
            'menu_id' => 'required|array',
            'menu_id.*' => 'required|integer',
            'amount' => 'required|array',
            'amount.*' => 'required|integer|min:1',
        ]);
    
        // วนลูปผ่านค่า menu_id และ amount พร้อมกัน
        foreach ($request->menu_id as $index => $menuId) {
            $listOrder = new ListOrder();
            $listOrder->menu_id = $menuId;
            $listOrder->amount = $request->amount[$index];
            $listOrder->bill_id = $id;  
            $listOrder->save();
        }
    
        return redirect(route('Orderfood',['id'=>$id]))->with('success', 'คำสั่งซื้อถูกเพิ่มเรียบร้อยแล้ว!');
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
        if (!$request->has('order_ids')) {
            return redirect()->back()->with('error', 'กรุณาเลือกเมนูก่อนยืนยัน');
        }
        $orders = $request->order_ids;
        foreach($orders as $order){
            $list = ListOrder::find($order);
            $menu = Menu::find($list->menu_id);
            if($list->amount <= $menu->stock){
                $menu->update([
                    'stock' => $menu->stock - $list->amount,
                ]);
                $list->status = 1;
                $list->employee_id = auth()->user()->id;
                $list->save();
            }else{
                $list->status = 3;
                $list->save();
            }
        }
        // $orderIds = $request->input('order_ids');
        // ListOrder::whereIn('id', $orderIds)->update(['status' => 1]);
    
        return redirect()->back()->with('success', 'ยืนยันสำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
