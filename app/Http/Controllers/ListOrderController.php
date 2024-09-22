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
    public function store(Request $request)
    {
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
            $listOrder->amount	 = $request->amount	[$index];
            
            $listOrder->save();
        }
        
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
