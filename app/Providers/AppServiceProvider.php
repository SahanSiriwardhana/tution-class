<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Student;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
            View::composer('layout.navbars.navbar', function ($view) {
                $data ="";
                if(Auth::user()->user_role=='3'){
                $students = Student::where('userID','=',Auth::user()->id)->get();
                $notifications = DB::select("SELECT message,class_name,notifications.date FROM `notifications` INNER JOIN class_students ON notifications.class_id=class_students.class_id INNER JOIN institute_classes ON class_students.class_id=institute_classes.id WHERE class_students.student_id=".$students[0]->id." ORDER BY `notifications`.`created_at`  DESC LIMIT 20;");
                $data =array(
                    'notifications' => $notifications,
                    'count'=> COUNT($notifications)
                );
                }
                $view->with('data', $data);
            });
    }
}
