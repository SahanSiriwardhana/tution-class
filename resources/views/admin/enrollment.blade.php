@extends('layout.app')
    @section('content')

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Class enrollment</h1>
            {{-- <a href="biography-middle-enter.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-calendar fa-sm text-white-50"></i> Add day</a> --}}
        </div>
      
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            
                <h6 class="m-0 font-weight-bold text-primary">Classes enrollment Form</h6>
            
                {{-- <h6 class="m-0 font-weight-bold text-primary">Election Result Enter</h6> --}}
            
            </div>
            <div class="card-body">
            <div class="row">
                @if(session()->has('successMsg'))
                <div class="row col-md-12">
                    <div class="alert alert-success alert-dismissible fade show col-md-12" role="alert">
                    {{ session()->get('successMsg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                </div>
                @endif
                <form class="user col-md-12" id="" method="POST" action="{{ route('class-enrollment') }}">
                @csrf

                <div class="form-group row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="email">Class Name:</label>
                        <select class="selectpicker" data-live-search="true" name="className">
                            <option data-tokens="0">Select class name</option>
                            @foreach ($classes as $item)
                                <option value="{{$item->id}}" data-tokens="{{$item->id}}">{{ $item->class_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class=" col-sm-3">
                        <label for="email">Student Name:</label>
                        <select class="selectpicker" data-live-search="true" name="studentName">
                            <option data-tokens="0">Select student name</option>
                            @foreach ($students as $item)
                                <option value="{{$item->id}}" data-tokens="{{$item->id}}">{{ $item->genID }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <button class="btn btn-primary btn-user btn-block" id="submit" type="submit" name="submit">
                            Enrolle
                        </button>
                    </div>
                </div>


                {{-- <div class="row">
                    <div class="col-md-12" id="msg">

                    </div>
                </div> --}}

                  

                
                <!-- <button class="btn btn-primary btn-user btn-block" id="submit" type="submit" name="submit">
                    Save
                </button> -->

                </form>
                <!-- -->
            </div>
            </div>
        </div>
    @endsection

@push('js')
<script src="{{URL::asset('bootstap-select/js/bootstrap-select.min.js')}}"></script>

<!-- Page level plugins -->
<script type="text/javascript">
$(document).ready(function(){
    $("#class_name").keyup(function(){
       var classValue = $("#class_name").val();
      
       if(classValue != ''){
           var _token = $('input[name="_token"]').val();
           $.ajax({
               url:"{{route ('class-search')}}",
                method:"POST",
                data : {classValue : classValue, _token:_token},
                success :function (data) {
                    $("#classList").fadeIn();
                    $("#classList").html(data);
                }
           })
       }
    });
});
</script>
@endpush

@push('css')
<link rel="stylesheet" href="{{URL::asset('bootstap-select/css/bootstrap-select.min.css')}}">
@endpush