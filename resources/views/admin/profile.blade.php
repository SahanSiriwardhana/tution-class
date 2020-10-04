@extends('layout.app',['pageName' => 'profile'])
@section('title','User Profile')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    {{-- <a href="biography-middle-enter.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-calendar fa-sm text-white-50"></i> Add day</a> --}}
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">User Profile</h6>

        {{-- <h6 class="m-0 font-weight-bold text-primary">Election Result Enter</h6> --}}

    </div>
    <div class="card-body">

        <div class="row justify-content-center">
           

            <form class="user col-md-6 " action="{{ route('password-update',Auth::user()->id) }}" method="POST">
                @csrf
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

                <h5>User Deatils : </h5>
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="email">Email :</label>
                        <input type="email" readonly class="form-control form-control-user" id="exampleInputPassword"
                            placeholder="Email" value="{{Auth::user()->email}}" name="email">
                        @if($errors->has('email'))
                        <div style="color:red">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="email">Username :</label>
                        <input type="text" readonly class="form-control form-control-user" id="exampleInputPassword"
                    placeholder="Username" value="{{Auth::user()->name}}" name="username">
                    </div>
                </div>
                <br>
                <hr>
                <h5>Change Password : </h5>
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="email">New Password :</label>
                        <input type="password" required class="form-control form-control-user" id="exampleInputPassword"
                            placeholder="Password" value="{{ old('password') }}" name="password">
                        @if($errors->has('password'))
                        <div style="color:red">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class=" col-sm-12">
                        <label for="email">Confirm Password :</label>
                        <input type="password" class="form-control form-control-user" id="exampleRepeatPassword"
                            placeholder="Confirem Password" name="password_confirmation"
                            value="{{ old('password_confirmation') }}">
                    </div>

                </div>
                <button class="btn btn-primary btn-user btn-block col-sm-12" id="submit" type="submit" name="submit">
                    Save
                </button>

            </form>
        </div>
    </div>
</div>
@endsection