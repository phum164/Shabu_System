<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Table;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $bills = Bill::all();
        return view('#', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createbill');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $time = date('Y-m-d H:i:s', time());
        $bill = Bill::create([
            'employee_id' => $request->empid,
            'table_id' => $request->tableid,
            'person_amount	' => $request->amount,
            'total_pay' => $request->amount * 299,
            'status' => 0,
            'start_time' => $time,
            'end_time' => date('Y-m-d H:i:s', strtotime('+2 hours')),
        ]);
        Table::status($request->tableid, 0);
        $request->session()->put('bill_id', $bill->id);
        return view('testbill_section', ['billId' => $bill->id]);
        // return redirect();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bill = Bill::find($id);
        return view('#', compact('bill'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $bill = Bill::find($request->id);
        $bill::update([
            'person_amount	' => $bill->person_amount + $request->amount,
            'total_pay' => $bill->person_amount + ($request->amount * 299),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function checkbill($id)
    {
        $time = date('Y-m-d H:i:s', time());
        $bill = Bill::find($id);
        Table::status($bill->table_id, 0);
        $bill->update([
            'status' => 1,
            'finish_time' => $time,
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    //check bill
    public function destroy(string $id)
    {
        //
    }
    public function showBill($billId)
    {
        $bill = Bill::findOrFail($billId);
        return view('show-bill', compact('bill'));
    }
}
