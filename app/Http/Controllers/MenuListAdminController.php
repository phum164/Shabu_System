<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuListAdminController extends Controller
{
    function index(){
        return view("MenuListAdmin");
    }
}
