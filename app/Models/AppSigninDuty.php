<?php

namespace App\Models;

use App\Model;

class AppSigninDuty extends Model
{
    protected $table = 'app_signin_dutys';

    public function user()
    {
        return $this->belongsTo('App\Models\YouthUser', 'sdut_id', 'sdut_id');
    }
}
