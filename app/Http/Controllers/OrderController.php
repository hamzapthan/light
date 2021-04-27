<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Order;
use App\NewOrder;
use App\Product;
use App\OrderDetail;
use App\OrderItem;

class OrderController extends Controller
{
    public function addOrders(Request $request){
         
       $createOrder = new NewOrder;
       $createOrder->user_id   = $request->user_id;
       $createOrder->payment_status    = $request->payment_status;
       $createOrder->payment_method     = $request->payment_method;
       $createOrder->first_name  = $request->first_name;
       $createOrder->last_name      = $request->last_name;
       $createOrder->address    = $request->address;
       $createOrder->city     = $request->city;
       $createOrder->country  = $request->country;
       $createOrder->post_code      = $request->post_code;
       $createOrder->phone_number    = $request->phone_number;
       $createOrder->notes    = $request->notes;
       $createOrder->save();
      
    
       if($createOrder){
        
       $items = [
           [
         
          
               "pro_id" => "13",
               "quantity" => "2",
               "price" => "100",
             
           ],
          

           ];

           foreach ($items as $item)
           {
             
               $product = Product::where('id', $item['pro_id'])->first();
        
               $orderItem = new OrderItem([
                   'pro_id'    =>  $product->id,
                   'quantity'      =>  $item['quantity'],
                   'price'         =>  $item['price'],
                   'status'         =>  0
               ]);
            
               $createOrder->items()->save($orderItem);
           }

    }


       return response()->json(['message'=>'data inserted']);
       }

       public function OrderDetail($id){
            $order = NewOrder::find($id);
            $orderDetail = $order->OrderDetails($id)->get();
           
        
          return view('pages.tables.ShowOrder',compact('orderDetail','order'));
       
        }
       public function orderDelivered($id){
         $order = OrderDetail::OrderDeliver($id);
         return back()->with(['message'=>'data updates']);
        }
     
}
