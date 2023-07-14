<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
     
    ];



    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_items', 'product_id', 'cart_id')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
