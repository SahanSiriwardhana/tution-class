<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = ['genID','first_name','last_name','grade','email','userID','contact_no'];
}
