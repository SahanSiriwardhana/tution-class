@extends('layout.app',['pageName' => 'payment-search'])
@section('title','Payment')
    @section('content')

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Payment search</h1>
            {{-- <a href="biography-middle-enter.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-calendar fa-sm text-white-50"></i> Add day</a> --}}
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            
                <h6 class="m-0 font-weight-bold text-primary">Search Form</h6>
            
            </div>
            <div class="card-body">
            <div class="row">
                <form class="user col-md-12" id="frm" method="POST" >
                @csrf
                <div class="form-group row">
                    <div class="col-sm-12 mb-sm-0">
                       
                        {{-- <div class="sucess-msg" style="display:none">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Payment added successful..!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        </div> --}}
                        <div class="sucess-msg2" style="display:none">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Record not found
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="email">Class Name:</label>
                        <select class="selectpicker" required data-live-search="true" name="className" id="className">
                            <option data-tokens="0">Select class name</option>
                            @foreach ($classes as $item)
                                <option value="{{$item->id}}" data-tokens="{{$item->id}}">{{ $item->class_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class=" col-sm-3">
                        <label for="email">Student Name:</label>
                        <select class="selectpicker" required data-live-search="true" name="studentName" id="studentName">
                            <option data-tokens="0">Select student name</option>
                            @foreach ($students as $item)
                                <option value="{{$item->id}}" data-tokens="{{$item->id}}">{{ $item->genID }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class=" col-sm-3">
                        <label for="email">Month :</label>
                        <select class="selectpicker" required data-live-search="true" name="month" id="month">
                            <option selected value='1'>Janaury</option>
                            <option value='2'>February</option>
                            <option value='3'>March</option>
                            <option value='4'>April</option>
                            <option value='5'>May</option>
                            <option value='6'>June</option>
                            <option value='7'>July</option>
                            <option value='8'>August</option>
                            <option value='9'>September</option>
                            <option value='10'>October</option>
                            <option value='11'>November</option>
                            <option value='12'>December</option>
                            
                        </select>
                    </div>
                    <div class=" col-sm-3">
                        <button class="btn btn-primary btn-user btn-block" id="search"  name="submit" >
                            Search
                           </button>
       
                    </div>
                </div>
              
                <hr>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <h5>Card Preview</h5>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 result">
                        <table border="1" width="350px" height="170px">
                            <tr>
                            <td><img src="{{URL::asset('images/logo-dark.png')}}" alt="" srcset=""><div style="display:none; background:url('{{URL::asset('images/logo-dark.png')}}')"></div></td>
                                <td ><span id="classNameCard">Class name</span> </td>
                            </tr>
                            <tr>
                                <td>Student Id</td>
                                <td><span id="studentID">XXXXXXXX</span> </td>
                            </tr>
                            <tr>
                                <td>Monath</td>
                                <td> <span id="monthCard">January</span> </td>
                            </tr>
                            <tr>
                                <td>Fee</td>
                                <td> <span id="fee">Rs 1000.00</span></td>
                            </tr>
                            <tr  style="font-size: 10px">
                                <td colspan="2" align="center">Issued Date : {{now()}}</td>
                            
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12" id="msg">

                    </div>
                </div>

                    <button class="btn btn-primary btn-user btn-block" id="submit" type="submit" name="submit"  style="display: none">
                     Print
                    </button>

                </form>
            </div>
            </div>
        </div>
    @endsection

@push('js')
<script src="{{URL::asset('bootstap-select/js/bootstrap-select.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function(){

        $('input[type=radio][name=paymentMethod]').change(function() {
            if (this.value == 'cash') {
                $("#cardSection").css("display","none");
                $(".card-method").removeAttr("required");
               // $('.card-method').css("display","none");;​​​​​
            }
            else if (this.value == 'card') {
                //alert("Card");
                $("#cardSection").css("display","block");
                $(".card-method").removeAttr("required");
             // $("#cvv").addAttr('required');​​​​​
            }
        });

        $('#className').on('change', function() {
           var classValue = $("#className").val();
           
          //alert(classValue);
           if(classValue != ''){
               var _token = $('input[name="_token"]').val();
               $.ajax({
                   url:"{{route ('class-search')}}",
                    method:"POST",
                    data : {classValue : classValue, _token:_token},
                    dataType: 'JSON',
                    success :function (data) {
                        $("#classNameCard").html(data.class_name);
                        $("#fee").html('Rs '+data.fee+'.00');
                        $("#cashVal").val('Rs '+data.fee+'.00');
                        
                    }
               })
           }
        });

        // $('#studentName').on('change', function() {
            
        //     $("#studentID").html($('#studentName option:selected').text());
        // });

        $('#month').on('change', function() {
            
            $("#monthCard").html($('#month option:selected').text());
        });

        $('#submit').on('click',function(e){
            e.preventDefault();
           
            w=window.open(null, 'Print_Page', 'scrollbars=yes');        
            w.document.write($('.result').html());
            w.document.close();
            w.print();
        
            $('#frm').trigger("reset");
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        });

        $('#search').on('click',function(e){
            e.preventDefault();
            var form = $('#frm').serialize();
            $.ajax({
                    url:"{{ route('payment-search') }}",
                    method:"POST",
                    data:form,
                    success: function(data){
                        if(data=="true")
                        {
                            $("#studentID").html($('#studentName option:selected').text());
                           // $("#submit").removeAttr("disabled");
                            $("#submit").css("display","block");
                            $(".sucess-msg2").css("display","none");
                        }else{
                            $(".sucess-msg2").css("display","block");
                          //  $("#submit").setAttr("disabled");
                            $("#submit").css("display","none");
                            $("#studentID").html("XXXXXXXX");
                        }
                       
                    }
                });
        })
    });
    </script>

@endpush

@push('css')
<link rel="stylesheet" href="{{URL::asset('bootstap-select/css/bootstrap-select.min.css')}}">
@endpush