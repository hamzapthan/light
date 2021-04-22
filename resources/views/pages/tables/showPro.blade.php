@extends('layout.master')

@section('content')

@if(isset($catProduct))
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Tables</a></li>
    <li class="breadcrumb-item active" aria-current="page">Category  {{$name}}</li>
  </ol>
</nav>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Products</h6>
       
        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Product Name</th>
                  <th>Product Brand</th>
                  
                  <th>Status</th>
                  <th>  Options</th>                 
                </tr>
              </thead>
              <tbody>
               @foreach($catProduct as $catProducts)
                <tr id= "row_{{$catProducts->id}}">
                <td class="py-1">
                @foreach(json_decode($catProducts->image,true) as $images)
                  <img src="{{asset($images)}}" alt="image" style="border-radius: 0px; width: 75px; height: 70px;" >
                  @break
                 @endforeach
                </td>
               
                  <td>{{$catProducts->proName}}</td>
                  <td>{{$catProducts->proBrnad}}</td>
                 @if($catProducts->status == 0)
                  <td>In Active</td>
                 @elseif($catProducts->status == 1)
                  <td>Active</td>
                  @elseif($catProducts->status == 2)
                  <td>Pending</td>
                  @endif
                  <td><div class="btn-group">
 <a href="/../editProduct/{{$catProducts->id}}"> <button type="button" class="btn btn-primary">Edit</button></a>
  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <div class="dropdown-menu">
    <a href="../../singlePro/{{$catProducts->id}}"  class="dropdown-item">Full View</a>
    <a class="dropdown-item" href="">Images</a>
    <a class="dropdown-item" href="#">Create Invoice</a>
    <a class="dropdown-item" href="javascript:void(0)"  data-id="{{$catProducts->id}}" onclick="deletePost(event.target)">Mark As Silent</a>
    <a class="dropdown-item" href="javascript:void(0)"  data-id="{{$catProducts->id}}" onclick="deletePost(event.target)">Delete</a>
   
    <a class="dropdown-item" href="#">Print</a>  </div>
       </div> </td>   
    
                
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
 


@elseif($product)
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">All Categories</h6>
       
        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Image</th>
                  <th> Product Name</th>
                  <th>Product Brand</th>
                  <th>Status</th>
                  <th>Options</th>
                 
               
                </tr>
              </thead>
              <tbody>
               @foreach($product as $products)
                <tr id= "row_{{$products->id}}">
                <td class="py-1">
                @foreach(json_decode($products->image,true) as $images)
                  <img src="{{asset($images)}}" alt="image" style="border-radius: 0px; width: 75px; height: 70px;" >
                  @break
                 @endforeach
                </td>
               
                  <td>{{$products->proName}}</td>
                  <td>{{$products->proBrnad}}</td>
                 @if($products->status == 0)
                  <td>In Active</td>
                 @elseif($products->status == 1)
                  <td>Active</td>
                  @elseif($products->status == 2)
                  <td>Pending</td>
                  @endif
                  <td><div class="btn-group">
 <a href="../../editProduct/{{$products->id}}"> <button type="button" class="btn btn-primary">Edit</button></a>
  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <div class="dropdown-menu">
    
  <a href="../../singlePro/{{$products->id}}"  class="dropdown-item">Full View</a>
    <a class="dropdown-item" href="">Images</a>
    <a class="dropdown-item" href="#">Create Invoice</a>
<a class="dropdown-item" href="javascript:void(0)"  data-id="{{$products->id}}" onclick="deletePost(event.target)">Delete</a>
    <a class="dropdown-item" href="#">Transfer</a>
    <a class="dropdown-item" href="#">Print</a>  </div>
</div></td>
         
                
                  <!-- <td><a href="javascript:void(0)" data-id="{{$products->id}}" onclick="deletePost(event.target)" >Delete</a></td> -->
                </tr> 
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endif     
<script>
  function deletePost(event){
    
    let id    = $(event).data("id");
    let _url  = `../../delPro/${id}`;
    let _token =  $('meta[name="csrf-token"]').attr('content');
       $.ajax({
       type:'DELETE',
       url:_url,
       data:{
   _token:_token
       },
       success:function(response){
         if(response.code == 200){
           alert('data is deleted');
        $("#row_"+id).remove();
         }
       }
  });
}

</script>





@endsection