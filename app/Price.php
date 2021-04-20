<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
   protected $fillable =[

    'pro_id',
    'priceSmall',
    'priceLarge',
    'priceMedium',
    'priceXl',
    'priceXxl',
    'priceOther',
    'status',
    
   ]; 
}
