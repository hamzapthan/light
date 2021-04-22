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
     $colours = json_encode($colour);
    
     $cat_id =$request->cat_id; 
     
      $proName =$request->proName; 
      $proBrand = $request->proBrand;
      
      $proDetail = $request->proDetail;
      $status = $request->status;
      //
      $purchaseSmall = $request->purchaseSmall;    /// image is miggaing
      $minSmall = $request->minSmall;
      $maxSmall = $request->maxSmall;
      $quantitySmall = $request->quantitySmall;
      //
      $purchaseLarge = $request->purchaseLarge;   
      $minLarge = $request->minLarge;
      $maxLarge = $request->maxLarge;
      $quantityLarge = $request->quantityLarge;
      
      ////
      $purchaseMedium = $request->purchaseMedium;   
      $minMedium = $request->minMedium;
      $maxMedium = $request->maxMedium;
      $quantityMedium = $request->quantityMedium;
      
      ////
      $purchaseXl = $request->purchaseXl;   
      $minXl = $request->minXl;
      $maxXl = $request->maxXl;
      $quantityXl = $request->quantityXl;
      
      ////
      $purchaseXxl = $request->purchaseXxl;   
      $minXxl = $request->minXxl;
      $maxXxl = $request->maxXxl;
      $quantityXxl = $request->quantityXxl;
      
      ////quantityXxl
      $purchaseOther = $request->purchaseOther;   
      $minOther = $request->minOther;
      $maxOther = $request->maxOther;
      $quantityOther = $request->quantityOther;
      
      ////
      $metaKeyword = $request->metaKeyword;   
      $metaTitle = $request->metaTitle;
      $metaDesc = $request->metaDesc;
      
      
    
     
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
               'colour'  => $colours,
               'image' => $images,
               'proDetail'    => $proDetail,
               'status'  => $status,
               'small'  => $quantitySmall,
               'medium'    => $quantityMedium,
               'large'  => $quantityLarge,
               'xl'  => $quantityXl,
               'xxl'    => $quantityXxl,
               'other'  => $quantityOther,
               'metaTitle'  => $metaTitle,
               'metaDesc'    => $metaDesc,
               'metaKeyword'  => $metaKeyword,
             

     ]);
    $lastInsert = $addCategory->id;
    
    $addCategory = Price::updateOrCreate(['pro_id'=>$request->id],[
      'pro_id' => $lastInsert,
      'purchaseSmall'    => $purchaseSmall,
      'purchaseMedium'  => $purchaseMedium,
      'purchaseLarge'  => $purchaseLarge,
      'purchaseXl' => $purchaseXl,
      'purchaseXxl'    => $purchaseXxl,
      'purchaseOther'  => $purchaseOther,
         //
         'minSmall'    => $minSmall,
         'minMedium'  => $minMedium,
         'minLarge'  => $minLarge,
         'minXl' => $minXl,
         'minXxl'    => $minXxl,
         'minOther'  => $minOther,
         //max price
         'maxSmall'    => $maxSmall,
         'maxMedium'  => $maxMedium,
         'maxLarge'   => $maxLarge,
         'maxXl'      => $maxXl,
         'maxXxl'    => $maxXxl,
         'maxOther'  => $maxOther,
        'status'=>1
]);
         return redirect()->back()->with(['success'=>'Data created successfullt']);
       }
    
    
    
    
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
       $price = Product::find($id)->price;
      
       return view('pages.forms.addProduct',compact('findProduct','catPro','price'));
    }
    
}
