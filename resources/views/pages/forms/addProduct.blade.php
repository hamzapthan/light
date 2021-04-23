@extends('layout.master')

@section('content')
@if(isset($findProduct,$catPro,$price))

<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Edit Category</a></li>
    <li class="breadcrumb-item active" aria-current="page">Basic Elements</li>
  </ol>
</nav>
<style>
.center {
  margin: auto;
  width: 100%;
 
}
</style>
<div class="row center" >
  <div class="col-md-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Basic Form</h6>
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

       <form class="forms-sample" method="post" action="{{route('insert.pro')}}" enctype="multipart/form-data">
        @csrf
       
        @if ($message = Session::get('error'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('message'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
        <div class="form-group">
          <label>Choose Category</label>
          
          <select class="form-control form-control-lg"  name="cat_id" > 
          @foreach($catPro as $categories)
           
            <option value="{{$categories->id}}">{{$categories->name}}</option>
            @endforeach  
          </select>
         
        </div>
          <div class="form-group">
            <label for="exampleInputUsername1">Product Name</label>
            <input type="text" class="form-control" id="catName" name="proName" {{ $errors->has('proName') ? 'error' : '' }} autocomplete="off" value="{{$findProduct->proName}}">
          </div>
        
          <div class="form-group">
            <label for="exampleInputUsername1">Product Brand</label>
            <input type="text" class="form-control" id="catName" name="proBrand" autocomplete="off" value="{{$findProduct->proBrnad}}">
          </div>
          
          <div class="form-group">
            <label for="exampleInputEmail1">Colour</label>
            <?php  $colour = $findProduct['colour'];
 $array = json_decode($colour);
 $colours = implode("  ", $array);
$colourss =   str_replace(',',' ',$colours);
   


?>

            <input type="text" class="form-control" id="catDetail"  name="colour" value="{{$colourss}}">
          </div>
      
          <div class="form-group">
          <label for="exampleInputEmail1">Small</label><br>
         
           
           
           <div class="row">
           <div class="col-md-3">
          <label for="">Quantity</label>
          <input type="number" class="form-control"  name="quantitySmall"  value="{{$findProduct->small}}" >
          </div>
           <div class="col-md-3">
          <label for="">Purchase Price</label>
          <input type="number" class="form-control" name="purchaseSmall" value="{{$price['purchaseSmall']}}" >
          </div>
          <div class="col-md-3">
          <label for="">Sale Price</label>
          <input type="number" class="form-control" name="minSmall" value="{{$price['minSmall']}}">
          </div>
          <div class="col-md-3">
          <label for="">  Discount Price</label>
          <input type="number" class="form-control" name="maxSmall" value="{{$price['maxSmall']}}">
          </div>
          </div>
         </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Medium</label><br>
          <div class="row">
          <div class="col-md-3">
          <label for="">Quantity</label>
          <input type="number" class="form-control"  name="quantityMedium"  value="{{$findProduct->medium}}">
          </div>
           <div class="col-md-3">
          <label for="">Purchase Price</label>
          <input type="number" class="form-control"  name="purchaseMedium" value="{{$price['purchaseSmall']}}">
          </div>
          <div class="col-md-3">
          <label for="">Sale Price</label>
          <input type="number" class="form-control" name="minMedium" value="{{$price['minMedum']}}">
          </div>
          <div class="col-md-3">
          <label for="">Discount Price</label>
          <input type="number" class="form-control" value="{{$price['maxMedium']}}" name="maxMedium">
          </div>
          </div>
         </div>

         <div class="form-group">
          <label for="exampleInputEmail1">Large</label><br>
          <div class="row">
          <div class="col-md-3">
          <label for="">Quantity</label>
          <input type="number" class="form-control" value="{{$findProduct->large}}" name="quantityLarge"  >
          </div>
           <div class="col-md-3">
          <label for="">Purchase Price</label>
          <input type="number" class="form-control" value="{{$price['purchaseLarge']}}" name="purchaseLarge">
          </div>
          <div class="col-md-3">
          <label for="">Sale Price</label>
          <input type="number" class="form-control" value="{{$price['minLarge']}}" name="minLarge">
          </div>
          <div class="col-md-3">
          <label for="">Discount Price</label>
          <input type="number" class="form-control" value="{{$price['maxLarge']}}" name="maxLarge">
          </div>
          </div>
         </div>

         <div class="form-group">
          <label for="exampleInputEmail1">Xl</label><br>
          <div class="row">
          <div class="col-md-3">
          <label for="">Quantity</label>
          <input type="number" class="form-control" value="{{$findProduct->xl}}" name="quantityXl" >
          </div>
           <div class="col-md-3">
          <label for="">Purchase Price</label>
          <input type="number" class="form-control" value="{{$price['purchaseXl']}}" name="purchaseXl">
          </div>
          <div class="col-md-3">
          <label for="">Sale Price</label>
          <input type="number" class="form-control" value="{{$price['minXl']}}" name="minXl">
          </div>
          <div class="col-md-3">
          <label for="">Discount Price</label>
          <input type="number" class="form-control" value="{{$price['maxXl']}}" name="maxXl">
          </div>
          </div>
         </div>
 
         <div class="form-group">
          <label for="exampleInputEmail1">Xxl</label><br>
          <div class="row">
          <div class="col-md-3">
          <label for="">Quantity</label>
          <input type="number" class="form-control" value="{{$findProduct->xxl}}" name="quantityXxl" >
          </div>
           <div class="col-md-3">
          <label for="">Purchase Price</label>
          <input type="number" class="form-control" value="{{$price['purchaseXxl']}}" name="purchaseXxl">
          </div>
          <div class="col-md-3">
          <label for="">Sale Price</label>
          <input type="number" class="form-control" value="{{$price['minXxl']}}" name="minXxl">
          </div>
          <div class="col-md-3">
          <label for="">Discount Price</label>
          <input type="number" class="form-control" value="{{$price['maxXxl']}}" name="maxXxl">
          </div>
          </div>
         </div>

         <div class="form-group">
          <label for="exampleInputEmail1">Other</label><br>
          <div class="row">
          <div class="col-md-3">
          <label for="">Quantity</label>
          <input type="number" class="form-control" value="{{$findProduct->other}}" name="quantityOther" >
          </div>
           <div class="col-md-3">
          <label for="">Purchase Price</label>
          <input type="number" class="form-control" value="{{$price['purchaseOther']}}" name="purchaseOther">
          </div>
          <div class="col-md-3">
          <label for="">Sale Price</label>
          <input type="number" class="form-control" value="{{$price['minOther']}}" name="minOther">
          </div>
          <div class="col-md-3">
          <label for="">Discount Price</label>
          <input type="number" class="form-control" value="{{$price['maxOther']}}" name="maxOther">
          </div>
          </div>
         </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Product Details</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="proDetail"></textarea>
          </div>
          <div class="form-group">
            <label>File upload</label>
            <input type="file" name="file[]"  accept="image/*" multiple="multiple" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
              </span>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Meta Keyword</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="metaKeyword" value="{{$findProduct->metaKeyword}}">{{$findProduct->metaKeyword}}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Meta Tttle</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="metaTitle" value="{{$findProduct->metaTitle}}">{{$findProduct->metaTitle}}</textarea>
          </div>
          
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Meta Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="metaDesc" value="{{$findProduct->metaDesc}}">{{$findProduct->metaDesc}}</textarea>
          </div>
         
          <div class="form-group">
          <label>Status</label>
          <select class="form-control form-control-lg" name="status" > 
           @if($findProduct->status == 1)
            <option value="1">Active</option>
            @elseif($findProduct->status == 0)
            <option value="0">In Active</option>
            @elseif($findProduct->status == 2)
            <option value="2">Pending</option>
            @elseif($findProduct->status == 3)
            <option value="3">Silent</option>
            @endif
         
            <option value="0">In Active</option>
            <option value="2">Pending</option>
            <option value="3">Silent</option>
            <option value="1"> Active</option>
          </select>
        </div>
        <input type="hidden" name="id" value="{{$findProduct->id}}">
           
          <button type="submit" class="btn btn-primary mr-2" >Submit</button>
         
        </form>
      </div>
    </div>
  </div>
 
</div>

@elseif(isset($catPro))
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Edit Category</a></li>
    <li class="breadcrumb-item active" aria-current="page">Basic Elements</li>
  </ol>
</nav>
<style>
.center {
  margin: auto;
  width: 100%;
 
}
</style>
<div class="row center" >
  <div class="col-md-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Basic Form</h6>
        <form class="forms-sample" method="post" action="{{route('insert.pro')}}" enctype="multipart/form-data">
        @csrf
        @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
        <div class="form-group">
          <label>Choose Category</label>
          
          <select class="form-control form-control-lg"  name="cat_id" > 
          @foreach($catPro as $categories)
           
            <option value="{{$categories->id}}">{{$categories->name}}</option>
            @endforeach  
          </select>
         
        </div>
          <div class="form-group">
            <label for="exampleInputUsername1">Product Name</label>
            <input type="text" class="form-control" id="catName" name="proName" autocomplete="off" placeholder="Write Any Category Name">
          </div>
        
          <div class="form-group">
            <label for="exampleInputUsername1">Product Brand</label>
            <input type="text" class="form-control" id="catName" name="proBrand" autocomplete="off" placeholder="Write Any Category Name">
          </div>
          
          <div class="form-group">
            <label for="exampleInputEmail1">Colour</label>
            <input type="text" class="form-control" id="catDetail"  name="colour" placeholder="Write Some Details About The Category">
          </div>
      
          <div class="form-group">
          <label for="exampleInputEmail1">Small</label><br>
         
           
           
           <div class="row">
           <div class="col-md-3">
          <label for="">Quantity</label>
          <input type="number" class="form-control" placeholder="Price" name="quantitySmall" >
          </div>
           <div class="col-md-3">
          <label for="">Purchase Price</label>
          <input type="number" class="form-control" placeholder="Quantity" name="purchaseSmall" >
          </div>
          <div class="col-md-3">
          <label for="">Sale Price</label>
          <input type="number" class="form-control" placeholder="Price" name="minSmall">
          </div>
          <div class="col-md-3">
          <label for="">  Discount Price</label>
          <input type="number" class="form-control" placeholder="Price" name="maxSmall">
          </div>
          </div>
         </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Medium</label><br>
          <div class="row">
          <div class="col-md-3">
          <label for="">Quantity</label>
          <input type="number" class="form-control" placeholder="Price" name="quantityMedium" >
          </div>
           <div class="col-md-3">
          <label for="">Purchase Price</label>
          <input type="number" class="form-control" placeholder="Quantity" name="purchaseMedium">
          </div>
          <div class="col-md-3">
          <label for="">Sale Price</label>
          <input type="number" class="form-control" placeholder="Price" name="minMedium">
          </div>
          <div class="col-md-3">
          <label for="">Discount Price</label>
          <input type="number" class="form-control" placeholder="Price" name="maxMedium">
          </div>
          </div>
         </div>

         <div class="form-group">
          <label for="exampleInputEmail1">Large</label><br>
          <div class="row">
          <div class="col-md-3">
          <label for="">Quantity</label>
          <input type="number" class="form-control" placeholder="Price" name="quantityLarge" >
          </div>
           <div class="col-md-3">
          <label for="">Purchase Price</label>
          <input type="number" class="form-control" placeholder="Quantity" name="purchaseLarge">
          </div>
          <div class="col-md-3">
          <label for="">Sale Price</label>
          <input type="number" class="form-control" placeholder="Price" name="minLarge">
          </div>
          <div class="col-md-3">
          <label for="">Discount Price</label>
          <input type="number" class="form-control" placeholder="Price" name="maxLarge">
          </div>
          </div>
         </div>

         <div class="form-group">
          <label for="exampleInputEmail1">Xl</label><br>
          <div class="row">
          <div class="col-md-3">
          <label for="">Quantity</label>
          <input type="number" class="form-control" placeholder="Price" name="quantityXl" >
          </div>
           <div class="col-md-3">
          <label for="">Purchase Price</label>
          <input type="number" class="form-control" placeholder="Quantity" name="purchaseXl">
          </div>
          <div class="col-md-3">
          <label for="">Sale Price</label>
          <input type="number" class="form-control" placeholder="Price" name="minXl">
          </div>
          <div class="col-md-3">
          <label for="">Discount Price</label>
          <input type="number" class="form-control" placeholder="Price" name="maxXl">
          </div>
          </div>
         </div>
 
         <div class="form-group">
          <label for="exampleInputEmail1">Xxl</label><br>
          <div class="row">
          <div class="col-md-3">
          <label for="">Quantity</label>
          <input type="number" class="form-control" placeholder="Price" name="quantityXxl" >
          </div>
           <div class="col-md-3">
          <label for="">Purchase Price</label>
          <input type="number" class="form-control" placeholder="Quantity" name="purchaseXxl">
          </div>
          <div class="col-md-3">
          <label for="">Sale Price</label>
          <input type="number" class="form-control" placeholder="Price" name="minXxl">
          </div>
          <div class="col-md-3">
          <label for="">Discount Price</label>
          <input type="number" class="form-control" placeholder="Price" name="maxXxl">
          </div>
          </div>
         </div>

         <div class="form-group">
          <label for="exampleInputEmail1">Other</label><br>
          <div class="row">
          <div class="col-md-3">
          <label for="">Quantity</label>
          <input type="number" class="form-control" placeholder="Price" name="quantityOther" >
          </div>
           <div class="col-md-3">
          <label for="">Purchase Price</label>
          <input type="number" class="form-control" placeholder="Quantity" name="purchaseOther">
          </div>
          <div class="col-md-3">
          <label for="">Sale Price</label>
          <input type="number" class="form-control" placeholder="Price" name="minOther">
          </div>
          <div class="col-md-3">
          <label for="">Discount Price</label>
          <input type="number" class="form-control" placeholder="Price" name="maxOther">
          </div>
          </div>
         </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Product Details</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="proDetail"></textarea>
          </div>
          <div class="form-group">
            <label>File upload</label>
            <input type="file" name="file[]"  accept="image/*" multiple="multiple" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
              </span>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Meta Keyword</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="metaKeyword"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Meta Tttle</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="metaTitle"></textarea>
          </div>
          
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Meta Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="metaDesc"></textarea>
          </div>
         
          <div class="form-group">
          <label>Status</label>
          <select class="form-control form-control-lg" name="status" > 
            <option selected>Open this select menu</option>
            <option value="1">Active</option>
            <option value="0">In Active</option>
            <option value="3">Pending</option>
            <option value="4">Silent</option>
          </select>
        </div>
        <input type="hidden" name="id" >
           
          <button type="submit" class="btn btn-primary mr-2" >Submit</button>
         
        </form>
      </div>
    </div>
  </div>
 
</div>
@endif
<!-- //modal -->

<!-- <script>
      function AddCategory(){
        var id =  $('#id').val();
        var user_id = $('#user_id').val();
        var catName = $('#catName').val();
       var catDetail = $('#catDetail').val();
       var status = $('#status').val();
       console.log(id)
       console.log("here")
       let _url = `addCategory`;
       let token =  $('meta[name="csrf-token"]').attr('content');
       $.ajax({
       type:'POST',
       url:_url,
       data:{
       id:id,
       user_id:user_id,
       catName:catName,
       catDetail:catDetail,
       status:status,
       _token:token
       },
       success:function(response){
         if(response.code == 200){
           alert('data is inserted');
           location.reload();
         }
       }
       });

      }
</script> -->


@endsection

@push('custom-scripts')
  <script src="{{ asset('assets/js/file-upload.js') }}"></script>
@endpush