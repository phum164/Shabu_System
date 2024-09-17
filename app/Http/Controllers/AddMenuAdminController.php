<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddMenuAdminController extends Controller
{
    function index(){
        return view("AddMenuAdmin");
    }
}
