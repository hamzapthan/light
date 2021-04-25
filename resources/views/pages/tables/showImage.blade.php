@extends('layout.master')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
  
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Images</a></li>
    
  </ol>
</nav>
<style>
    .box{
        /* background:rgb(132, 221, 16);
        height: 300px; */
    }
    .inner-box{
        /* background: #000; */
        color: white;
        padding-top: 10px;
        height: 300px; 
    }
    .imgNew img{
        width: 332px;
        height: 250px;
        margin-top:10px;
    }
    .cross{
        display: none;
    }
    .imgNew:hover + .cross{
        display: block;
    }
    .cross i{
        margin-right: 10px;
    }
    .cross:hover{
        display: block;
    }
    .cross{
        position: absolute;
        top: 20px;
        font-size: 18px;
        /* left: 190px; */
        right: 30px;
        cursor: pointer;
    }
    .spinner-border{
        
    }
</style>



          <style>
          .thumbnail {
  margin-top: 50px;
  
}
          </style>
<!-- <div class="container">
<div class="row flex">
@foreach($proImages as $proImage)


     @foreach(json_decode($proImage->image,true) as $images)
			<div class="col-lg-3 col-sm-2">
				<div class="thumbnail">
					<img src="{{ asset($images) }}" style="height: 200px; width:200px;">
				</div>
			</div>
      @endforeach
    </div>
</div> -->

<div class="box container container">
<div class="row flex">

 @foreach(json_decode($proImage->image ,true) as $images)
      
    
           <div class="col-lg-3  col-sm-2 mt-5" id="row_{{$proImage->id}}">
            <div class="imgNew" id="imageName" class="thumnail">
            <img src="{{ asset($images) }}" class="img-fluid"  class="img-fluid"  > 
            </div>
            <div class="cross text-right">
     <i class="fa fa-times"  data-id={{$proImage->id}} data-images={{$images}}  onclick="deletePost(event.target)" ></i>
         </div>
       </div>
       @endforeach
              </div>
              @endforeach

</div>
<script>
                  function deletePost(event){
               
                let images  = $(event).data("images");   // in JQuery
                 let id  = $(event).data("id");   // in JQuery
              var image = images.replace(/^.*[\\\/]/, '');
     
                
        //      let images     =  event.getAttribute('data-id');   //in JavaScript
              let _url       = `../find/${id}/${image}`;   
              let _token   = $('meta[name="csrf-token"]').attr('content');
              $.ajax({
                  url:_url,
                  type: 'DELETE',
                  data:{
                      _token:_token
                 },
                 success:function(response){
                     if(response.code == 200){
                         alert('image is deleted');
                        $("#row_"+id).remove();
                 }}
            });
                    }
              </script>






@endsection