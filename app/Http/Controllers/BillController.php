<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $bills = Bill::all();
        return view('#',compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $time = date('Y-m-d H:i:s',time());
        Bill::create([
            'employee_id' => $request->empid,
            'table_id' => $request->tableid,
            'person_amount	' => $request->amount,
            'total_pay' => $request->amount*299,
            'status' => 0,
            'start_time' => $time,
            'end_time' => date('Y-m-d H:i:s', strtotime('+2 hours')),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [

        ];
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bill = Bill::find($id);
        return view('#',compact('bill'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $bill = Bill::find($request->id);
        $bill::update([
            'person_amount	' => $bill->person_amount + $request->amount,
            'total_pay' => $bill->person_amount + ($request->amount*299),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
