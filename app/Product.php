<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id', 'name', 'sku', 'decription', 'price', 'stock', 'category_id',
    ];
}
