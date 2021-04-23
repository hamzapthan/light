<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopenewUsers($query){
        return $query->where('role',0)->where('status',1);
    }




    public function order(){
       return $this->hasMany(Order::class,'user_id');
    }
    public function orders(){
         
         return $this->hasManyThrough(Order::class,Product::class,
           'user_id',  //
           'pro_id',
           'id',
           'id'
    );
    }
    public function scopegetUserData(){
         
        return $this->hasManyThrough(OrderDetail::class,Order::class,
          'user_id',  //
          'order_id',
          'id',
          'id'
   );
}


}
