<?php

namespace App\Http\Controllers;
use App\Models\menu;
use App\Models\menutype;
use App\Models\ListOrder;
use Illuminate\Http\Request;


class OrderfoodController extends Controller
{
    public function index(Request $request)
    {
        $typeId = $request->input('id'); 
    
        if ($typeId) {
            $menus = Menu::where('menutype_id', $typeId)->get(); 
        } else {
            $menus = Menu::all(); 
        }
    
        $menuTypes = MenuType::all(); 
    
        return view('Orderfood', [
            'menus' => $menus, 
            'menuTypes' => $menuTypes,
            'selected' => $typeId 
        ]);
    }




}
