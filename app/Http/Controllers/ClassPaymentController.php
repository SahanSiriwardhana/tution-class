<?php

namespace App\Http\Controllers;

use App\ClassPayment;
use Illuminate\Http\Request;
use App\InstituteClass;
use App\Student;

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
        $classes = InstituteClass::all(); 
        $students = Student::all();
        return view('admin.payment',['classes'=>$classes,'students'=>$students]);
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
