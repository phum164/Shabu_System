<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class menutype extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function menu(){
        return $this->hasMany(Menu::class);
    }

}
