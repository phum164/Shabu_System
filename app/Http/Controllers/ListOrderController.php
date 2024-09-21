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
        dd($request->all());
       foreach($request as $order){
        ListOrder::create([
            'menu_id' => $order->menuid,
            'stock' => $order->amount,
        ]);
       }
        $request->validate([
            'menu_id' => 'required|integer',
            'amount' => 'required|integer|min:1',
        ]);

        $listorder = new ListOrder();
        $listorder->menu_id = $request->input('menu_id');
        $listorder->amount = $request->input('amount');
        $listorder->save();

        return redirect()->back()->with('success', 'Order has been added!');
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
