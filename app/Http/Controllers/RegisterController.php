<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Fortify\CreateNewUser;
use App\Models\Position;

class RegisterController extends Controller
{
    protected $createNewUser;

    public function __construct(CreateNewUser $createNewUser)
    {
        $this->createNewUser = $createNewUser;
    }

    public function showForm()
    {
        $positions = Position::all();
        return view('auth.register', ['positions' => $positions]); // ฟอร์มเพิ่มพนักงาน
    }

    public function store(Request $request)
    {
        // ตรวจสอบข้อมูล
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'tell_number' => [
                    'required',
                    'regex:/^0[0-9]{9}$/',
                    'unique:users,tell_number'
            ],
            'position_id' => 'required|exists:positions,id',
            'password' => 'required|string|min:8|confirmed',
        ],[
            'name.required' => 'กรุณากรอก ชื่อ-สกุล พนักงาน',  // กำหนดข้อความเองสำหรับฟิลด์ 'name'
            'email.required' => 'กรุณากรอกอีเมล',
            'email.unique' => 'อีเมลนี้ถูกใช้งานแล้ว',
            'tell_number.required' => 'กรุณากรอกหมายเลขโทรศัพท์',
            'tell_number.regex' => 'หมายเลขโทรศัพท์ต้องมี 10 หลักและขึ้นต้นด้วยเลข 0',
            'tell_number.unique' => 'หมายเลขโทรศัพท์นี้มีผู้ใช้งานแล้ว',
        ]);

        // เรียกใช้ CreateNewUser เพื่อสร้างผู้ใช้ใหม่
        $this->createNewUser->create($validatedData);

        return redirect()->route('showall_employee')->with('success', 'พนักงานใหม่ถูกสร้างแล้ว');
    }
}
