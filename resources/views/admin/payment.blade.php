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
                <form class="user col-md-12" id="" method="POST" >
                

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="email">Election:</label>
                    <input type="text" required class="form-control form-control-user" id="exampleInputPassword" placeholder="Election" value="" name="year">
                    </div>
                    <div class=" col-sm-6">
                    <label for="email">Constituency:</label>
                    <input type="text" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Constituency" name="constituency" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                    <label for="email">Part / Alliances:</label>
                    <input type="text" required class="form-control form-control-user" id="exampleInputPassword" placeholder="Part / Alliances" value="" name="alliances">
                    </div>
                    <div class=" col-sm-4">
                    <label for="email">Preferential Votes:</label>
                    <input type="text" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Preferential Votes" name="votes" value="">
                    </div>
                    <div class=" col-sm-4">
                    <label for="email">Result:</label>
                    <input type="text" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Result" name="result" value="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12" id="msg">

                    </div>
                </div>

                    <button class="btn btn-primary btn-user btn-block" id="submit" type="submit" name="submit">
                    Update
                    </button>

                
                <!-- <button class="btn btn-primary btn-user btn-block" id="submit" type="submit" name="submit">
                    Save
                </button> -->

                </form>
                <!-- -->
            </div>
            </div>
        </div>
    @endsection