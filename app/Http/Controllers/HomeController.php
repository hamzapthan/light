<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
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
       
       $countOrder   = Order::all()->count();
       $countProduct   = Product::all()->count();
      
       $getOrder = User::join('orders','users.id','=','orders.user_id')
                    ->orderBy('orders.created_at','desc')
                  ->get(['users.*','orders.*']);
            
          $totalSale = Order::getAllAmount()->sum('price');
        return view('dashboard',compact('countUser','countOrder','countProduct','getOrder','totalSale'));
       
    }
}
