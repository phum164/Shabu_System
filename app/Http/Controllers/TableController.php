<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use Illuminate\Support\Facades\Auth;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::all();
        return view('table_admin', compact('tables'));
    }
    public function manage($id)
    {
        
        $employee = Auth::user();   
        $tables = Table::with('bill')->get(); // ดึงข้อมูลโต๊ะพร้อมบิล
        
        // ตรวจสอบว่ามีการเรียกดูโต๊ะที่ถูกต้อง
        $selectedTable = Table::with('bill')->findOrFail($id);

        return view('managetableadmin', compact('tables', 'selectedTable', 'employee'));
    }
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        //
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
    public static function addbill($id)
    {
        $table = Table::find($id);
        $table->update([
            'status' => 0,
        ]);
    }

    public static function finsbill($id)
    {
        $table = Table::find($id);
        $table->update([
            'status' => 1,
        ]);
    }

    public static function fixtable($id)
    {
        $table = Table::find($id);
        $table->update([
            'status' => 2,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, string $id)
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
