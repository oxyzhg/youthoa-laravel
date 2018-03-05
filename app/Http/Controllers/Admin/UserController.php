<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\YouthUser;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = YouthUser::paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.add');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:2',
            'sdut_id' => 'required|min:11',
            'department' => 'required',
            'grade' => 'required|min:4'
        ]);
        YouthUser::create(compact(request(['name', 'sdut_id', 'department', 'grade', 'phone', 'birthday'])));
        return redirect('/admin/users');
    }

    public function role(YouthUser $user)
    {
        $roles = Role::all();
        $myRoles = $user->roles;
        $roleids = [];
        foreach ($myRoles as $role) {
            $roleids[] = $role->id;
        }
        return view('admin.user.role', compact('roles', 'myRoles', 'roleids',  'user'));
    }

    public function storeRole(YouthUser $user)
    {
        $this->validate(request(), [
            'sdut_id' => 'required|exists:youth_users,sdut_id',
            'up_roles' => 'required|array'
        ]);
        $handler = YouthUser::where('sdut_id', request('sdut_id'))->first();
        if ($handler->can(['system_manage', 'admin_manage'])) {
            $upRoles = request('up_roles');
            $myRoles = $user->roles;
            foreach ($myRoles as $role) {
                $user->deleteRole($role);
            }
            $user->attachRoles($upRoles);
            return redirect('/admin/users');
        } else {
            return back()->withErrors('当前用户没有权限更改此数据');
        }
    }
}
