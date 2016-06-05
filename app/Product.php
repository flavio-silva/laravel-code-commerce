<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'category_id', 'price', 'featured', 'recommend'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
