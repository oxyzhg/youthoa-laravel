<?php

use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createRole();
    }

    public function createRole()
    {
        Role::create([
            'name'         => 'Administrator',
            'display_name' => '站长',
            'description'  => '网站站长',
        ]);

        Role::create([
            'name'         => 'Chairman',
            'display_name' => '主任',
            'description'  => '部门主任',
        ]);

        Role::create([
            'name'         => 'Manager',
            'display_name' => '管理',
            'description'  => '管理员',
        ]);

        Role::create([
            'name'         => 'Member',
            'display_name' => '正式',
            'description'  => '正式',
        ]);

        Role::create([
            'name'         => 'Retired',
            'display_name' => '退站',
            'description'  => '退站',
        ]);

        Role::create([
            'name'         => 'Trial',
            'display_name' => '试用',
            'description'  => '试用',
        ]);
    }
}
