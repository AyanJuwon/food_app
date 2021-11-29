<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

     protected $fillable = [
        'name','total','quantity','payment_id','tracking'
    ];

     protected $hidden = ['tracking'];
     
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function menus()
    {
        return $this->belongsToMany('App\Models\Menu')->withPivot('quantity');
    }

    public function table()
    {
        return $this->hasOne('App\Models\Table');
    }
}