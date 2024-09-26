<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Table;
use Carbon\Carbon;

class BillController extends Controller
{

    public function index()
    {
        //
        $bills = Bill::all();
        return view('Billadmin', compact('bills'));
    }


    public function create(Request $request)
    {
        $employee_id = Auth::id(); 
        $bill = new Bill;
        $bill->employee_id = $employee_id; 
        $bill->table_id = $request->tableid; 
        $bill->person_amount = $request->amount; 
        $bill->total_pay = $request->amount * 299; 
        $bill->status = 0;
        $bill->start_time = now(); // กำหนดฟิลด์ start_time
        $bill->end_time = now()->addHours(2); 
        $bill->save();
    
        // Update table status
        $table = Table::find($request->tableid);
        $table->status = 0; // Make the table unavailable
        $table->save();
        
        // Redirect back to manage table view with the selected table ID
        return redirect('/managetable/' . $request->tableid);
    }
    
    public function showTable($id)
    {
        $selectedTable = Table::find($id);
    
        // Retrieve the last bill associated with the table
        $bill = $selectedTable->bill->last();
        if ($bill) {
            $start_time = $bill->start_time;  // Get the bill's start time
        } else {
            $start_time = now();  // Default to current time if no bill exists
        }
    
        // Calculate the end time (2 hours after the start time)
        $end_time = Carbon::parse($start_time)->addHours(2)->toDateTimeString();
    
        // Pass the selected table and end_time to the view
        return view('managetableadmin', compact('selectedTable', 'end_time'));
    }
    
    public function update(Request $request)
    {
        // Get the latest bill associated with the table
        $bill = Bill::where('table_id', $request->tableid)->latest()->first();
    
        if ($bill) {
            // Update the person amount and save the bill
            $bill->person_amount = $request->amount;
            $bill->save();
        }
    
        // Redirect back to the manage table view
        return redirect()->route('managetable');
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
