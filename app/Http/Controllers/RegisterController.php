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
            'tell_number' => 'required|digits:10|unique:users',
            'position_id' => 'required|exists:positions,id',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // เรียกใช้ CreateNewUser เพื่อสร้างผู้ใช้ใหม่
        $this->createNewUser->create($validatedData);

        return redirect()->route('showstock')->with('success', 'พนักงานใหม่ถูกสร้างแล้ว');
    }
}
