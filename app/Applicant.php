<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use Notifiable;
    //
    public function getFirstnameAttribute($value)
    {
        return ucwords($value);
    }

    public function getLastnameAttribute($value)
    {
        return ucwords($value);
    }

    // public function routeNotificationForNexmo($notification)
    // {
    //     return $this->phoneno;
    // }
    public function routeNotificationForSMS()
    {
        return $this->phoneno; // where phone is a cloumn in your users table;
    }
}
