@extends('layout.app',['pageName' => 'payment'])
@section('title','Payment')
    @section('content')

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Card payments</h1>
            {{-- <a href="biography-middle-enter.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-calendar fa-sm text-white-50"></i> Add day</a> --}}
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            
                <h6 class="m-0 font-weight-bold text-primary">Classes Enter Form</h6>
            
            </div>
            <div class="card-body">
            <div class="row">
                <form class="user col-md-12" id="frm" method="POST" >
                @csrf
                <div class="form-group row">
                    <div class="col-sm-12 mb-sm-0">
                       
                        <div class="sucess-msg" style="display:none">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Payment added successful..!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        </div>
                        <div class="sucess-msg2" style="display:none">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Already Paid..!
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
                            
                            {{-- @foreach ($students as $item)
                                <option value="{{$item->id}}" data-tokens="{{$item->id}}">{{ $item->genID }}</option>
                            @endforeach --}}
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
                </div>
                <hr>
                
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <h5>Payment method</h5>
                        </div>
                    </div>
                    {{-- <label><input type="radio" name="paymentMethod" checked value="card" id="radioCardPayment"><strong> Credit card</strong> </label> --}}
                    {{-- <div id="cardSection">
                    <div class="form-group row">
                        <div class=" col-sm-6">
                            <label for="email">Name on Card :</label>
                            <input type="text" required="" class="form-control form-control-user card-method" id="nameOnCard"  placeholder="" value="{{ old('nameOnCard') }}" name="nameOnCard">
                            @if($errors->has('nameOnCard'))
                            <div style="color:red">{{ $errors->first('nameOnCard') }}</div>
                            @endif
                        </div>
                        <div class=" col-sm-6">
                            <label for="email">Card Number :</label>
                            <input type="text" required="" class="form-control form-control-user card-method" id="cardNumber" placeholder="1234  5678  9876  5432" value="{{ old('cardNumber') }}" name="cardNumber">
                            @if($errors->has('cardNumber'))
                            <div style="color:red">{{ $errors->first('cardNumber') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class=" col-sm-4">
                            <label for="email">Expiry Month :</label>
                            <input type="text" required="" class="form-control form-control-user card-method" id="expiryMonth" placeholder="MM" value="{{ old('expiryMonth') }}" name="expiryMonth">
                            @if($errors->has('expiryMonth'))
                            <div style="color:red">{{ $errors->first('expiryMonth') }}</div>
                            @endif
                        </div>
                        
                        <div class=" col-sm-4">
                            <label for="email">Expiry Year :</label>
                            <input type="text" required="" class="form-control form-control-user card-method" id="subject" placeholder="YY" value="{{ old('subject') }}" name="subject">
                            @if($errors->has('subject'))
                            <div style="color:red">{{ $errors->first('subject') }}</div>
                            @endif
                        </div>
                        <div class=" col-sm-4">
                            <label for="email">CVV :</label>
                            <input type="text" required="" class="form-control form-control-user card-method" id="cvv" placeholder="" value="{{ old('cvv') }}" name="cvv">
                            @if($errors->has('cvv'))
                            <div style="color:red">{{ $errors->first('cvv') }}</div>
                            @endif
                        </div>
                    </div>
                    </div> --}}

                    <label><input type="radio" name="paymentMethod" checked value="cash" id="radioCashPayment"><strong> Cash</strong> </label>
                    <div class="form-group row">
                        <div class=" col-sm-6">
                            <label for="email">Value :</label>
                            <input type="text" readonly  class="form-control form-control-user" id="cashVal"  placeholder="000.00" value="{{ old('nameOnCard') }}" name="cash">
                            @if($errors->has('nameOnCard'))
                            <div style="color:red">{{ $errors->first('nameOnCard') }}</div>
                            @endif
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

                    <button class="btn btn-primary btn-user btn-block" id="submit" type="submit" name="submit" id="submit">
                     Save
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
                        $("#classNameCard").html(data['class'].class_name);
                        $("#fee").html('Rs '+data['class'].fee+'.00');
                        $("#cashVal").val('Rs '+data['class'].fee+'.00');
                        $("#studentName").html(data['student']);
                        $("#studentName").selectpicker("refresh");

                    }
               })
           }
        });

        $('#studentName').on('change', function() {
            
            $("#studentID").html($('#studentName option:selected').text());
        });

        $('#month').on('change', function() {
            
            $("#monthCard").html($('#month option:selected').text());
        });

        $('#frm').on('submit',function(e){
            e.preventDefault();
            var form = $('#frm').serialize();
           
            $.ajax({
                    url:"{{ route('payment-create') }}",
                    method:"POST",
                    data:form,
                    success: function(data){
                        if(data=="Payment_added")
                        {
                            $(".sucess-msg").css("display","block");
                            $(".sucess-msg2").css("display","none");
                            w=window.open(null, 'Print_Page', 'scrollbars=yes');        
                            w.document.write($('.result').html());
                            w.document.close();
                            w.print();
                            $("#cardSection").css("display","block");
                        }else if(data=="Already_Paid"){
                            $(".sucess-msg2").css("display","block");
                            $(".sucess-msg").css("display","none");
                        }
                       
                        $('#frm').trigger("reset");
                        document.body.scrollTop = 0; // For Safari
                        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
                        $("#cardSection").css("display","block");
                    }
                });
        });
    });
    </script>

@endpush

@push('css')
<link rel="stylesheet" href="{{URL::asset('bootstap-select/css/bootstrap-select.min.css')}}">
@endpush