<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'fullName',
        'postalCode',
        'province',
        'city',
        'status',
    ];
    public function scopeOrderDeliver($query,$id){
        return $query->where('id','=', $id)->update(['status'=>1]);
        
     }
}
