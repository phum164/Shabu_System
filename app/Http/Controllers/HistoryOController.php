<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListOrder;
use Carbon\Carbon;

class HistoryOController extends Controller
{
    public function index()
    {
        $hisorders = ListOrder::with('menu')  
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        
        return view('historyoder', compact('hisorders'));
    }
}

