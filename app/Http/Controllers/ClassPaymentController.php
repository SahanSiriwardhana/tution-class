<?php

namespace App\Http\Controllers;

use Auth;
use App\ClassPayment;
use Illuminate\Http\Request;
use App\InstituteClass;
use App\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class ClassPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::user()->user_role=='1'){
            $classes = InstituteClass::all(); 
            $students = Student::all();
            return view('admin.payment',['classes'=>$classes,'students'=>$students]);
        }else if(Auth::user()->user_role=='3'){

            $students = Student::where('userID','=',Auth::user()->id)->get();

            $classes = InstituteClass::join('class_students','institute_classes.id','=','class_students.class_id')
            ->where('class_students.student_id','=',$students[0]->id)
            ->select('institute_classes.*')
            ->get(); 

            return view('admin.payment-student',['classes'=>$classes,'students'=>$students]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(ClassPayment::where([
            ['class_id','=',$request->input('className')],
            ['student_id','=',$request->input('studentName')],
            ['month','=',$request->input('month')]
            ])->exists()){
                return 'Already_Paid';
        }else{
            $classPayment = ClassPayment::create([
                'class_id' => $request->input('className'),
                'student_id' => $request->input('studentName'),
                'payment_method' => $request->input('paymentMethod'),
                'month' => $request->input('month'),
            ]);

            $result = $classPayment->save();

            if($result)
            {
                    return 'Payment_added';
            }
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClassPayment  $classPayment
     * @return \Illuminate\Http\Response
     */
    public function show(ClassPayment $classPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassPayment  $classPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassPayment $classPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassPayment  $classPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassPayment $classPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassPayment  $classPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassPayment $classPayment)
    {
        //
    }
}
