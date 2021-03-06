<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = ['table_name'];

    public function order()
    {
        return $this->belongsTo('App\Models\Orders');
    }

    public static function totalTables(){
        return self::all()->count();
    }
}
