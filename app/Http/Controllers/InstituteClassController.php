<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\InstituteClass;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class InstituteClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $instituteClass = DB::table('institute_classes')->get(); 
        return view('admin.class',['instituteClass'=>$instituteClass]);
    }

    public function classStudentIndex($id)
    {
        $class = InstituteClass::find($id);

        $studentList = DB::table('class_students')
            ->join('students', 'class_students.student_id', '=', 'students.id')
            ->where('class_students.class_id', '=', $id)
            ->get();

        //$instituteClass = DB::table('institute_classes')->get(); 
        return view('admin.class-student-list',['studentList'=>$studentList,'className'=>$class->class_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $teacherList = Teacher::all();
        $data =array(
            'teacherList'=>$teacherList,
            'hasID' => false
        );

        return view('admin.class-enter')->with('data',$data);
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
        $validation = Validator::make($request->all(),[
            'className'=>'required|unique:institute_classes',
            'yearForExam'=>'required|digits:4',
            'startTime'=>'required',
            'endTime'=>'required',
            'classFee'=>'required',
        ]);;

        if ($validation->fails()) {
            return Redirect::back()->withErrors($validation)->withInput();
        }else{

            $instituteClass = InstituteClass::create([
                'class_name' => $request->input('className'),
                'scheme' => $request->input('grade'),
                'year_for_examination' => $request->input('yearForExam'),
                'subject' => $request->input('subject'),
                'date' => $request->input('day'),
                'start_time' => $request->input('startTime'),
                'end_time' => $request->input('endTime'),
                'fee' => $request->input('classFee'),
                'teacherID' => $request->input('teacher'),
                'status' => 1,
            ]);

            $result = $instituteClass->save();

            if($result)
            {
                    return Redirect::to('admin/class')->with('successMsg', 'Class added successful..!');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InstituteClass  $instituteClass
     * @return \Illuminate\Http\Response
     */
    public function show(InstituteClass $instituteClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InstituteClass  $instituteClass
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $id = $request->id;
        $instituteClass = InstituteClass::find($id);
        $teacherList = Teacher::all();
        $data =array(
            'teacherList' => $teacherList,
            'instituteClass'=>$instituteClass,
            'hasID' => true
        );
        return view('admin.class-enter')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InstituteClass  $instituteClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $validation = Validator::make($request->all(),[
            'yearForExam'=>'required|digits:4',
            'startTime'=>'required',
            'endTime'=>'required',
            'classFee'=>'required',
        ]);;

        if ($validation->fails()) {
            return Redirect::back()->withErrors($validation)->withInput();
        }else{

            $instituteClass = InstituteClass::find($id);

            $instituteClass->class_name = $request->input('className');
            $instituteClass->scheme = $request->input('grade');
            $instituteClass->year_for_examination = $request->input('yearForExam');
            $instituteClass->subject = $request->input('subject');
            $instituteClass->date = $request->input('day');
            $instituteClass->start_time = $request->input('startTime');
            $instituteClass->end_time = $request->input('endTime');
            $instituteClass->fee = $request->input('classFee');
            $instituteClass->teacherID = $request->input('teacher');
            $instituteClass->status = 1;
            

            $result = $instituteClass->save();

            if($result)
            {
                return Redirect::back()->with('successMsg', 'Class edit successful..!');;
                
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InstituteClass  $instituteClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstituteClass $instituteClass)
    {
        //
        $instituteClass = InstituteClass::find($id);
        $instituteClass->delete();
        return Redirect::to('admin/class')->with('successMsg', 'Class delete successful..!');
    }
}
