<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListOrder extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='listsorder';
    public function menu(){
        return $this->belongsTo(Menu::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

        public function bill(){
        return $this->hasMany(Bill::class);
    }

    protected $fillable = [
        'name',
        'menutype_id',
        'stock',
        'image'
    ];

}
