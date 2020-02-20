<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    //
    public function getFirstnameAttribute($value)
    {
        return ucwords($value);
    }

    public function getLastnameAttribute($value)
    {
        return ucwords($value);
    }
}
