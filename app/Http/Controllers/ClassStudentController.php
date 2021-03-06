<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\ClassStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\InstituteClass;
use App\Student;

class ClassStudentController extends Controller
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
        return view('admin.enrollment',['classes'=>$classes,'students'=>$students]);
    }

    public function getAutoCompleteClass(Request $request)
    {
        if($request->get('classValue')){
            $q = $request->get('classValue');
            
            $dataClass = DB::table('institute_classes')->where('id','=',$q)->get();

            $dataStudent = DB::table('class_students')
            ->join('students','class_students.student_id','=','students.id')
            ->where('class_id','=',$q)
            ->select('students.id','students.genID')
            ->get();

            $data = array();
 

            $output ='<option data-tokens="0" selected>Select student name</option>';
            foreach($dataStudent as $item)
            {
              $output .=  '<option value="'.$item->id.'" data-tokens="'.$item->id.'">'. $item->genID .'</option>';
            }

            $data['class'] = $dataClass[0];
            $data['student'] = $output;

            echo json_encode($data);
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
        $validation = Validator::make($request->all(),[
            'className'=>'required',
            'studentName'=>'required',
        ]);;

        if ($validation->fails()) {
            return Redirect::back()->withErrors($validation)->withInput();
        }else{
            if(ClassStudent::where([
                ['class_id','=',$request->input('className')],
                ['student_id','=',$request->input('studentName')]
                ])->exists()){
                    return Redirect::to('admin/enrollment')->with('successMsg', 'Student already enrolled to this class ..!');
            }else{

                $instituteClass = ClassStudent::create([
                    'class_id' => $request->input('className'),
                    'student_id' => $request->input('studentName'),
                    
                ]);

                $result = $instituteClass->save();
                
                $model = InstituteClass::find( $request->input('className') );
                $model->increment('student_count',1);
                if($result)
                {
                        return Redirect::to('admin/enrollment')->with('successMsg', 'Enrollment added successful..!');
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClassStudent  $classStudent
     * @return \Illuminate\Http\Response
     */
    public function show(ClassStudent $classStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassStudent  $classStudent
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassStudent $classStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassStudent  $classStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassStudent $classStudent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassStudent  $classStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $classStudent = ClassStudent::find($id);
        $classStudent->delete();
        return Redirect::back()->with('successMsg', 'Student removed from class successful..!');
    }
}
