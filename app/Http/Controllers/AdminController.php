<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('home_admin');
    }

    public function editmenu(){
        return view('edit_menu');
    }
}
