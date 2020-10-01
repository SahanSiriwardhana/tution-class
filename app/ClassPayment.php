<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassPayment extends Model
{
    //
    protected $fillable = ['class_id','student_id','month','payment_method'];
}
