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
@if(isset($catProduct,$name))
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
                <th>Products</th>
                <th>See Products</th>
               
              
                
               
              </tr>
            </thead>
            <tbody>
           
         
            @foreach($catProduct as $catProducts)
              <tr>
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
                  <?php  $colour = $catProducts['colour'];
 $array = json_decode($colour);
 $colours = implode("  ", $array);
$colourss =   str_replace(',',' ',$colours);
   


?>
                  <td>{{$colourss}}</td>
               
                  <td><a href="">Edit</a></td>
                  <td><div class="btn-group">
 <a href="/../editProduct/{{$catProducts->id}}"> <button type="button" class="btn btn-primary">Edit</button></a>
  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <div class="dropdown-menu">
    <a href="../../singlePro/{{$catProducts->id}}"  class="dropdown-item">Full View</a>
    <a class="dropdown-item" href="../../ShowImage/{{$catProducts->id}}">Images</a>
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
@endif
@endsection

@push('plugin-scripts')

  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush