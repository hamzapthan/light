<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'detail',
        'status'
    ];
    public function products(){
        return $this->hasMany(Product::class,'cat_id');
    }
}
