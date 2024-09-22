<?php

namespace App\Http\Controllers;
use App\Models\Table;
use App\Models\Bill;
use Illuminate\Http\Request;

class ManageTableAdminController extends Controller
{ 
    function index(){
        $peopleCount = [1 => 2, 2 => 4, 3 => 3, 4 => 5, 5 => 4, 6 => 6, 7 => 2, 8 => 8];
    $timeRemaining = [1 => "1:59:59", 2 => "0:00:00", 3 => "0:45:30", 4 => "0:00:00", 5 => "1:15:10", 6 => "0:00:00", 7 => "1:30:50", 8 => "0:00:00"];
        $tables = Table::all();
        return view("ManageTableAdmin", compact('tables','peopleCount','timeRemaining'));
    }
    public function showTableStatus()
{
    $peopleCount = [1 => 2, 2 => 4, 3 => 3, 4 => 5, 5 => 4, 6 => 6, 7 => 2, 8 => 8];
    $timeRemaining = [1 => "1:59:59", 2 => "0:00:00", 3 => "0:45:30", 4 => "0:00:00", 5 => "1:15:10", 6 => "0:00:00", 7 => "1:30:50", 8 => "0:00:00"];

    return view('ManageTableAdmin', compact('peopleCount', 'timeRemaining'));
}
}
