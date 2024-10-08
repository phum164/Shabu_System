<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use App\Models\User;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = User::all();
        return view('empdata', compact('employees'));
    }

    public function edit($id)
    {
        $emp = User::findOrFail($id);
        $position = Position::all();
        return view('editemp', compact('emp','position'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {   
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'tell_number' => [
                        'required',
                        'regex:/^0[0-9]{9}$/',
            ],
            'position_id' => 'required|exists:positions,id',
            'position_salary' => 'required|numeric|min:0', // การตรวจสอบข้อมูลสำหรับเงินเดือน

        ], [
            'name.required' => 'กรุณากรอก ชื่อ-สกุล พนักงาน',
            'email.required' => 'กรุณากรอกอีเมล',
            'email.unique' => 'อีเมลนี้ถูกใช้งานแล้ว',
            'tell_number.required' => 'กรุณากรอกหมายเลขโทรศัพท์',
            'tell_number.regex' => 'หมายเลขโทรศัพท์ต้องมี 10 หลักและขึ้นต้นด้วยเลข 0',
        ]);
        $employee = User::findOrFail($id);
        $employee->update($validatedData);
        $employee->position->update(['salary' => $request->position_salary]);
        
        return redirect()->route('empdata')->with('success', 'อัปเดตข้อมูลพนักงานเรียบร้อยแล้ว');
    }

    public function destroy($id)
    {
        $employee = User::findOrFail($id);
        $name = $employee->name;
        $employee->delete();
        return redirect()->back()->with('success', 'ลบพนักงาน ' . $name . ' เรียบร้อย');
    }
}
