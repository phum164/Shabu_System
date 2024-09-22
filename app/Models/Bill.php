<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use HasFactory;
    use SoftDeletes;

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
