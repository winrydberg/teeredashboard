<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApprovedApplication extends Model
{
    //
    public function admins(){
        return $this->hasMany('App\Admin', 'admin_id');
    }
}
