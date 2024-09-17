<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageTableAdminController extends Controller
{
    function index(){
        return view("ManageTableAdmin");
    }
}
