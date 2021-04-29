<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'date_id',
        'collectionDate',
        'DeliveryDate',
        'status',
    ];
}
