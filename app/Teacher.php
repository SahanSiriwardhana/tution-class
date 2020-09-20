<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $fillable = ['genID','first_name','last_name','email','userID','contact_no'];
}
