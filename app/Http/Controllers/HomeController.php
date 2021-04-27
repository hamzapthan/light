<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\NewOrder;
use App\OrderItem;
use App\Product;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countUser = User::newUsers()->count();
       
       $countOrder   = NewOrder::all()->count();
       $countProduct   = Product::all()->count();
      
       $getOrder = User::join('new_orders','users.id','=','new_orders.user_id')
                    ->orderBy('new_orders.created_at','desc')
                  ->get(['users.*','new_orders.*']);
            
          $totalSale = OrderItem::all()->sum('price');
         
        return view('dashboard',compact('countUser','countOrder','countProduct','getOrder','totalSale'));
       
    }
}
