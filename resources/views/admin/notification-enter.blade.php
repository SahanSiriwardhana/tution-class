@extends('layout.app')
@section('title','Notification Enter')
    @section('content')

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Notification</h1>
            {{-- <a href="biography-middle-enter.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-calendar fa-sm text-white-50"></i> Add day</a> --}}
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            
                <h6 class="m-0 font-weight-bold text-primary">Notification 
                    @if (!$data['hasID'])
                    Enter 
                    @else
                    Update
                    @endif
                    Form</h6>
            
                {{-- <h6 class="m-0 font-weight-bold text-primary">Election Result Enter</h6> --}}
            
            </div>
            <div class="card-body">
                    
                <div class="row">
                    
                    @if (!$data['hasID'])
                        <form class="user col-md-12"   action="{{ route('notification-post') }}" method="POST">
                        @csrf
                            <div class="form-group row">
                            
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="email">Class Name:</label><br>
                                    <select class="selectpicker col-sm-12" required data-live-search="true" name="className" id="className">
                                        <option data-tokens="0">Select class name</option>
                                        @foreach ($data['classes'] as $item)
                                            <option value="{{$item->id}}" data-tokens="{{$item->id}}">{{ $item->class_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="email">Date :</label>
                                    <input type="date" required class="form-control form-control-user" id="exampleInputPassword" placeholder="" value="{{ old('date') }}" name="date">
                                    @if($errors->has('date'))
                                    <div style="color:red">{{ $errors->first('date') }}</div>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-sm-8 mb-3 mb-sm-0">
                                <label for="email">Message :</label>
                                <textarea type="email" required class="form-control form-control-user" id="exampleInputPassword" placeholder="" value="{{ old('message') }}" name="message"></textarea>
                                    @if($errors->has('message'))
                                <div style="color:red">{{ $errors->first('message') }}</div>
                                @endif
                                </div>
                                
                            </div>
                            <button class="btn btn-primary btn-user btn-block col-sm-8" id="submit" type="submit" name="submit">
                            Save
                            </button>
    
                        </form>

                    @else
                    @if(session()->has('successMsg'))
                    <div class="row col-md-12">
                        <div class="alert alert-success alert-dismissible fade show col-md-8" role="alert">
                        {{ session()->get('successMsg') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    </div>
                    @endif
                        <form class="user col-md-12"   action="{{ route('notification-update',$data['notification']->id) }}" method="POST">
                            @csrf
    
                            <div class="form-group row">
                            
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="email">Class Name:</label><br>
                                    <select class="selectpicker col-sm-12" required data-live-search="true" name="className" id="className">
                                        <option data-tokens="0">Select class name</option>
                                        @foreach ($data['classes'] as $item)
                                            <option value="{{$item->id}}" data-tokens="{{$item->id}}" 
                                                @if ($data['notification']->class_id==$item->id)
                                                selected
                                                @endif
                                                >{{ $item->class_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="email">Date :</label>
                                    <input type="date" required class="form-control form-control-user" id="exampleInputPassword" placeholder="" value="{{ $data['notification']->date }}" name="date">
                                    @if($errors->has('date'))
                                    <div style="color:red">{{ $errors->first('date') }}</div>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-sm-8 mb-3 mb-sm-0">
                                <label for="email">Message :</label>
                                <textarea type="email" required class="form-control form-control-user" id="exampleInputPassword" placeholder="" value="" name="message">{{ $data['notification']->message}}</textarea>
                                    @if($errors->has('message'))
                                <div style="color:red">{{ $errors->first('message') }}</div>
                                @endif
                                </div>
                                
                            </div>
                            <button class="btn btn-primary btn-user btn-block col-sm-8" id="submit" type="submit" name="submit">
                            Update
                            </button>
        
                        </form>

                    @endif

                
                </div>
            </div>
        </div>
    @endsection

    
    @push('js')
    <script src="{{URL::asset('bootstap-select/js/bootstrap-select.min.js')}}"></script>
    
    
    
    @endpush
@push('css')
<link rel="stylesheet" href="{{URL::asset('bootstap-select/css/bootstrap-select.min.css')}}">
@endpush