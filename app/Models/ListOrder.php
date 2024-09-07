<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListOrder extends Model
{
    use HasFactory;

    public function menu(){
        return $this->belongsTo(Menu::class);
    }

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function table(){
        return $this->belongsTo(Table::class);
    }

}
