@extends('layout.master')

@section('content')
@if(isset($category))
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Edit Category</a></li>
    <li class="breadcrumb-item active" aria-current="page">Basic Info</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Basic Form</h6>
        <form class="forms-sample">
          <div class="form-group">
            <label for="exampleInputUsername1">Category Name</label>
            <input type="text" class="form-control" id="catName" name="catName"  placeholder="{{$category->name}}" value="{{old('name')}}" >
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Category Details</label>
            <input type="text" class="form-control" id="catDetail"  name="catDetail" placeholder="{{$category->detail}}" value="{{ old('detail') }}" >
          </div>
         
          <div class="form-group">
          <label>Status</label>
          <select class="form-control form-control-lg" name="status" id="status" > 
           @if($category->status == 0)
            <option selected>In Active</option>
           @elseif($category->status == 1)
           <option selected>Active</option>
           @elseif($category->status == 2)
           <option selected>Pending</option>
           @elseif($category->status == 3)
           <option selected>Silent</option>
           @endif
            <option value="1">Active</option>
            <option value="0">In Active</option>
            <option value="2">Pending</option>
            <option value="3">Silent</option>
          </select>
        </div>
        <input type="hidden" class="form-control" id="id"  name="id" value="{{$category->id}}">
         <input type="hidden" class="form-control" id="user_id"  name="user_id" value="{{Auth::user()->id}}">
          <button type="button" class="btn btn-primary mr-2" onclick="AddCategory()">Submit</button>
         
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
            <label for="exampleInputUsername1">Quantity</label>
            <input type="number" class="form-control" id="catName" name="quantity" autocomplete="off" placeholder="Write Any Category Name">
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">Price</label>
            <input type="number" class="form-control" id="catName" name="price" autocomplete="off" placeholder="Write Any Category Name">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Colour</label>
            <input type="text" class="form-control" id="catDetail"  name="colour" placeholder="Write Some Details About The Category">
          </div>
      
          <div class="form-group">
          <label for="exampleInputEmail1">Size</label>
          <div class="form-check">
          
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="small" value="small">
                Small
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="medium" value="medium">
                Medium
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="large" value="large">
                Large
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="xl" value="xl">
                Extra Large
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="xxl" value="xxl">
                XXL
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="other" value="other">
                Other
              </label>
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