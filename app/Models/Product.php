<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product_tb';

    protected $fillable = [
        'name_product',
        'merk_product',
        'product_price',
        'product_description',
        'product_photo',
        'product_stock',
    ];

    protected $casts = [
        'product_photo' => 'array', // Foto akan di-cast sebagai array
    ];
}
