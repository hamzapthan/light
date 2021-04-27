<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewOrder extends Model
{
    use HasFactory;

    protected $fillable = [

        
        'user_id',
        'payment_status',
        'payment_method',
        'first_name',
        'last_name',
        'address',
        'city',
        'country',
        'post_code',
        'phone_number',
        'notes'
       ];
    
    
     
       public function scopeitems()
       {
           return $this->hasMany(OrderItem::class,'order_id','id');
       }
    
       public function scopeActive($query)
    {
        return $query->where('status', 0);
    }
    /////////////////////
    
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
