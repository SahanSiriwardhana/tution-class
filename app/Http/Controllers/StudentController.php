<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = Student::all(); 
        return view('admin.student',['students'=>$students]);
    }

    
    public function indexDashboard()
    {
        //
        //$teachers = Teacher::all(); 
        return view('admin.index-student');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $maxStudentID = Student::max('id');
        
        $newID = null;

        if($maxStudentID == null){
            $newID = 1;
        }else{
            $newID = $maxStudentID + 1;
        }
       
        $newStudentID ="STD".str_pad($newID,4,"0",STR_PAD_LEFT);
        
        $data =array(
            'new_student_id'=>$newStudentID,
            'hasID' => false
        );

        return view('admin.student-enter')->with('data',$data);
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
            'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'required|email|unique:users',
            'contactNo'=>'required|digits:10',
            'username'=>'required',
            'password'=>'required|min:8|confirmed',

        ]);;

        if ($validation->fails()) {
            return Redirect::back()->withErrors($validation)->withInput();
        }else{

            $user = User::create([
                'name' => $request->input('username'),
                'email' => $request->input('email'),
                'user_role' => '3', // user lvl 1 -admin ,2 - teacher, 3 - student
                'password' => bcrypt($request->input('password')) 
            ]);

            $result = $user->save();

            if($result)
            {
                $student = Student::create([
                    'genID' => $request->input('studentGenID'),
                    'first_name' => $request->input('firstName'),
                    'last_name' => $request->input('lastName'),
                    'email' => $request->input('email'),
                    'grade' => $request->input('grade'),
                    'userID' => $user->id,
                    'contact_no' => $request->input('contactNo'),
                ]);

                $result_student = $student->save();
                if($result_student)
                {
                    return Redirect::to('admin/student')->with('successMsg', 'Student added successful..!');
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $id = $request->id;
        $student = Student::find($id);
        $data =array(
            'student'=>$student,
            'hasID' => true
        );
        return view('admin.student-enter')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validation = Validator::make($request->all(),[
            'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'required|email',
            'contactNo'=>'required|digits:10'

        ]);;

        if ($validation->fails()) {
            return Redirect::back()->withErrors($validation)->withInput();
        }else{

            $student = Student::find($id);
          
            $student->first_name = $request->input('firstName');
            $student->last_name = $request->input('lastName');
            $student->email = $request->input('email');
            $student->grade = $request->input('grade');
            $student->contact_no = $request->input('contactNo');
           // $teacher->save();
            
            $result_student = $student->save();
            if($result_student)
            {
               
                return Redirect::back()->with('successMsg', 'Student edit successful..!');;
                
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $student = Student::find($id);
        $student->delete();
        return Redirect::to('admin/student')->with('successMsg', 'Student delete successful..!');
    }
}
