<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableadminController extends Controller
{
    public function index()
    {
        return view('Table_admin');
    }
}
