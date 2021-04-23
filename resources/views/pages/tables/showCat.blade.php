@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Tables</a></li>
    <li class="breadcrumb-item active" aria-current="page">Basic Tables</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">All Categories</h6>
       
        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>  Category Name</th>
                  <th>Category Detail</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
               @foreach($category as $categories)
                <tr id= "row_{{$categories->id}}">
                  <th>{{$categories->id}}</th>
                  <td>{{$categories->name}}</td>
                  <td>{{$categories->detail}}</td>
                  <td>{{$categories->status}}</td>
                  <td><a href="showProducts/{{$categories->id}}/{{$categories->name}}">Products</a></td>
                  
                  <td><a href="catEdit{{$categories->id}}edit">Edit</a></td>
                  <td><a href="javascript:void(0)" data-id="{{$categories->id}}" onclick="deletePost(event.target)" >Delete</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function deletePost(event){
    let id    = $(event).data("id");
    console.log(id)
    let _url  = `delCat/${id}`;
    let _token =  $('meta[name="csrf-token"]').attr('content');
       $.ajax({
       type:'DELETE',
       url:_url,
       data:{
   _token:_token
       },
       success:function(response){
         if(response.code == 200){
        alert('category is deleted');
        $("#row_"+id).remove();
         }
       }
  });
}

</script>





@endsection