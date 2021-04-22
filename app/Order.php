<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [

        'pro_id',
        'user_id',
        'colour',
        'price',
        'quantity',
        'size',
        'status',
      
       
    ];

    public function items()
    {
        return $this->hasMany(OrderDetail::class);
    }

}
