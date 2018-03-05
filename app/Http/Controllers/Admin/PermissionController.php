<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::paginate(10);
        return view('admin.permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permission.add');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:3',
            'description' => 'required'
        ]);
        Permission::create(request(['name', 'description']));
        return redirect('/admin/permissions');
    }
}
