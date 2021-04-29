@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Edit Category</a></li>
    <li class="breadcrumb-item active" aria-current="page">Basic Elements</li>
  </ol>
</nav>
<?php    ?>
<div class="row">
  <div class="col-md-10 stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Monday</h6>
          <form method="post" action="{{route('date.insert')}}">
          @csrf
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label">Collection Time</label>
                  <input type="date" class="form-control" placeholder="Enter first name" name="monCoDate">
                </div>
              </div><!-- Col -->
            
            </div><!-- Row -->
            <div>
           @foreach($time as $times)
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="monday[]" value="{{$times->startTime}}-{{$times->endTime}}" >
                {{$times->startTime}}-{{$times->endTime}} 
              </label>
            </div>
            @endforeach
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label">Delivery Time</label>
                  <input type="date" class="form-control" placeholder="Enter first name" name="monDeDate">
                </div>
              </div><!-- Col -->
            
            </div><!-- Row -->
            <div>
           @foreach($time as $times)
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="mondayde[]" value="{{$times->startTime}}-{{$times->endTime}}" >
                {{$times->startTime}}-{{$times->endTime}} 
              </label>
            </div>
            @endforeach
            </div>
            <!-- <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">City</label>
                  <input type="text" class="form-control" placeholder="Enter city">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">State</label>
                  <input type="text" class="form-control" placeholder="Enter state">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Zip</label>
                  <input type="text" class="form-control" placeholder="Enter zip code">
                </div>
              </div>
            </div> -->
            <!-- <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Email address</label>
                  <input type="email" class="form-control" placeholder="Enter email">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label">Password</label>
                  <input type="password" class="form-control" autocomplete="off" placeholder="Password">
                </div>
              </div>
            </div> -->
            <button type="submit" class="btn btn-primary submit">Submit form</button>
          </form>
          
      </div>
    </div>
  </div>
</div>

<!-- //modal -->

<script>
      function AddCategory(){
        var id =  $('#id').val();
        var user_id = $('#user_id').val();
        var catName = $('#catName').val();
       var catDetail = $('#catDetail').val();
       var status = $('#status').val();
      
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