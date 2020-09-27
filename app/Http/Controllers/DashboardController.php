<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\InstituteClass;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        
        $instituteClassCount =count(DB::table('institute_classes')->get());
        $studentsCount =count(DB::table('students')->get());
        $teachersCount =count(DB::table('teachers')->get());
        
        return view('admin.index',['instituteClassCount'=>$instituteClassCount,'studentsCount'=>$studentsCount,'teachersCount'=>$teachersCount]);
    }

}
?>