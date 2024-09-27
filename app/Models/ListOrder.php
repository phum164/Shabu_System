<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListOrder extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'listsorders';
    public function menu(){
        return $this->belongsTo(Menu::class,'menu_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'employee_id');
    }

        public function bill(){
        return $this->belongsTo(Bill::class,'bill_id');
    }
   
    protected $fillable = [
        'name',
        'menutype_id',
        'stock',
        'image'
    ];

}
