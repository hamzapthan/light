

  @extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush



@section('content')

@if(isset($userName,$userOrders))
<div class="col-lg-7 col-xl-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline mb-2">
          <h6 class="card-title mb-0">Users</h6>
          <div class="dropdown mb-2">
            <button class="btn p-0" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
              <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
              <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
              <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
              <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
              <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-hover mb-0">
            <thead>
              <tr>
                <th class="pt-0">#</th>
                <th class="pt-0">User Name</th>
                <th class="pt-0">Address</th>
                <th class="pt-0">Status</th>
                <th class="pt-0">Register Date</th>
                <th class="pt-0">Status</th>
                <th class="pt-0">Register Date</th>
                <th class="pt-0">Change Stauts</th>
                
                <th class="pt-0">Order Details</th>
              </tr>
            </thead>
            <tbody>
          
            @foreach($userOrders as $key => $users)
              <tr> 
                <td>{{$key+1}}</td>
                <td>{{$users->fullName}}</td>
                <td>{{$users->province}}</td>
                <td>{{$users['postalCode']}}</td>
                <td>{{$users['city']}}</td>
                <td>{{$users['postalCode']}}</td>
                
               @if($users['status'] == 0)
                <td>Pending</td>
               @elseif($users['status'] == 1)
               <td>Delivered</td>
               @endif
               <td>{{$users['created_at']}}</td>
               <td><a href="/orderdelivered/{{ $users->id}}">Change Status</a></td>
              </tr>
              @endforeach
            
            </tbody>
          </table>
        </div>
      </div> 
    </div>
  </div>
@else
<div class="col-lg-7 col-xl-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline mb-2">
          <h6 class="card-title mb-0">Users</h6>
          <div class="dropdown mb-2">
            <button class="btn p-0" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
              <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
              <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
              <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
              <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
              <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-hover mb-0">
            <thead>
              <tr>
                <th class="pt-0">#</th>
                <th class="pt-0">User Name</th>
                <th class="pt-0">Address</th>
                <th class="pt-0">Status</th>
                <th class="pt-0">Register Date</th>
                <th class="pt-0">Status</th>
                <th class="pt-0">Register Date</th>
                
                <th class="pt-0">Order Details</th>
              </tr>
            </thead>
            <tbody>
           <?php    if(isset($order,$orderDetail)){  
            
               ?>
            @foreach($orderDetail as $key => $users)
              <tr> 
                <td>{{$key+1}}</td>
                <td>{{$order->colour}}</td>
                <td>{{$order->size}}</td>
                <td>{{$users['postalCode']}}</td>
                <td>{{$users['fullName']}}</td>
                <td>{{$users['postalCode']}}</td>
               @if($users['status'] = 0)
                <td>In Acive</td>
               @elseif($users['status'] = 1)
               <td>Acive</td>
               @endif
               <td>{{$users['created_at']}}</td>
              </tr>
              @endforeach
             <?php } ?>
            </tbody>
          </table>
        </div>
      </div> 
    </div>
  </div>

@endif
  @endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/progressbar-js/progressbar.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('assets/js/datepicker.js') }}"></script>
@endpush