<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    public function InsertProPage(){
 
         $catPro = Category::all();
         
        return view('pages.forms.addProduct',compact('catPro'));
      }
    public function addProducts(Request $request){
        
      $colours = $request->colour;
     $data = array(
        $colours
     );
    
     $colour =   str_replace(' ',',',$data);
     $co = json_encode($colour);
    
     $cat_id =$request->cat_id; 
     
      $proName =$request->proName; 
      $proBrand = $request->proBrand;
      
      $proDetail = $request->proDetail;
      $status = $request->status;
      //
      $small = $request->small;    /// image is miggaing
      $quantitySmall = $request->quantitySmall;
      $priceSmall = $request->priceSmall;
      //
      $medium = $request->medium; 
      $quantityMedium = $request->quantityMedium;
      $priceMedium = $request->priceMedium; 
      //
      $large = $request->large; 
      $quantityLarge = $request->quantityLarge;
      $priceLarge = $request->priceLarge;
      //
      $xl = $request->xl; 
      $quantityxl = $request->quantityxl;
      $priceXl = $request->priceXl;
      //
      $xxl = $request->xxl; 
      $quantityXxl = $request->quantityXxl;
      $priceXxl = $request->priceXxl;
      //quantityXxl
      $other = $request->other; 
      $quantityOther = $request->quantityOther;
      $priceOther = $request->priceOther;
     //
      
      
      
    
     
    //   //$array = json_encode($small);
    //  // print_r($array); 
    //  $size = (array_values(array_filter($a))); 
    // //$size = array_filter($a,'strlen');
    //  //$size =  array_filter($a);  
     
    //  $array = json_encode($size);
     
       
   
    
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
             $data = url('images/'.$imageName);   
              
            $fileNames[] = $data; 
        }
       
        $images = json_encode($fileNames);
    
        
     $addCategory = Product::updateOrCreate(['id'=>$request->id],[
               'cat_id' => $cat_id,
               'proName'    => $proName,
               'proBrnad'  => $proBrand,
               'colour'  => $co,
               'image' => $images,
               'proDetail'    => $proDetail,
               'status'  => $status,
               'small'  => $quantitySmall,
               'medium'    => $quantityMedium,
               'large'  => $quantityLarge,
               'xl'  => $quantityxl,
               'xxl'    => $quantityXxl,
               'other'  => $quantityOther,
             

     ]);
    $lastInsert = $addCategory->id;
    
    $addCategory = Price::updateOrCreate(['id'=>$request->id],[
      'pro_id' => $lastInsert,
      'priceSmall'    => $priceSmall,
      'priceLarge'  => $priceLarge,
      'priceMedium'  => $priceMedium,
      'priceXl' => $priceXl,
      'priceXxl'    => $priceXxl,
      'priceOther'  => $priceOther,
      'status'  => 1,
     
    

]);
         return response()->json(['code'=>200,'message'=>'Data is insertted']);
       }
    //}
    
    
    
    public function showAllProduct(){
      $product = Product::all();
     
      
      return view('pages.tables.ShowPro',compact('product'));
    }
    
    
    public function delProduct($id){

      $deletePro = Product::find($id);
     $image  =  $deletePro->image;
    
      $imgWillDelete = public_path() . '/images/'.$image;
           
      File::delete($imgWillDelete);
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
      
       $price =   Price::where('pro_id',$id)->get();
           
      return view('pages.tables.ShowSinglePro',compact('singlePro','price'));
    }
    
    public function editProducts($id){
       $findProduct = Product::find($id);
          
       $catPro = Category::all();
       
       return view('pages.forms.addProduct',compact('findProduct','catPro'));
    }
    
}
