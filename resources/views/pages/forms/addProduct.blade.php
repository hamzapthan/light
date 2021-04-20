@extends('layout.master')

@section('content')
@if(isset($findProduct,$catPro))

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
            <input type="text" class="form-control" id="catName" name="proName" autocomplete="off" value="{{$findProduct->proName}}">
          </div>
        
          <div class="form-group">
            <label for="exampleInputUsername1">Product Brand</label>
            <input type="text" class="form-control" id="catName" name="proBrand" autocomplete="off" value="{{$findProduct->proBrnad}}">
          </div>
          
          <div class="form-group">
            <label for="exampleInputEmail1">Colour</label>
            <input type="text" class="form-control" id="catDetail"  name="colour" value="{{$findProduct->colour}}">
          </div>
      
          <div class="form-group">
          <label for="exampleInputEmail1">Size</label><br>
         
           
           
           <div class="row">
           <div class="col-md-2">
           <div class="form-check form-check-inline ">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="small" value="1">
                Small
              </label>    
              </div>      
           </div>
           <div class="col-md-4">
          <label for="">Quantity</label>
          <input type="number" class="form-control" placeholder="Quantity" name="quantitySmall" >
          </div>
          <div class="col-md-4">
          <label for="">Price</label>
          <input type="number" class="form-control" placeholder="Price" name="priceSmall">
          </div>
          </div>
          <div class="row">
           <div class="col-md-2">
           <div class="form-check form-check-inline ">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="medium" value="2">
                Medium
              </label>    
              </div>      
           </div>
           <div class="col-md-4">
          <label for="">Quantity</label>
          <input type="number" class="form-control" placeholder="Quantity" name="quantityMedium">
          </div>
          <div class="col-md-4">
          <label for="">Price</label>
          <input type="number" class="form-control" placeholder="Price" name="priceMedium">
          </div>
          </div>
          <div class="row">
           <div class="col-md-2">
           <div class="form-check form-check-inline ">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="large" value="3" >
                Large
              </label>    
              </div>      
           </div>
           <div class="col-md-4">
          <label for="">Quantity</label>
          <input type="number" class="form-control" placeholder="Quantity" name="quantityLarge">
          </div>
          <div class="col-md-4">
          <label for="">Price</label>
          <input type="number" class="form-control" placeholder="Price" name="priceLarge">
          </div>
          </div>
          <div class="row">
           <div class="col-md-2">
           <div class="form-check form-check-inline ">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="xl" value='4'>
              XL
              </label>    
              </div>      
           </div>
           <div class="col-md-4">
          <label for="">Quantity</label>
          <input type="number" class="form-control" placeholder="Quantity" name="quantityxl">
          </div>
          <div class="col-md-4">
          <label for="">Price</label>
          <input type="number" class="form-control" placeholder="Price" name="priceXl">
          </div>
          </div>
          <div class="row">
           <div class="col-md-2">
           <div class="form-check form-check-inline ">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="xxl" value="5">
                XXL
              </label>    
              </div>      
           </div>
           <div class="col-md-4">
          <label for="">Quantity</label>
          <input type="number" class="form-control" placeholder="Quantity" name="quantityXxl">
          </div>
          <div class="col-md-4">
          <label for="">Price</label>
          <input type="number" class="form-control" placeholder="Price" name="priceXxl">
          </div>
          </div>
          <div class="row">
           <div class="col-md-2">
           <div class="form-check form-check-inline ">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="other" value="6">
                Other
              </label>    
              </div>      
           </div>
           <div class="col-md-4">
          <label for="">Quantity</label>
          <input type="number" class="form-control" placeholder="Quantity" name="quantityOther">
          </div>
          <div class="col-md-4">
          <label for="">Price</label>
          <input type="number" class="form-control" placeholder="Price" name="priceOther">
          </div>
          </div>
          
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Product Details</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="proDetail" value="{{$findProduct->proDetail}}"></textarea>
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
          <label>Status</label>
          <select class="form-control form-control-lg" name="status" > 
           @if($findProduct->status  == 1)
            <option value="1">Active</option>
           @elseif($findProduct->status  == 0)
            <option value="0">In Active</option>
            @elseif($findProduct->status  == 2)
            <option value="2">Pending</option>
            @elseif($findProduct->status  == 3)
            <option value="3">Silent</option>
            @endif
            <option value="1">Active</option>
            <option value="0">In Active</option>
            <option value="2">Pending</option>
            <option value="3">Silent</option>
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
          <label for="exampleInputEmail1">Size</label><br>
         
           
           
           <div class="row">
           <div class="col-md-2">
           <div class="form-check form-check-inline ">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="small" value="1">
                Small
              </label>    
              </div>      
           </div>
           <div class="col-md-4">
          <label for="">Quantity</label>
          <input type="number" class="form-control" placeholder="Quantity" name="quantitySmall" >
          </div>
          <div class="col-md-4">
          <label for="">Price</label>
          <input type="number" class="form-control" placeholder="Price" name="priceSmall">
          </div>
          </div>
          <div class="row">
           <div class="col-md-2">
           <div class="form-check form-check-inline ">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="medium" value="2">
                Medium
              </label>    
              </div>      
           </div>
           <div class="col-md-4">
          <label for="">Quantity</label>
          <input type="number" class="form-control" placeholder="Quantity" name="quantityMedium">
          </div>
          <div class="col-md-4">
          <label for="">Price</label>
          <input type="number" class="form-control" placeholder="Price" name="priceMedium">
          </div>
          </div>
          <div class="row">
           <div class="col-md-2">
           <div class="form-check form-check-inline ">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="large" value="3" >
                Large
              </label>    
              </div>      
           </div>
           <div class="col-md-4">
          <label for="">Quantity</label>
          <input type="number" class="form-control" placeholder="Quantity" name="quantityLarge">
          </div>
          <div class="col-md-4">
          <label for="">Price</label>
          <input type="number" class="form-control" placeholder="Price" name="priceLarge">
          </div>
          </div>
          <div class="row">
           <div class="col-md-2">
           <div class="form-check form-check-inline ">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="xl" value='4'>
              XL
              </label>    
              </div>      
           </div>
           <div class="col-md-4">
          <label for="">Quantity</label>
          <input type="number" class="form-control" placeholder="Quantity" name="quantityxl">
          </div>
          <div class="col-md-4">
          <label for="">Price</label>
          <input type="number" class="form-control" placeholder="Price" name="priceXl">
          </div>
          </div>
          <div class="row">
           <div class="col-md-2">
           <div class="form-check form-check-inline ">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="xxl" value="5">
                XXL
              </label>    
              </div>      
           </div>
           <div class="col-md-4">
          <label for="">Quantity</label>
          <input type="number" class="form-control" placeholder="Quantity" name="quantityXxl">
          </div>
          <div class="col-md-4">
          <label for="">Price</label>
          <input type="number" class="form-control" placeholder="Price" name="priceXxl">
          </div>
          </div>
          <div class="row">
           <div class="col-md-2">
           <div class="form-check form-check-inline ">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="other" value="6">
                Other
              </label>    
              </div>      
           </div>
           <div class="col-md-4">
          <label for="">Quantity</label>
          <input type="number" class="form-control" placeholder="Quantity" name="quantityOther">
          </div>
          <div class="col-md-4">
          <label for="">Price</label>
          <input type="number" class="form-control" placeholder="Price" name="priceOther">
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