<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Orders extends Model
{
    use HasFactory;

     protected $fillable = [
        'total','quantity','reference','tracking', 'table_id','payer_name','payment_method','email'
    ];

     protected $hidden = ['tracking'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(Menu::class);
    }

    public function table(): HasOne
    {
        return $this->hasOne(Table::class);
    }

    public static function totalAmount(){
        return self::all()->sum('total');
    }

    public static function totalQueuedOrders(){
        return self::where('tracking',0)->count();
    }

    public static function totalProcessingOrders(){
        return self::where('tracking',1)->count();
    }

    public static function totalCanceledOrders(){
        return self::where('tracking',3)->count();
    }

    public static function totalCompletedOrders(){
        return self::where('tracking',2)->count();
    }
}
