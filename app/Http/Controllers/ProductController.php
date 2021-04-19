<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function InsertProPage(){
 
  
        return view('pages.forms.addProduct');
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
      
    
     $addCategory = Product::updateOrCreate(['id'=>$request->id],[
               'user_id' => $request->user_id,
               'name'    => $request->catName,
               'detail'  => $request->catDetail,
               'status'  => $request->status,
     ]);
         return response()->json(['code'=>200,'message'=>'Data is insertted']);
       }
    }
    
    
    
    public function showAllProduct(){
      $product = Product::all();
     
      $cat_id =  $product->cat_id;
      
      return view('pages.tables.ShowPro',compact('product'));
    }
    
    
    public function delProduct($id){
      
      $deletePro = Product::find($id);
      $deletePro->delete();
     return response()->json(['code'=>'200','message'=>'Deleted Successfully']);
    } 
    
    
    public function changeCatStatus($id){
      $change_status = Product::find($id);
      $change_status->status = 1;
      $change_status->save();
       return response()->json(['message'=>'successfull','get_vehicle'=>$get_vehicle]);
    }
    
    // public function showSoldCars($id){
    //   $get_vehicle = Category::where('user_id',$id)->where('status',1)->get();
    //    return response()->json(['message'=>'successfull','get_vehicle'=>$get_vehicle]);
    // }
    
    public function showCatEdit($id){
     
      $category = Product::find($id);
     
      return view('pages.forms.addCategory',compact('category'));
    }
    public function showSingleProduct($id){
     
      $singlePro = Product::find($id);
     
      return view('pages.tables.ShowSinglePro',compact('singlePro'));
    }
    
    
}
