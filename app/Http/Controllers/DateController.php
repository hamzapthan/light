<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use App\Date;
use App\DateDetail;

class DateController extends Controller
{
    public function showDateInsert(){
       $time = Collection::all();
        return view('pages.forms.addDate',compact('time'));
    }

    public function dateInsert(Request $request){
    
        $input = $request->all();
     
       $monday = $input['monday'];
     
       $mondayde = $input['mondayde'];
      

        $countpickup  = count($monday);
         $countdelivery =  count($mondayde); 

         $array_differencr = array_diff($monday,$mondayde);
        $countdifferencr = count($array_differencr);
         print_r($countdifferencr);  
         
      
        
         
         for($i = 0; $i<$countdifferencr; $i++){
           array_push($mondayde,"0");
    
            
         }
        $monk = $mondayde;
   
       $date = new Date;
        $date->collectionDate   = $request->monCoDate;
        $date->deliveryDate   = $request->monDeDate;
        $date->status    = 1;
        $date->save();
      
       if($date){
      
        foreach(array_combine($monday, $monk) as $code => $name){
         $date_table = Date::find($date->id);
        
         $date_details = new DateDetail([
            'collectionDate'    =>  $code,
            'DeliveryDate'    =>  $name,
            'status'         =>  1
        ]);
       $date->dateDetail()->save($date_details);
      }
      
       return response()->json(['message'=>'data inserted']);
    }
       
       
       
     }
}
