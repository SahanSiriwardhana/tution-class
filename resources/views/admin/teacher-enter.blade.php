@extends('layout.app',['pageName' => 'teacher'])
@section('title','Teacher Enter')
    @section('content')

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Teachers</h1>
            {{-- <a href="biography-middle-enter.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-calendar fa-sm text-white-50"></i> Add day</a> --}}
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            
                <h6 class="m-0 font-weight-bold text-primary">Teacher 
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
                        <form class="user col-md-12"   action="{{ route('teacher-register') }}" method="POST">
                        @csrf
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="email">Teacher ID :</label>
                                    <input type="text" required class="form-control form-control-user" id="exampleInputPassword" placeholder="First Name" value="{{$data['new_teacher_id']}}" name="teacherGenID" readonly>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="email">First Name :</label>
                                    <input type="text" required class="form-control form-control-user" id="exampleInputPassword" placeholder="First Name" value="{{ old('firstName') }}" name="firstName">
                                    @if($errors->has('firstName'))
                                    <div style="color:red">{{ $errors->first('firstName') }}</div>
                                    @endif
                                </div>
                                <div class=" col-sm-4">
                                    <label for="email">Last Name :</label>
                                    <input type="text" required class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Last Name" name="lastName" value="{{ old('lastName') }}">
                                    @if($errors->has('lastName'))
                                    <div style="color:red">{{ $errors->first('lastName') }}</div>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="email">Email :</label>
                                <input type="email" required class="form-control form-control-user" id="exampleInputPassword" placeholder="Email" value="{{ old('email') }}" name="email">
                                @if($errors->has('email'))
                                <div style="color:red">{{ $errors->first('email') }}</div>
                                @endif
                                </div>
                                <div class=" col-sm-6">
                                <label for="email">Contact Number:</label>
                                <input type="number" required class="form-control form-control-user" id="exampleRepeatPassword" placeholder="071xxxxxxx" name="contactNo" value="{{ old('contactNo') }}">
                                @if($errors->has('contactNo'))
                                    <div style="color:red">{{ $errors->first('contactNo') }}</div>
                                @endif
                                
                            </div>
                            </div>
                            <hr/>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="email">Username :</label>
                                    <input type="text" required class="form-control form-control-user" id="exampleInputPassword" placeholder="Username" value="{{$data['new_teacher_id']}}" name="username" >
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="email">Password :</label>
                                    <input type="password" required class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" value="{{ old('password') }}" name="password">
                                    @if($errors->has('password'))
                                    <div style="color:red">{{ $errors->first('password') }}</div>
                                @endif
                                </div>
                                <div class=" col-sm-4">
                                    <label for="email">Confirm Password :</label>
                                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Confirem Password" name="password_confirmation" value="{{ old('password_confirmation') }}">
                                </div>
                            </div>
                            <button class="btn btn-primary btn-user btn-block" id="submit" type="submit" name="submit">
                            Save
                            </button>
    
                        </form>

                    @else
                    @if(session()->has('successMsg'))
                    <div class="row col-md-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('successMsg') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    </div>
                    @endif
                        <form class="user col-md-12"   action="{{ route('teacher-update',$data['teacher']->id) }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="email">Teacher ID :</label>
                                    <input type="text" required class="form-control form-control-user" id="exampleInputPassword" placeholder="First Name" value="{{$data['teacher']->genID}}" name="teacherGenID" readonly>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="email">First Name :</label>
                                    <input type="text" required class="form-control form-control-user" id="exampleInputPassword" placeholder="First Name" value="{{$data['teacher']->first_name}}" name="firstName">
                                    @if($errors->has('firstName'))
                                    <div style="color:red">{{ $errors->first('firstName') }}</div>
                                    @endif
                                </div>
                                <div class=" col-sm-4">
                                    <label for="email">Last Name :</label>
                                    <input type="text" required class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Last Name" name="lastName" value="{{$data['teacher']->last_name}}">
                                    @if($errors->has('lastName'))
                                    <div style="color:red">{{ $errors->first('lastName') }}</div>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="email">Email :</label>
                                <input type="email" required class="form-control form-control-user" id="exampleInputPassword" placeholder="Email" value="{{$data['teacher']->email}}" name="email">
                                @if($errors->has('email'))
                                <div style="color:red">{{ $errors->first('email') }}</div>
                                @endif
                                </div>
                                <div class=" col-sm-6">
                                <label for="email">Contact Number:</label>
                                <input type="number" required class="form-control form-control-user" id="exampleRepeatPassword" placeholder="071xxxxxxx" name="contactNo" value="{{$data['teacher']->contact_no}}">
                                @if($errors->has('contactNo'))
                                    <div style="color:red">{{ $errors->first('contactNo') }}</div>
                                @endif
                                <input type="hidden" name="teacherID" value="{{$data['teacher']->id}}">
                                </div>
                            </div>
                            <hr/>
                            {{-- <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="email">Username :</label>
                                    <input type="text" required class="form-control form-control-user" id="exampleInputPassword" placeholder="Username" value="{{$data['teacher']->genID}}" name="username" >
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="email">Password :</label>
                                    <input type="password" required class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" value="{{ old('password') }}" name="password">
                                    @if($errors->has('password'))
                                    <div style="color:red">{{ $errors->first('password') }}</div>
                                @endif
                                </div>
                                <div class=" col-sm-4">
                                    <label for="email">Confirm Password :</label>
                                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Confirem Password" name="password_confirmation" value="{{ old('password_confirmation') }}">
                                </div>
                            </div> --}}
                            <button class="btn btn-primary btn-user btn-block" id="submit" type="submit" name="submit">
                            Update
                            </button>
        
                        </form>

                    @endif

                
                </div>
            </div>
        </div>
    @endsection