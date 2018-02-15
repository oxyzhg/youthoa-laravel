<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model;

class AppUsage extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function borrower()
    {
        return $this->belongsTo('App\Models\YouthUser', 'borrower_id', 'sdut_id');
    }

    public function memo()
    {
        return $this->belongsTo('App\Models\YouthUser', 'memo_id', 'sdut_id');
    }

    public function rememo()
    {
        return $this->belongsTo('App\Models\YouthUser', 'rememo_id', 'sdut_id');
    }
}
