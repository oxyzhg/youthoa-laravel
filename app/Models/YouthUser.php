<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class YouthUser extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;
    protected $fillable = [ 'name', 'sdut_id', 'department', 'grade', 'phone', 'birthday', 'status'];

    // 给用户分配角色
    public function assignRole($role)
    {
        return $this->roles()->save($role);
    }

    // 取消用户分配的角色
    public  function deleteRole($role)
    {
        return $this->roles()->detach($role);
    }

    // 用户值班时间
    public function dutys()
    {
        return $this->hasOne('\App\Models\AppSigninDuty', 'sdut_id', 'sdut_id');
    }

    // 用户值班记录
    public function records()
    {
        return $this->hasMany('\App\Models\AppSigninRecord', 'sdut_id', 'sdut_id');
    }

    // 用户待办事项
    public function schedules()
    {
        return $this->hasMany('\App\Models\AppSchedule', 'sdut_id', 'sdut_id');
    }
}
