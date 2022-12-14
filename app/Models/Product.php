<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\Category;
class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded=[];

    protected static function boot()
    {
        parent::boot();

        static::creating(function($product){
            $product->slug=str_slug($product->title);
        });
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }








}
