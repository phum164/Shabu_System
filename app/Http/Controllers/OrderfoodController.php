<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderfoodController extends Controller
{
    public function index()
    {
        return view('Orderfood_user');
    }
}
