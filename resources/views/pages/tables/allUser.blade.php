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
                <th class="pt-0">#</th>
                <th class="pt-0">User Name</th>
                <th class="pt-0">User Email</th>
                <th class="pt-0">Orders</th>
                <th class="pt-0">Register Date</th>
                
                <th class="pt-0">Order Details</th>
              </tr>
            </thead>
            <tbody>
           
         
            @foreach($userAll as $key =>  $users)
              <tr>
          <?php  $user_id = $users['id'];
                 $db = App\User::find($user_id);
                 $id = $db->id;
                 $data = $db->GetOrder($id)->get();
                 $count =  $data->count();
          ?>
              <td>{{$key+1}}</td>
                <td>{{$users->name}}</td>
                  <td>{{$users->email}}</td>
                  <td>{{$count}}</td>
                 @if($users->status == 0)
                  <td>In Active</td>
                 @elseif($users->status == 1)
                  <td>Active</td>
                  @elseif($users->status == 2)
                  <td>Pending</td>
                  @endif
                  
                  <td>{{$users['created_at']}}</td>
                <td><a href="UserOrders/{{$users->id}}">Orders</a></td>
                 
                 
                 
                
              </tr>
              @endforeach
            
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')

  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush