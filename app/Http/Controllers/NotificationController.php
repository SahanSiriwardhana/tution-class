<?php

namespace App\Http\Controllers;

use Auth;
use App\Teacher;
use App\Notification;
use Illuminate\Http\Request;
use App\InstituteClass;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teacher = Teacher::where('userID','=',Auth::user()->id)->get();
        
        $notification = Notification::join('institute_classes','notifications.class_id','=','institute_classes.id')
        ->where('institute_classes.teacherID','=',$teacher[0]->id)
        ->select('institute_classes.class_name', 'notifications.*')
        ->get();
      //  dd($notification);
        return view('admin.notification',['notification'=>$notification]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $teacher = Teacher::where('userID','=',Auth::user()->id)->get();
        $classes = InstituteClass::where('teacherID','=',$teacher[0]->id)->get();
        
        $data =array(
            'hasID' => false,
            'classes'=>$classes
        );

        return view('admin.notification-enter')->with('data',$data);
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
            'date'=>'required',
            'message'=>'required',
            
        ]);;

        if ($validation->fails()) {
            return Redirect::back()->withErrors($validation)->withInput();
        }else{

            $instituteClass = Notification::create([
                'class_id' => $request->input('className'),
                'date' => $request->input('date'),
                'message' => $request->input('message'),
               
            ]);

            $result = $instituteClass->save();

            if($result)
            {
                    return Redirect::to('admin/notification')->with('successMsg', 'Notification added successful..!');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $id = $request->id;
        $classes = InstituteClass::where('teacherID','=','4')->get();
        $notification=Notification::find($id);
        $data =array(
            'hasID' => true,
            'classes'=>$classes,
            'notification'=>$notification
        );
        return view('admin.notification-enter')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // dd($request);
        //
        $validation = Validator::make($request->all(),[
            'className'=>'required',
            'date'=>'required',
            'message'=>'required'
        ]);;

        if ($validation->fails()) {
            return Redirect::back()->withErrors($validation)->withInput();
        }else{

            $notification = Notification::find($id);
          
            $notification->class_id = $request->input('className');
            $notification->date = $request->input('date');
            $notification->message = $request->input('message');
           // $teacher->contact_no = $request->input('contactNo');
           // $teacher->save();
            
            $result = $notification->save();
            if($result)
            {
               
                return Redirect::back()->with('successMsg', 'Notification edit successful..!');;
                
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
