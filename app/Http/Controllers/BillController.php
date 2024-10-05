<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Table;
use Carbon\Carbon;
use App\Models\ListOrder;

class BillController extends Controller
{

    public function index()
    {
        //
        $bills = Bill::all();
        return view('Billadmin', compact('bills'));
    }
    public function finsbill($id)
    {
        $table = Table::find($id);
        if ($table) {
            $table->update([
                'status' => 1,
            ]);
        }
    }


    public function create(Request $request)
    {
        $employee_id = Auth::id();
        $bill = new Bill;
        $bill->employee_id = $employee_id;
        $bill->table_id = $request->tableid;
        $bill->person_amount = (int)$request->person_amount;
        $bill->all_person_pay = $request->person_amount * 299;
        $bill->total_pay = $request->person_amount * 299;
        $bill->status = 0;
        $bill->start_time = now();
        $bill->end_time = now()->addHours(2);
        $bill->save();


        $table = Table::find($request->tableid);
        $table->status = 0;
        $table->save();

        return redirect('/managetable/' . $request->tableid)->with('success', 'สร้างบิลเสร็จสิ้น');
    }

    public function showTable($id)
    {
        $selectedTable = Table::find($id);

        // Retrieve the last bill associated with the table
        $bill = $selectedTable->bill->last();
        if ($bill) {
            $start_time = $bill->start_time;
        } else {
            $start_time = now();
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
            $bill->person_amount = $request->person_amount;
            $bill->all_person_pay = $request->person_amount * 299;
            $bill->total_pay = $request->person_amount * 299;
            $bill->save();
        }

        return redirect()->route('Managetable', ["id" => $request->tableid]);
    }
    public function checkbill($id)
    {
        $time = date('Y-m-d H:i:s', time());
        $bill = Bill::find($id);

        if ($bill) {
            ListOrder::where('bill_id', $id)->update(['status' => 2]);
            $this->finsbill($bill->table_id);
            $bill->update([
                'status' => 1,
                'finish_time' => $time,
            ]);
        }

        return redirect()->route('table_admin')->with('success', 'ชำระบิลบิลเรียบร้อยแล้ว');
    }

    public function allBill()
    {
        $bills = Bill::orderBy('id', 'desc')->paginate(10);
        $total_incom = Bill::where('status', 1)->sum('total_pay');
        return view('all_bill', compact('bills', 'total_incom'));
    }

    public function search(Request $request)
    {
        $billId = $request->sbill;
        $tableId = $request->stabel;
        $query = Bill::query();
        if ($billId && $tableId) {
            $query->where('id', $billId)->where('table_id', $tableId);
        } elseif ($billId) {
            $query->where('id', $billId);
        } elseif ($tableId) {
            $query->where('table_id', $tableId);
        }
        $bills = $query->orderBy('id', 'desc')->paginate(10);
        $total_incom = Bill::where('status', 1)->sum('total_pay');
        return view('all_bill', compact('bills', 'total_incom'));
    }
    public function showBill($id)
    {
        $bill = Bill::findOrFail($id);
        return view('Billadmin', compact('bill'));
    }

    function updateTotalPay(Request $request)
    {
         // Validate input
         $request->validate([
            'bill_id' => 'required|integer|exists:bills,id', // ตรวจสอบว่ามี bill_id และมีอยู่ในฐานข้อมูล
            'adjustment' => 'required|integer|min:0', // adjustment ต้องเป็นจำนวนเต็มและ >= 0
            'amountprice' => 'required|integer|min:0', // amountprice ต้องเป็นจำนวนเต็มและ >= 0
        ], [
            'bill_id.required' => 'กรุณาระบุบิลที่ต้องการอัปเดต',
            'bill_id.integer' => 'รหัสบิลต้องเป็นตัวเลข',
            'bill_id.exists' => 'บิลที่ระบุไม่มีอยู่ในระบบ',
            'adjustment.required' => 'กรุณาระบุการปรับยอด',
            'adjustment.integer' => 'การปรับยอดต้องเป็นตัวเลขจำนวนเต็ม',
            'adjustment.min' => 'การปรับยอดต้องไม่ต่ำกว่า 0',
            'amountprice.required' => 'กรุณาระบุจำนวนเงิน',
            'amountprice.integer' => 'จำนวนเงินต้องเป็นตัวเลขจำนวนเต็ม',
            'amountprice.min' => 'จำนวนเงินต้องไม่ต่ำกว่า 0',
        ]);

        $bill = Bill::find($request->bill_id);

        if ($bill) {
            $adjustment = $request->input('adjustment', 0);
            $amountDue = $request->input('amountprice', 0);
            $bill->add_pay = $adjustment;
            $total_pay = $bill->total_pay + $adjustment;

            $bill->total_pay = $total_pay;
            $bill->save();
        }

        // ส่งกลับไปที่หน้าเดิม พร้อมกับข้อความสำเร็จ
        return redirect()->back()->with('success', 'บิลได้รับการอัปเดตเรียบร้อยแล้ว');
    }
}
