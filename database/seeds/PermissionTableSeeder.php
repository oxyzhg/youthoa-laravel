<?php

use Illuminate\Database\Seeder;

use App\Models\YouthUser;
use App\Models\Role;
use App\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createPermission();
        $this->attachPermissionToRole();
        // $this->attachRoleToUser();
    }

    public function createPermission()
    {
        Permission::create([
            'name'         => 'system_manage',
            'display_name' => '系统管理',
            'description'  => '系统全局管理',
        ]);

        Permission::create([
            'name'         => 'admin_manage',
            'display_name' => '用户权限管理',
            'description'  => '用户权限增删改查管理',
        ]);

        Permission::create([
            'name'         => 'app_manage',
            'display_name' => '应用数据管理',
            'description'  => '应用数据增删改查管理',
        ]);
    }

    public function attachPermissionToRole()
    {
        $Role = Role::where('name','=','Administrator')->first();
        $Permissions = Permission::all()->toArray();
        $PermissionsIds = [];
        foreach ($Permissions as $Permission) {
            $PermissionsIds[] = $Permission['id'];
        }
        $Role->perms()->sync($PermissionsIds);
    }

    public function attachRoleToUser()
    {
        $User = User::where('name','admin')->first();
        $Role = Role::where('name','Administrator')->first()->toArray();
        $User->attachRole($Role['id']);
    }
}
