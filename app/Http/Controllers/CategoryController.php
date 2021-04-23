<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function InsertCatPage(){
 
  
    return view('pages.forms.addCategory');
  }
public function addCategory(Request $request){
   
  

  $validate = $this->validate($request, [
    'user_id' => 'required',
    'catName'    => 'required',
    'catDetail'  => 'required',
    'status'  => 'required',
       ]);

if (!$validate) {
  return redirect()->withErrors($validate);
  
           
}else{
  

 $addCategory = Category::updateOrCreate(['id'=>$request->id],[
           'user_id' => $request->user_id,
           'name'    => $request->catName,
           'detail'  => $request->catDetail,
           'status'  => $request->status,
 ]);
     return response()->json(['code'=>200,'message'=>'Data is insertted']);
   }
}



public function showAllCategory(){
  $category = Category::all();
  return view('pages.tables.ShowCat',compact('category'));
}


public function delCategory($id){
  $deleteCat = Category::find($id);
  $deleteCat->delete();
 return response()->json(['code'=>'200','message'=>'Deleted Successfully','deleteCat'=>$deleteCat]);
} 


public function changeCatStatus($id){
  $change_status = Category::find($id);
  $change_status->status = 1;
  $change_status->save();
   return response()->json(['message'=>'successfull','get_vehicle'=>$get_vehicle]);
}

// public function showSoldCars($id){
//   $get_vehicle = Category::where('user_id',$id)->where('status',1)->get();
//    return response()->json(['message'=>'successfull','get_vehicle'=>$get_vehicle]);
// }

public function showCatEdit($id){
 
  $category = Category::find($id);
 
  return view('pages.forms.addCategory',compact('category'));
}
public function showProducts($id,$name){
  $name = $name;
  
  $data = Category::find($id);
   $catProduct = $data->products()->simplePaginate(15);
  
  return view('pages.tables.showPro',compact('catProduct','name'));
}

}
