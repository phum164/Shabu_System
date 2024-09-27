<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListOrder;
use Carbon\Carbon;

class HistoryOController extends Controller
{
    public function index($id)
    {
        $hisorders = ListOrder::where('bill_id',$id)
            ->orderBy('created_at', 'desc')
            ->take(10)->get();
        // dd($hisorders[0]->menu);
        return view('historyoder', compact('hisorders','id'));
    }
}

