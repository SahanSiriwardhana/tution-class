<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstituteClass extends Model
{
    //
    protected $fillable = ['class_name','scheme', 'year_for_examination','subject','date', 'start_time', 'end_time', 'fee', 'teacherID','status','student_count'];

    
}
