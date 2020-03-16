<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    //
    protected $fillable = [
        'activity_undertaken', 
        'region', 
        'district', 
        'quarter', 
        'applicant_id', 
        'registered',
        'activity_type'

    ];

    public function applicant(){
        return $this->belongsTo('App\Applicant');
    }

}
