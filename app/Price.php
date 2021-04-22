<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
   protected $fillable =[

    'pro_id',
    'purchaseSmall',
    'purchaseLarge',
    'purchaseMedium',
    'purchaseXl',
    'purchaseXxl',
    'purchaseOther',
    'minSmall',
    'minLarge',
    'minMedium',
    'minXl',
    'minXxl',
    'minOther',
    'maxSmall',
    'maxLarge',
    'maxMedium',
    'maxXl',
    'maxXxl',
    'maxOther',
    'status',
    
   ]; 
}
