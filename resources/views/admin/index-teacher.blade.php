@extends('layout.app')
@section('title','Dashboard') 

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Teacher Dashboard</h1>
      
    </div>

    <!-- Content Row -->
    <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">No of Classes (Total)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$classCount}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Content Row -->

  

    <div class="row">
      <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Classes list</h6>
          </div>
          <div class="card-body">
    
    
            @if(session()->has('successMsg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session()->get('successMsg') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
    
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Class Name</th>
                    <th>Day</th>
                    <th>Satrt time (24 hours)</th>
                    <th>End time (24 hours)</th>
                    <th>Fee</th>
                    <th>Number of student</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Class Name</th>
                    <th>Day</th>
                    <th>Satrt time</th>
                    <th>End time</th>
                    <th>Fee</th>
                    <th>Number of student</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
    
                  @foreach ($classList as $item)
                            <tr>
                              <th>{{$item->class_name}}</th>
                              <th>{{$item->date}}</th>
                              <th>{{$item->start_time}}</th>
                              <th>{{$item->end_time}}</th>
                              <th>{{$item->fee}}</th>
                              <th>{{$item->student_count}}</th>
                              <th>
                                <a href="/admin/teacher-class/{{$item->id}}"> <i class="fas fa-eye"></i></a>
                                
                              </th>
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