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
        'proBrnad',
        'colour',
        'image',
        'proDetail',
        'status',
        'small',
        'medium',
        'large', 
        'xl',
        'xxl',
        'other',
       

    ];
    public function price(){
        return $this->hasOne(Price::class,'pro_id');
    }
}
