<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassStudent extends Model
{
    //
    //public $timestamps = false;

    protected $fillable = ['class_id','student_id'];
}
