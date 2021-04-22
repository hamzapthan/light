@extends('layout.master')

@section('content')

@if(isset($singlePro))
<style>
body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  /* position: absolute; */
  top: 45px;
  left: 20px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Tables</a></li>
    
  </ol>
</nav>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Product Description</h6>
       
        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  
                  <th>Product Name</th>
                 
                  <th>Product Brand</th>
                  <th>Product Colour</th>
                 
                  <th>Status</th>
                  <th>Edit</th>
                           
                </tr>
              </thead>
              <tbody>
             
                <tr >
                <!-- <td class="py-1">
                @foreach(json_decode($singlePro->image,true) as $images)
                  <img src="{{asset('images/'.$images)}}" alt="image" style="border-radius: 0px; width: 75px; height: 70px;" >
                  @break
                 @endforeach
                </td> -->
               
<?php  $colour = $singlePro['colour'];
 $array = json_decode($colour);
 $colours = implode("  ", $array);
$colourss =   str_replace(',',' ',$colours);
   


?>
                
                  <td>{{$singlePro->proName}}</td>
                  <td>{{$singlePro->proBrnad}}</td>
                  <td>{{$colourss}}</td>
                
            
                 @if($singlePro->status == 0)
                  <td>In Active</td>
                 @elseif($singlePro->status == 1)
                  <td>Active</td>
                  @elseif($singlePro->status == 2)
                  <td>Pending</td>
                  @endif
                  <td><a href="/editProduct/{{$singlePro->id}}">Edit</a> </td>   
    
                
                </tr>
               
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- this is a Quantity Section -->
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Product Quantity</h6>
       
        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  
                  <th>Small</th>
                 
                  <th>Medium</th>
                  <th>Large</th>
                  <th>XL</th>
                  <th>XXL</th>
                  <th>Other</th>
                 
                           
                </tr>
              </thead>
              <tbody>
             
                <tr >
                  <td>{{$singlePro->small}}</td>
                  <td>{{$singlePro->medium}}</td>
                  <td>{{$singlePro->large}}</td>
                  <td>{{$singlePro->xl}}</td>
                  <td>{{$singlePro->xxl}}</td>
                  <td>{{$singlePro->other}}</td>
                </tr>
               
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Product Purchase Prices</h6>
       
        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  
                  <th>Small</th>
                 
                  <th>Medium</th>
                  <th>Large</th>
                  <th>XL</th>
                  <th>XXL</th>
                  <th>Other</th>
                 
                           
                </tr>
              </thead>
              <tbody>
                @foreach($price as $prices)
                <tr >
                <td>{{ $prices->purchaseSmall }}</td>
                  <td>{{ $prices->purchaseMedium }}</td> 
                  <td>{{ $prices->purchaseLarge }}</td>
                  <td>{{ $prices->purchaseXl }}</td>
                  <td>{{ $prices->purchaseXxl }}</td>
                  <td>{{ $prices->purchaseOther }}</td> 
          
              
    
                
                </tr>
               @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Product Sale Prices</h6>
       
        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  
                  <th>Small</th>
                 
                  <th>Medium</th>
                  <th>Large</th>
                  <th>XL</th>
                  <th>XXL</th>
                  <th>Other</th>
                 
                           
                </tr>
              </thead>
              <tbody>
                @foreach($price as $prices)
                <tr >
                <td>{{ $prices->minSmall }}</td>
                  <td>{{ $prices->minMedium }}</td> 
                  <td>{{ $prices->minLarge }}</td>
                  <td>{{ $prices->minXl }}</td>
                  <td>{{ $prices->minXxl }}</td>
                  <td>{{ $prices->minOther }}</td> 
          
              
    
                
                </tr>
               @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Product Discount Prices</h6>
       
        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  
                  <th>Small</th>
                 
                  <th>Medium</th>
                  <th>Large</th>
                  <th>XL</th>
                  <th>XXL</th>
                  <th>Other</th>
                 
                           
                </tr>
              </thead>
              <tbody>
                @foreach($price as $prices)
                <tr >
                <td>{{ $prices->maxSmall }}</td>
                  <td>{{ $prices->maxMedium }}</td> 
                  <td>{{ $prices->maxLarge }}</td>
                  <td>{{ $prices->maxXl }}</td>
                  <td>{{ $prices->maxXxl }}</td>
                  <td>{{ $prices->maxOther }}</td> 
          
              
    
                
                </tr>
               @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>









<div class="form-group">
            <label for="exampleFormControlTextarea1">Details about the Product</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5">{{$singlePro->proDetail}} </textarea>
          </div>




          <style>
          .thumbnail {
  margin-top: 50px;
  
}
          </style>
<div class="container">
<div class="row flex">
     @foreach(json_decode($singlePro->image,true) as $images)
			<div class="col-lg-3 col-sm-2">
				<div class="thumbnail">
					<img src="{{ asset($images) }}" style="height: 200px; width:200px;">
				</div>
			</div>
      @endforeach
    </div>
</div>

<div class="container">
<div class="row flex">
     
			<div class="col-lg-3 col-sm-2">
				<div class="thumbnail">
				<img id="myImg" src="https://source.unsplash.com/sBvouTuXoAE" alt="Snow" style="width:100%;max-width:300px" >
				</div>
			</div>
    </div>
</div>


<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
 
@endif
<script>
 function AddData(event){
   var image = event.getAttribute('data-id');
   console.log(image)
 }



</script>
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
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");


var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>





@endsection