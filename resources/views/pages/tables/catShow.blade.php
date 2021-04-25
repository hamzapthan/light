@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Tables</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Table</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Data Table</h6>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Detail</th>
                <th>Stauts</th>
                <th>Products</th>
                <th>See Products</th>
               
                <th>Edit</th>
                <th>Delete</th>
                
               
              </tr>
            </thead>
            <tbody>
           
         
            @foreach($category as $categories)
            <?php
           $id =  $categories->id;
        $ids = App\Category::find($id);
        $countPro  =  $ids->CategoryDetails($id);?>
              <tr id= "row_{{$categories->id}}">
              
                <td>{{$categories->name}}</td>
                <td>{{$categories->detail}}</td>
              @if($categories->status == 1)
                <td>Active</td>
                @else
                <td>Pending</td>
                @endif
                <td>
               {{$countPro}}</td>
               
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

@push('plugin-scripts')

  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush