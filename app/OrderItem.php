<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
      
        'order_id',
        'pro_id',
        'quantity',
        'price',
        'status'
     
    ];
    public function scopeOrderDeliver($query,$id){
        return $query->where('id','=', $id)->update(['status'=>1]);
        
     }
     public function scopeOrderProducts(){
        return $this->belongsTo(Product::class);
        }
     
}
