<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;
    protected $fillable = [
        'collectionDate',
        'deliveryDate',
        'status',
    ];
    
    public function scopedateDetail(){
       return  $this->hasMany(DateDetail::class,'date_id','id');
    }
}
