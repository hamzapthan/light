<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   
public function addCategory(Request $request){
  

  $validate = $this->validate($request, [
    'user_id' => 'required',
    'name'    => 'required',
    'detail'  => 'required',
       ]);

if (!$validate) {
  return redirect()->withErrors($validate);
           
}else{
  

 $addCategory = new Category;
 $addCategory->user_id = $request->user_id;
 $addCategory->name = $request->name;
 $addCategory->detail = $request->detail;
 $addCategory->status = 0;
 $addCategory->save();

return view('pages.forms.AddCategory');
   }
}
//show all
public function showAllCategory(){
  $category = Category::all();
  return view('pages.tables.ShowCategory',compact('category'));
}

public function delCategory($id){
  $deleteCat = Category::find($id);
  $deleteCat->delete();
 return response()->json(['code'=>'200','message'=>'Deleted Successfully','deleteCat'=>$deleteCat]);
} 

public function changeCatStatus($id){
  $change_status = Category::find($id);
  $get_vehicle->status = 1;
  $get_vehicle->save();
   return response()->json(['message'=>'successfull','get_vehicle'=>$get_vehicle]);
}

public function showSoldCars($id){
  $get_vehicle = ManageStock::where('user_id',$id)->where('status',1)->get();
   return response()->json(['message'=>'successfull','get_vehicle'=>$get_vehicle]);
}

}
