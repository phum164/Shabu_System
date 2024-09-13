<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;

    public function listorder(){
        return $this->hasMany(ListOrder::class);
    }
    
    public function menutype(){
        return $this->belongsTo(Menutype::class);
    }

    protected $tabal = 'menus';

    protected $fillable = [
        'name',
        'menutype_id',
        'stock',
        'image'
    ];

}
