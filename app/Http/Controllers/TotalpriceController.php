<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class TotalpriceController extends Controller
{
    public function index()
    {
        $bills = Bill::all();
        
        return view('Totalprice', compact('bills'));
    }
}


