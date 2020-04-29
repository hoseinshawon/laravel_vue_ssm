<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product){
            $product->slug = str_slug($product->title);
        });
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
