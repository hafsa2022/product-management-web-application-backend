<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
        protected $fillable = [
        'name',
        'description',
        'price',
        'size',
        'type',
        'image',
        'stock_quantity',
        'user_id',
    ];
}
