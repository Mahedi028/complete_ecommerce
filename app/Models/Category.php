<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $table='categories';

    protected $guarded=[];

    protected static function boot()
    {
        parent::boot();

        static::creating(function($category){
            $category->slug=str_slug($category->name);
        });
    }

    public function parent_category()
    {
        return $this->belongsTo(Category::class);
    }

    public function child_category()
    {
        return $this->hasMany(Category::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
