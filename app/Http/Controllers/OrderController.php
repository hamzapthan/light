<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
class OrderController extends Controller
{
    public function addOrders(Request $request){
          
       $createOrder = new Order;
       $createOrder->user_id   = $request->user_id;
       $createOrder->pro_id    = $request->pro_id;
       $createOrder->colour    = $request->colour;
       $createOrder->price     = $request->price;
       $createOrder->quantity  = $request->quantity;
       $createOrder->size      = $request->size;
       $createOrder->status    = $request->status;
       $createOrder->save();

       if($createOrder){
        
       $array = [
           [
            "user_id" => "1",
             "fullName" => "hamza",
               "postalCode" => "54000",
               "province" => "jhang",
               "city" => "lahore",
               "status" => "pending"
           ],
           [
            "user_id" => "1",
             "fullName" => "hamza",
               "postalCode" => "54000",
               "province" => "jhang",
               "city" => "lahore",
               "status" => "pending"
           ]


           ];

     foreach($array as $news)
     {
      
        $order_details =  new OrderDetail([
            'user_id'    =>  $news['user_id'],
            'fullName'    =>  $news['fullName'],
            'postalCode'      =>  $news['postalCode'],
            'province'         =>  $news['province'],
            'city'      =>  $news['city'],
            'status'         =>  $news['status']

     ]);
     $createOrder->items()->save($order_details);

     }
    }


       return response()->json(['message'=>'data inserted']);
       }
}
