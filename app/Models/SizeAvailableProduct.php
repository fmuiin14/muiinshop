<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeAvailableProduct extends Model
{
    use HasFactory;

    protected $table = 'size_products_available';

    protected $guarded = [];
}
