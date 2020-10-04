@extends('layout.app')
@section('title','Dashboard') 

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">{{$class->class_name}}</h1>
      
    </div>

    <!-- Content Row -->
    <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col-md-3">
                Scheme : {{$class->scheme}}
              </div>
              <div class="col-md-3">
                Year for examination : {{$class->year_for_examination}}
              </div>
              <div class="col-md-3">
                Subject : {{$class->subject}}
              </div>
              <div class="col-md-3">
                Day : {{$class->date}}
              </div>
              
            </div>
            <br>
            <div class="row no-gutters align-items-center">
              <div class="col-md-3">
                Start time : {{$class->start_time}}
              </div>
              <div class="col-md-3">
                End time : {{$class->end_time}}
              </div>
              <div class="col-md-3">
                Fee : {{$class->fee}}
              </div>
              <div class="col-md-3">
                Student count : {{$class->student_count}}
              </div>
              
            </div>

          </div>
        </div>
      </div>

     
    </div>

    <div class="row">

      <!-- Earnings (Monthly) Card Example -->
    

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">No of paid student ( Month : {{date("M")}})</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$paidCount}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">No of un-paid student ( Month : {{date("M")}})</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$class->student_count-$paidCount}}</div>
                  </div>
                 
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pending Requests Card Example -->
      {{-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">No of classes (Total)</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">38</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-comments fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
    </div>
    <!-- Content Row -->

  

    <div class="row">
      <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Student list</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Grade</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Grade</th>
                  </tr>
                </tfoot>
                <tbody>
    
                  @foreach ($studentList as $item)
                            <tr>
                              <th>{{$item->genID}}</th>
                              <th>{{$item->first_name}} {{$item->last_name}}</th>
                              <th>{{$item->email}}</th>
                              <th>{{$item->contact_no}}</th>
                              <th>{{$item->grade}}</th>
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


@push('js')
<!-- Page level plugins -->
<script src="{{URL::asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{URL::asset('js/demo/datatables-demo.js')}}"></script>
<script>
  $(document).ready(function() {
    $('table.display').DataTable();
} );
</script>
@endpush


@push('css')
<link href="{{URL::asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

@endpush