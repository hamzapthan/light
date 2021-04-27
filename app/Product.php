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
        'metaTitle',
        'metaDesc',
        'metaKeyword'
         ];
   
     public function price(){
        return $this->hasOne(Price::class,'pro_id');
    }

   
     public function scopeChangeStatus($query,$id){
        return $query->where('id', $id)->update(['status'=>0]);
    }

    public function scopeOrderItems(){
        return $this->hasMany(OrderItem::class,'pro_id','id');
    }

     
}
