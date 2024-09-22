<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class menu extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function listorder(){
        return $this->hasMany(ListOrder::class);
    }
    
    public function menutype(){
        return $this->belongsTo(Menutype::class,'menutype_id');
    }

    protected $tabal = 'menus';

    protected $fillable = [
        'name',
        'menutype_id',
        'stock',
        'image'
    ];

}
