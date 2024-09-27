<?php

namespace App\Http\Controllers;
use App\Models\menu;
use App\Models\menutype;
use App\Models\ListOrder;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Models\Table; 
use App\Models\Bill; 



class OrderfoodController extends Controller
{
    public function index(Request $request,$id)
    {
        $typeId = $request->input('id');
    
        if ($typeId) {
            $menus = Menu::where('menutype_id', $typeId)->get(); 
        } else {
            $menus = Menu::all(); 
        }
    
        $menuTypes = MenuType::all(); 
        $bill = Bill::find($id);
        $table = Table::find($bill->table_id); 
        
        return view('Orderfood', [
            'menus' => $menus, 
            'menuTypes' => $menuTypes,
            'selected' => $typeId, 
            'table' => $table,
            'bill' => $bill,
            'id'  => $id,
        ]);
    }
    
}
