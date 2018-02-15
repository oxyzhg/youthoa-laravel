<?php

namespace App\Models;

use App\Model;

class AppSigninRec extends Model
{
    protected $table = 'app_signin_records';
    public function user()
    {
        return $this->belongsTo('App\Models\YouthUser', 'sdut_id', 'sdut_id');
    }

    public function dutys()
    {
        return $this->belongsTo('App\Models\AppSigninDuty', 'sdut_id', 'sdut_id');
    }
}
