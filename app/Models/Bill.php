<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    public function table(){
        return $this->belongsTo(Table::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function listorder(){
        return $this->hasMany(ListOrder::class);
    }
}
