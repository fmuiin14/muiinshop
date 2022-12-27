<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'description',
        'photo',
        'stock',
        'size',
        'condition',
        'status',
        'price',
        'discount_price',
        'category_id',
        'brand_id'
    ];
}
