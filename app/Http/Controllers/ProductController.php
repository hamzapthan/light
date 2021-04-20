<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function InsertProPage(){
 
         $catPro = Category::all();
         
        return view('pages.forms.addProduct',compact('catPro'));
      }
    public function addProducts(Request $request){
       
      
      $a =array( 
      $small = $request->small,
      $medium = $request->medium,
      $large = $request->large,
      $xl = $request->xl,
      $xxl = $request->xxl,
      $xxl = $request->other
      
    );
     
      //$array = json_encode($small);
     // print_r($array); 
     $size = (array_values(array_filter($a))); 
    //$size = array_filter($a,'strlen');
     //$size =  array_filter($a);  
     
     $array = json_encode($size);
     
       
   
    
    //   // $validate = $this->validate($request, [
    //   //   'user_id' => 'required',
    //   //   'catName'    => 'required',
    //   //   'catDetail'  => 'required',
    //   //   'status'  => 'required',
    //   //      ]);
    
    // if (!$validate) {
    //   return redirect()->withErrors($validate);
               
    // }else{
      
    
      foreach($request->file('file') as $image)
        {
            $imageName=$image->getClientOriginalName();
            $image->move(public_path().'/images/', $imageName);  
            $fileNames[] = $imageName;
        }
        $images = json_encode($fileNames);
    
     $addCategory = Product::updateOrCreate(['id'=>$request->id],[
               'cat_id' => $request->cat_id,
               'proName'    => $request->proName,
               'proDetail'  => $request->proDetail,
               'proBrand'  => $request->proBrand,
               'quantity' => $request->quantity,
               'rating'    => 0,
               'size'  => $array,
               'image'  => $images,
               'colour'    => $request->colour,
               'status'  => $request->status,
               'price'  => $request->price,

     ]);
         return response()->json(['code'=>200,'message'=>'Data is insertted']);
       }
    //}
    
    
    
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
