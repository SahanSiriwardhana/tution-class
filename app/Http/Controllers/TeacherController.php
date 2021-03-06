<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Auth;
use App\InstituteClass;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teachers = Teacher::all(); 
        return view('admin.teacher',['teachers'=>$teachers]);
    }

    public function indexDashboard()
    {
        //
        //$teachers = Teacher::all(); 
        return view('admin.index-teacher');
    }

    public function teacherPayment()
    {
        //
        $teacher = Teacher::where('userID','=',Auth::user()->id)->get();
      //  $classList =DB::table('institute_classes')->where('teacherID','=',$teacher[0]->id)->get();
        
        $classList  = DB::select("SELECT i.id,i.class_name,t.first_name,t.last_name,i.fee,i.date,i.student_count,COUNT(c.id) AS paidCount,c.month FROM institute_classes AS i INNER JOIN teachers AS t ON i.teacherID = t.id LEFT JOIN class_payments AS c ON (i.id = c.class_id) where t.id = ".$teacher[0]->id." GROUP BY c.month");
        
        return view('admin.teacher-payment',['classList'=>$classList]);
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $maxTeacherID = Teacher::max('id');
        
        $newID = null;

        if($maxTeacherID == null){
            $newID = 1;
        }else{
            $newID = $maxTeacherID + 1;
        }
       
        $newTeacherID ="TEC".str_pad($newID,4,"0",STR_PAD_LEFT);
        
        $data =array(
            'new_teacher_id'=>$newTeacherID,
            'hasID' => false
        );

        return view('admin.teacher-enter')->with('data',$data);
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
                'user_role' => '2',// user lvl 1 -admin ,2 - teacher, 3 - student
                'password' => bcrypt($request->input('password')) 
            ]);

            $result = $user->save();

            if($result)
            {
                $teacher = Teacher::create([
                    'genID' => $request->input('teacherGenID'),
                    'first_name' => $request->input('firstName'),
                    'last_name' => $request->input('lastName'),
                    'email' => $request->input('email'),
                    'userID' => $user->id,
                    'contact_no' => $request->input('contactNo'),
                ]);

                $result_teacher = $teacher->save();
                if($result_teacher)
                {
                    return Redirect::to('admin/teacher')->with('successMsg', 'Teacher added successful..!');
                }
            }
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $id = $request->id;
        $class = InstituteClass::find($id);

        $paidCount =count(DB::table('class_payments')
            ->where([
                ['class_id','=',$id],
                ['month','=',date("m")]
                ])
            ->get());

        $studentList = DB::table('class_students')
        ->join('students', 'class_students.student_id', '=', 'students.id')
        ->where('class_students.class_id', '=', $id)
        ->get();
        
        
        return view('admin.teacher-class',['class'=>$class,'paidCount'=>$paidCount,'studentList'=>$studentList]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $id = $request->id;
        $teacher = Teacher::find($id);
        $data =array(
            'teacher'=>$teacher,
            'hasID' => true
        );
        return view('admin.teacher-enter')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
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

            $teacher = Teacher::find($id);
          
            $teacher->first_name = $request->input('firstName');
            $teacher->last_name = $request->input('lastName');
            $teacher->email = $request->input('email');
            $teacher->contact_no = $request->input('contactNo');
           // $teacher->save();
            
            $result_teacher = $teacher->save();
            if($result_teacher)
            {
               
                return Redirect::back()->with('successMsg', 'Teacher edit successful..!');;
                
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $teacher = Teacher::find($id);
        $teacher->delete();
        return Redirect::to('admin/teacher')->with('successMsg', 'Teacher delete successful..!');
    }
}
