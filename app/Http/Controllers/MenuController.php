<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = Menu::paginate(10);
        return view('add_menu',compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate(
            [
                'menuName' => 'required|max:255|string||unique:menus,name',
                'menuImage' => 'nullable|mimes:png,jpeg,webp',
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
    public function stock(Request $request,$id)
    {
        $request->validate([
            'stock' => 'required|integer|min:1',
        ], [
            'stock.required' => 'กรุณาระบุจำนวนสต๊อก',
            'stock.integer' => 'สต๊อกต้องเป็นจำนวนเต็ม',
            'stock.min' => 'จำนวนสต๊อกต้องมากกว่า 0',
        ]);
        $menu = Menu::find($id);
        $menu -> update([
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
        return view('stock',compact('menus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu = Menu::findOrFail($id);
        return(view('edit_menu',compact('menu')));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required|max:255|string',
                'image' => 'nullable|mimes:png,jpeg,webp',
                'stock' => 'nullable|integer'
            ],
            [
                'name.required' => 'กรุณากรอกชื่อเมนู',
                'name.max:255' => 'ชื่อเมนูไม่เกิน 255 ตัวอักษร'
            ]
        );

        $menu = Menu::findOrFail($id);
    
        if ($request->hasFile('image')) {
            if ($menu->menuimage != 'img/menus/emptymenu.jpg' && file_exists(public_path($menu->menuimage))) {
                unlink(public_path($menu->menuimage));
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/menus'), $filename);
            $menu->menuimage = 'img/menus/' . $filename;
        }
    
        $menu->update([
            'name' => $request->name,
            'menutype_id' => $request->type_id
        ]);
        return redirect('/editmenu')->with('success', 'อัปเดตเมนูเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function page(){
        return view('adminpagetest');
    }
}
