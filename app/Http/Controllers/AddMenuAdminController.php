<?php

namespace App\Http\Controllers;
use App\Models\menutype;
use Illuminate\Http\Request;

class AddMenuAdminController extends Controller
{
    function index()
    {
        $types = menutype::all();
        return view('AddMenuAdmin', compact('types'));
    }
}
