<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;
use Livewire\Attributes\Validate;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::all();
        return view('/editsarary',compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $positions = Position::all();
        return view('#',compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ],[
            
        ]);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'sarary' => 'required|numeric|min:0',
        ], [
            'sarary.required' => 'กรุณาระบุเงินเดือน',
            'sarary.numeric' => 'เงินเดือนต้องเป็นตัวเลข',
            'sarary.min' => 'เงินเดือนไม่สามารถต่ำกว่า 0',
        ]);

        $position = Position::find($id);
        $newsarary = $request->sarary;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
