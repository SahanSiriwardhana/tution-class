@extends('layout.app')
@section('title','Class List')
@section('content')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Classes</h1>
          <a href="/admin/class-enter" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="far fa-plus-square"></i>&nbsp; Add new class</a>
        </div>
          <!-- DataTales Example -->
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
              <div class="row">
                @foreach ($instituteClass as $item)
                <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$item->date}}, {{$item->start_time}} to {{$item->end_time}}</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$item->class_name}}</div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                      </div>
                      <div class="mt-1 row align-item-around col-md-12">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                          <a href="/admin/class-student/{{$item->id}}" class="btn btn-success btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                              <i class="fas fa-eye"></i>
                            </span>
                            <span class="text">View</span>
                          </a>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                          <a href="/admin/class/{{$item->id}}" class="btn btn-info btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                              <i class="fas fa-edit"></i>
                            </span>
                            <span class="text">Edit</span>
                          </a>
                        </div>
                       
                        <div class="col-lg-4 col-md-12 col-sm-12">
                          <a href="/admin/class-delete/{{$item->id}}" class="btn btn-danger btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                              <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Remove</span>
                          </a>
                        </div>
                       
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                
                
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