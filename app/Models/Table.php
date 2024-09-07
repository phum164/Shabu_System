<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    public function bill(){
        return $this->hasMany(Bill::class);
    }

    public function listorder(){
        return $this->hasMany(ListOrder::class);
    }
}
