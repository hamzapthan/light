<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_id',
        'proName',
        'proDetail',
        'proBrand',
        'quantity',
        'rating',
        'size',
        'image',
        'price',
        'colour', 
        'status'

    ];
}
