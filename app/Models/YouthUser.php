<?php

namespace App\Models;

use App\Model;

class YouthUser extends Model
{
    protected $table = 'youth_users';

    public function dutys()
    {
        return $this->hasOne('\App\Models\AppSigninDuty', 'sdut_id', 'sdut_id');
    }

    public function records()
    {
        return $this->hasMany('\App\Models\AppSigninRecord', 'sdut_id', 'sdut_id');
    }

    public function schedules()
    {
        return $this->hasMany('\App\Models\AppSchedule', 'sdut_id', 'sdut_id');
    }
}
