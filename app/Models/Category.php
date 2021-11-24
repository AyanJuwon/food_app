<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CategoriesController;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
     protected $fillable = ['name'];
        protected $guarded = [];

    protected $table = 'categories';

    public function menus()
    {
        return $this->belongsToMany(App\Models\Menu::class);
    }

    
    public function menu()
    {
        return $this->hasMany(App\Models\Menu::class);
    }
}