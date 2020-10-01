<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\InstituteClass;
use App\Teacher;
use App\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        
        if(Auth::user()->user_role=='1'){
            // Admin
            $instituteClassCount =count(DB::table('institute_classes')->get());
            $studentsCount =count(DB::table('students')->get());
           // dd(date('Y-m'));
            $studentsCountMonthly =count(DB::table('students')->where('created_at','like',date('Y-m').'%')->get());
            $teachersCount =count(DB::table('teachers')->get());
            $classList  = DB::select("SELECT i.id,i.class_name,t.first_name,t.last_name,i.fee,i.date,i.student_count, COUNT(c.id) AS paidCount FROM institute_classes AS i INNER JOIN teachers AS t ON i.teacherID = t.id LEFT JOIN class_payments AS c ON (i.id = c.class_id AND (c.month=".date("m").")) GROUP BY i.id");
            //dd($classList);
            return view('admin.index',['instituteClassCount'=>$instituteClassCount,'studentsCount'=>$studentsCount,'teachersCount'=>$teachersCount,'studentsCountMonthly'=>$studentsCountMonthly,'classList'=>$classList]);
        }else if(Auth::user()->user_role=='2'){
            // Teacher
            $teacher = Teacher::where('userID','=',Auth::user()->id)->get();
            $classList =DB::table('institute_classes')->where('teacherID','=',$teacher[0]->id)->get();
            $classCount =count($classList);

            
            $teachersCount =count(DB::table('teachers')->get());
            
            return view('admin.index-teacher',['classCount'=>$classCount,'classList'=>$classList,'teachersCount'=>$teachersCount]);
        }else if(Auth::user()->user_role=='3'){
            // Student
            $students = Student::where('userID','=',Auth::user()->id)->get();

            $classCount =count(DB::table('class_students')->where('student_id','=',$students[0]->id)->get());

            $paidClassCount =count(DB::table('class_payments')
            ->where([
                ['student_id','=',$students[0]->id],
                ['month','=',date("m")]
                ])
            ->get());

            $paidList = DB::table('class_payments')
            ->join('institute_classes','class_payments.class_id','=','institute_classes.id')
            ->where([
                ['student_id','=',$students[0]->id],
                ['month','=',date("m")]
                ])
            ->select('class_payments.created_at','class_payments.payment_method','class_name','fee')
            ->get();

            $unpaidList = DB::select("SELECT class_name,fee,date FROM class_students inner join institute_classes ON class_students.class_id=institute_classes.id WHERE student_id=".$students[0]->id." AND class_students.class_id NOT IN (SELECT class_payments.class_id FROM class_payments WHERE student_id=".$students[0]->id." AND class_payments.month=".date("m").") ");
            
            return view('admin.index-student',['classCount'=>$classCount,'paidClassCount'=>$paidClassCount,'paidList'=>$paidList,'unpaidList'=>$unpaidList]);
        }
        

    }

}
?>