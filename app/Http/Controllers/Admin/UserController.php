<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\YouthUser;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = YouthUser::orderBy('id', 'DESC')->get();
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

    public function upload()
    {
        return view('admin.user.upload');
    }

    public function import()
    {
        $UserFilePath = 'storage/excel/'.iconv('UTF-8', 'GBK', 'youth_users').'.xls';

        Excel::load($UserFilePath, function ($reader) {
            $data = $reader->all();// $data 即为表格导入的数据

            for ($i=0; $i<count($data); $i++) {
                $data[$i]['birthday'] = date('Y-m-d', strtotime($data[$i]['birthday']));
                $data[$i]['rolenum'] = intval($data[$i]['rolenum']);
                $data[$i]['status'] = intval($data[$i]['status']);
            }

            DB::statement('truncate table youth_users');
            DB::statement('truncate table role_user');

            $data->each(function ($item, $key) {
                $item = $item->toArray();
                $user = YouthUser::create($item);
                $user->attachRole($item['rolenum']);
                $user->attachRole($item['status']);
            });
        });
    }

    public function export()
    {
        $YouthUsers = YouthUser::all()->toArray();
        for ($i=0; $i<count($YouthUsers); $i++) {
            unset($YouthUsers[$i]['id']);
            unset($YouthUsers[$i]['created_at']);
            unset($YouthUsers[$i]['updated_at']);
            $YouthUsers[$i]['birthday'] = date('Y-m-d', strtotime($YouthUsers[$i]['birthday']));
            $YouthUsers[$i]['status'] = strval($YouthUsers[$i]['status']);
        }
        Excel::create(iconv('UTF-8', 'GBK', 'youth_user'),function($excel) use ($YouthUsers){
            $excel->sheet('youth_user', function($sheet) use ($YouthUsers){
                $sheet->fromArray($YouthUsers);
            });
        })->store('xls')->export('xls');
    }
}
