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
}
