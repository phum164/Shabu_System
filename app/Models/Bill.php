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
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
