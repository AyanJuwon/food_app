<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    // protected $fillable = ['quantity'];

    /**
     * Searchable rules.
     *
     * @var array
     */
     protected $fillable = ['menu_name', 'menu_price','menu_description', 'menu_image', 'category'];
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'menus.name' => 10,
        ],
    ];
   public function orders()
{
    return $this->belongsToMany(Order::class);
}
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}