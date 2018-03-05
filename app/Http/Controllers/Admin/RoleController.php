<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\YouthUser;
use App\Models\Role;
use App\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(10);
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.role.add');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:2',
            'display_name' => 'required|min:2',
            'description' => 'required'
        ]);
        Role::create(request(['name', 'display_name',  'description']));
        return redirect('/admin/roles');
    }

    public function permission(Role $role)
    {
        $perms = Permission::all();
        $myPerms = $role->perms;
        $permids = [];
        foreach ($myPerms as $perm) {
            $permids[] = $perm->id;
        }
        return view('admin.role.permission', compact('perms', 'myPerms', 'permids'));
    }

    public function storePermission(Role $role)
    {
        $this->validate(request(), [
            'sdut_id' => 'required|exists:youth_users,sdut_id',
            'up_perms' => 'required|array'
        ]);
        $handler = YouthUser::where('sdut_id', request('sdut_id'))->first();
        if ($handler->can(['system_manage', 'admin_manage'])) {
            $upPerms = request('up_perms');
            $myPerms = $role->perms;
            foreach ($myPerms as $perm) {
                $role->deletePermission($perm);
            }
            $role->attachPermissions($upPerms);
            return redirect('/admin/roles');
        } else {
            return back()->withErrors('当前用户没有权限更改此数据');
        }
    }
}
