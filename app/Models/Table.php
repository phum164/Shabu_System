<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Type\Integer;

class Table extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function bill(){
        return $this->hasMany(Bill::class);
    }
    protected $fillable = [
        'status'
    ];

    public static function status($id, $status){
        $table = self::find($id);
        // ตรวจสอบว่าพบ table หรือไม่
        if (!$table) {
            return false;
        }
        $table->status = $status;
        $table->save();
        return $table;
    }
}
