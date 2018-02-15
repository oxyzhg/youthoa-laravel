<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model;

class AppSchedule extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\YouthUser', 'sdut_id', 'sdut_id');
    }
}
