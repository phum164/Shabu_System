<?php

namespace App\Http\Controllers;
use App\Models\Bill;
use Illuminate\Http\Request;

class TotalpriceController extends Controller
{
    public function index()
    {
        
        $totalPrice = Bill::sum('total_pay'); 
        return view('Totalprice', compact('totalPrice'));
    }
}
