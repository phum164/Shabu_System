<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\menutype;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = Menu::paginate(10);
        return view('add_menu', compact('menu'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate(
            [
                'menuName' => 'required|max:255|string||unique:menus,name',
                'menuImage' => 'nullable|mimes:png,jpeg,webp|max:2048',
            ],
            [
                'menuName.required' => 'กรุณากรอกชื่อเมนู',
                'menuName.max:255' => 'ชื่อเมนูไม่เกิน 255 ตัวอักษร',
                'menuName.unique' => 'มีเมนูนี้แล้ว',
            ]
        );
        $path = 'img/menus/';
        if ($request->hasFile('menuImage')) {
            $file = $request->file('menuImage');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move($path, $filename);
        } else {
            $filename = 'emptymenu.jpg';
        }
        Menu::create([
            'name' => $request->menuName,
            'menutype_id' => $request->type_id,
            'stock' => 100,
            'image' => $path . $filename
        ]);
        return redirect('/showstock');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function stock(Request $request, $id)
    {
        $request->validate([
            'stock' => 'required|integer|min:1',
        ], [
            'stock.required' => 'กรุณาระบุจำนวนสต๊อก',
            'stock.integer' => 'สต๊อกต้องเป็นจำนวนเต็ม',
            'stock.min' => 'จำนวนสต๊อกต้องมากกว่า 0',
        ]);
        $menu = Menu::find($id);
        $menu->update([
            'stock' => $menu->stock + $request->stock
        ]);
        return redirect('/showstock')->with('success', 'เพิ่มสต๊อกสินค้าแล้ว');;
    }

    /**
     * Display the specified resource.
     */
    public function showstock()
    {
        $menus = Menu::paginate(10);
        return view('stock', compact('menus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $editmenu = Menu::findOrFail($id);
        $types = menutype::all();
        return (view('AddMenuAdmin', compact('editmenu', 'types')));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $request->validate(
        //     [
        //         'menuName' => 'required|max:60|string',
        //         'menuImage' => 'nullable|mimes:png,jpeg,webp|max:2048',
        //         'stock' => 'nullable|integer'
        //     ],
        //     [
        //         'menuName.required' => 'กรุณากรอกชื่อเมนู',
        //         'name.max:255' => 'ชื่อเมนูไม่เกิน 60 ตัวอักษร'
        //     ]
        // );

        // $menu = Menu::findOrFail($id);
        // $path = 'img/menus/';
        // if ($request->hasFile('menuImage')) {
        //     if ($menu->image != 'img/menus/emptymenu.jpg' && file_exists(public_path($menu->image))) {
        //         unlink(public_path($menu->image));
        //         $file = $request->file('menuImage');
        //         $filename = time() . '.' . $file->getClientOriginalExtension();
        //         $file->move($path, $filename);
        //         $menu->image = $path . $filename;
        //         $menu->update([
        //             'name' => $request->menuName,
        //             'menutype_id' => $request->type_id,
        //             'image' => $path . $filename,
        //         ]);
        //         return redirect('/showstock')->with('success', 'อัปเดตเมนูเรียบร้อยแล้ว');
        //     }
        // }else{
        //     if($menu->name == $request->menuName && $menu->menutype_id == $request->type_id){
        //         return redirect('/showstock')->with('error', '');
        //     }
        // }

        // $menu->update([
        //     'name' => $request->menuName,
        //     'menutype_id' => $request->type_id,
        // ]);
        // return redirect('/showstock')->with('success', 'อัปเดตเมนูเรียบร้อยแล้ว');

        // ตรวจสอบข้อมูล
        $request->validate(
            [
                'menuName' => 'required|max:60|string',
                'menuImage' => 'nullable|mimes:png,jpeg,webp|max:2048', // จำกัดขนาดไฟล์ที่อัปโหลด
                'stock' => 'nullable|integer'
            ],
            [
                'menuName.required' => 'กรุณากรอกชื่อเมนู',
                'menuName.max' => 'ชื่อเมนูไม่เกิน 60 ตัวอักษร'
            ]
        );

        // ค้นหาเมนูจาก id
        $menu = Menu::findOrFail($id);
        $path = 'img/menus/';
        $checkImg = true;

        // ตรวจสอบว่ามีการอัปโหลดรูปภาพใหม่หรือไม่
        if ($request->hasFile('menuImage')) {
            // ลบภาพเก่าถ้าไม่ใช่ภาพเริ่มต้น
            $checkImg = false;
            if ($menu->image != 'img/menus/emptymenu.jpg' && file_exists(public_path($menu->image))) {
                unlink(public_path($menu->image));
            }
            // อัปโหลดรูปภาพใหม่
            $file = $request->file('menuImage');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($path), $filename);

            // บันทึกชื่อไฟล์รูปภาพใหม่ในฐานข้อมูล
            $menu->image = $path . $filename;
        }

        // ตรวจสอบว่ามีการเปลี่ยนแปลงชื่อหรือประเภทเมนูหรือไม่
        if ($menu->name == $request->menuName && $menu->menutype_id == $request->type_id && $checkImg) {
            return redirect('/showstock')->with('error', 'ไม่มีการเปลี่ยนแปลงข้อมูล');
        }

        // อัปเดตข้อมูลเมนู
        $menu->update([
            'name' => $request->menuName,
            'menutype_id' => $request->type_id,
            'image' => $menu->image // อัปเดตรูปภาพด้วย ถ้ามีการเปลี่ยนแปลง
        ]);

        return redirect('/showstock')->with('success', 'อัปเดตเมนูเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete = Menu::find($id);
        $name = $delete->name;
        $delete->delete();
        return redirect('/showstock')->with('success', 'ลบเมนู '. $name.' เรียบร้อยแล้ว');
    }

    public function page()
    {
        return view('adminpagetest');
    }
}
