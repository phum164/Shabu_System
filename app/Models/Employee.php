<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function position(){
        return $this->belongsTo(Position::class);
    }

    public function bill(){
        return $this->hasMany(Bill::class);
    }

    public function listoder(){
        return $this->hasMany(ListOrder::class);
    }

}
