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

    

    public function scopeActive($query)
    {
        return $query->where('status', 0);
    }
    /////////////////////
    public function scopeitems()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function scopeOrderDetails($query,$id)
    {
        return $query->items()->where('order_id',$id)->orderBy('id','desc');
    }
///////////////////////
     public function scopeUserAllOrder($query,$id){

        //  return $this->hasManyThrough()

        return $query->items()->where('order_id',$id);
     }
     
     public function scopeLinks(){
       
        return $this->hasMany(OrderDetail::class);
     }
     public function scopegetAllAmount($query){
       
        return $query->where('status',1);
     }

    




}
