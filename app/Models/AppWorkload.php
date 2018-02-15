<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model;

class AppWorkload extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function member()
    {
        return $this->belongsTo('App\Models\YouthUser', 'member_id', 'sdut_id');
    }

    public function handler()
    {
        return $this->belongsTo('App\Models\YouthUser', 'handler_id', 'sdut_id');
    }
}
