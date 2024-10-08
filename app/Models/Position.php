<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'salary' // เพิ่มฟิลด์ salary ลงใน fillable เพื่ออนุญาต Mass Assignment
    ];

    public function user(){
        return $this->hasMany(User::class);
    }

}
