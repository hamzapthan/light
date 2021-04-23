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
        @if ($message = Session::get('errors'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
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
@else
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Edit Category</a></li>
    <li class="breadcrumb-item active" aria-current="page">Basic Elements</li>
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
            <input type="text" class="form-control" id="catName" name="catName" autocomplete="off" placeholder="Write Any Category Name">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Category Details</label>
            <input type="text" class="form-control" id="catDetail"  name="catDetail" placeholder="Write Some Details About The Category">
          </div>
         
          <div class="form-group">
          <label>Status</label>
          <select class="form-control form-control-lg" name="status" id="status" > 
            <option selected>Open this select menu</option>
            <option value="1">Active</option>
            <option value="0">In Active</option>
            <option value="3">Pending</option>
            <option value="4">Silent</option>
          </select>
        </div>
        <input type="hidden" class="form-control" id="id"  name="id">
         <input type="hidden" class="form-control" id="user_id"  name="user_id" value="{{Auth::user()->id}}">
          <button type="button" class="btn btn-primary mr-2" onclick="AddCategory()">Submit</button>
         
        </form>
      </div>
    </div>
  </div>
 
</div>
@endif
<!-- //modal -->

<script>
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
</script>


@endsection

@push('custom-scripts')
  <script src="{{ asset('assets/js/file-upload.js') }}"></script>
@endpush