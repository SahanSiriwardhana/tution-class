@extends('layout.app',['pageName' => 'teacher'])
@section('title','Teacher List')
@section('content')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Teachers</h1>
          <a href="/admin/teacher-enter" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="far fa-plus-square"></i>&nbsp; Add new teacher</a>
        </div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Teachers list</h6>
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
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Contact Number</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Contact Number</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>

                    @foreach ($teachers as $item)
                      <tr>
                        <th>{{$item->genID}}</th>
                        <th>{{$item->first_name}} {{$item->last_name}}</th>
                        <th>{{$item->email}}</th>
                        <th>{{$item->contact_no}}</th>
                        <th>
                          <a href="/admin/teacher/{{$item->id}}"> <i class="fas fa-edit"></i></a>
                          <a href="/admin/teacher-delete/{{$item->id}}" style="color:red"> <i class="fas fa-trash-alt"></i></a>
                        </th>
                      </tr>
                    @endforeach
                    
                    
                  </tbody>
                </table>
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

@endpush

@push('css')
  <link href="{{URL::asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  
@endpush