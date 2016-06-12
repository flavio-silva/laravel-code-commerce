<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = ['product_id', 'extension', 'name'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
