@extends('layout.app')
    @section('content')

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Classes</h1>
            {{-- <a href="biography-middle-enter.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-calendar fa-sm text-white-50"></i> Add day</a> --}}
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            
                <h6 class="m-0 font-weight-bold text-primary">Classes Enter Form</h6>
            
                {{-- <h6 class="m-0 font-weight-bold text-primary">Election Result Enter</h6> --}}
            
            </div>
            <div class="card-body">
                <div class="row">
                    @if (!$data['hasID'])
                    <form class="user col-md-12"   action="{{ route('class-register') }}" method="POST">
                    @csrf
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="email">Class Name :</label>
                                <input type="text" required class="form-control form-control-user" id="className" placeholder="Class Name" value="{{ old('className') }}" name="className" readonly>
                                @if($errors->has('className'))
                                <div style="color:red">{{ $errors->first('className') }}</div>
                            @endif
                            </div>
                            
                        </div>
    
                        <div class="form-group row">
                            <div class=" col-sm-4">
                                <label for="email">Scheme :</label>
                                <select class="form-control" id="grade" name="grade" value="{{ old('grade') }}">
                                    <option value="A/L">A/L</option>
                                    <option value="A/L">O/L</option>
                                </select>
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="email">Year for examination :</label>
                                <input type="text" required class="form-control form-control-user" id="yearOfExam" placeholder="Year for examination" value="{{ old('yearForExam') }}" name="yearForExam">
                                @if($errors->has('yearForExam'))
                                <div style="color:red">{{ $errors->first('yearForExam') }}</div>
                                @endif
                            </div>
                            <div class=" col-sm-4">
                                <label for="email">Subject :</label>
                                <input type="text" required class="form-control form-control-user" id="subject" placeholder="Subject" value="{{ old('subject') }}" name="subject">
                                @if($errors->has('subject'))
                                <div style="color:red">{{ $errors->first('subject') }}</div>
                                @endif
                            </div>
                        </div>
                        <hr/>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="email">Day :</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="day" value="{{ old('day') }}" required>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                </select>
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="email">Start time :</label>
                                <input type="time" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Start time" name="startTime" value="{{ old('startTime') }}" required>
                                @if($errors->has('startTime'))
                                <div style="color:red">{{ $errors->first('startTime') }}</div>
                            @endif
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="email">End time :</label>
                                <input type="time" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="End time" name="endTime" value="{{ old('endTime') }}" required>
                                @if($errors->has('endTime'))
                                <div style="color:red">{{ $errors->first('endTime') }}</div>
                            @endif
                            </div>
                        </div>
                        <hr/>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="email">Class fee :</label>
                                <input type="number" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="" name="classFee" value="{{ old('classFee') }}" required>
                                @if($errors->has('classFee'))
                                <div style="color:red">{{ $errors->first('classFee') }}</div>
                            @endif
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="email">Teacher :</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="teacher" value="{{ old('teacher') }}">
                                        <option value="0">Select teacher</option>
                                    @foreach ($data['teacherList'] as $item)
                                        <option value={{$item->id}}>{{ $item->first_name." ".$item->last_name }}</option>
                                    @endforeach
                                    
                                   
                                </select>
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
                <form class="user col-md-12"   action="{{ route('class-update',$data['instituteClass']->id) }}" method="POST">
                    @csrf
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="email">Class Name :</label>
                                <input type="text" required class="form-control form-control-user" id="className" placeholder="Class Name" value="{{$data['instituteClass']->class_name}}" name="className" readonly>
                                @if($errors->has('className'))
                                <div style="color:red">{{ $errors->first('className') }}</div>
                            @endif
                            </div>
                            
                        </div>
    
                        <div class="form-group row">
                            <div class=" col-sm-4">
                                <label for="email">Scheme :</label>
                                <select class="form-control" id="grade" name="grade" value="{{ old('grade') }}">
                                    <option value="A/L">A/L</option>
                                    <option value="A/L">O/L</option>
                                </select>
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="email">Year for examination :</label>
                                <input type="text" required class="form-control form-control-user" id="yearOfExam" placeholder="Year for examination" value="{{ old('yearForExam') }}" name="yearForExam">
                                @if($errors->has('yearForExam'))
                                <div style="color:red">{{ $errors->first('yearForExam') }}</div>
                                @endif
                            </div>
                            <div class=" col-sm-4">
                                <label for="email">Subject :</label>
                                <input type="text" required class="form-control form-control-user" id="subject" placeholder="Subject" value="{{ old('subject') }}" name="subject">
                                @if($errors->has('subject'))
                                <div style="color:red">{{ $errors->first('subject') }}</div>
                                @endif
                            </div>
                        </div>
                        <hr/>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="email">Day :</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="day" value="{{ old('day') }}" required>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                </select>
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="email">Start time :</label>
                                <input type="time" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Start time" name="startTime" value="{{ old('startTime') }}" required>
                                @if($errors->has('startTime'))
                                <div style="color:red">{{ $errors->first('startTime') }}</div>
                            @endif
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="email">End time :</label>
                                <input type="time" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="End time" name="endTime" value="{{ old('endTime') }}" required>
                                @if($errors->has('endTime'))
                                <div style="color:red">{{ $errors->first('endTime') }}</div>
                            @endif
                            </div>
                        </div>
                        <hr/>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="email">Class fee :</label>
                                <input type="number" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="" name="classFee" value="{{ old('classFee') }}" required>
                                @if($errors->has('classFee'))
                                <div style="color:red">{{ $errors->first('classFee') }}</div>
                            @endif
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="email">Teacher :</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="teacher" value="{{ old('teacher') }}">
                                        <option value="0">Select teacher</option>
                                    @foreach ($data['teacherList'] as $item)
                                        <option value={{$item->id}}>{{ $item->first_name." ".$item->last_name }}</option>
                                    @endforeach
                                    
                                   
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-user btn-block" id="submit" type="submit" name="submit">
                            Save
                        </button>
    
                    </form>
    
                @endif
                    <!-- -->
                </div>
            </div>
        </div>
    @endsection

    @push('js')
    <script type="text/javascript">
       $(document).on('keyup', function(e) {
           
           var courseName = $('#grade').find(":selected").text()+"-"+$('#yearOfExam').val()+"-"+$('#subject').val();
           $('#className').val(courseName);
           //alert(courseName);
       });

       $('#grade').on('change', function() {
            var courseName = $('#grade').find(":selected").text()+"-"+$('#yearOfExam').val()+"-"+$('#subject').val();
           $('#className').val(courseName);
        });
    </script>
    @endpush