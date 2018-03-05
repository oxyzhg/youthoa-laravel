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
            'display_name' => '超级管理员',
            'description'  => '超级管理员',
        ]);

        Role::create([
            'name'         => 'Managers',
            'display_name' => '管理员',
            'description'  => '管理员',
        ]);

        Role::create([
            'name'         => 'Member',
            'display_name' => '成员',
            'description'  => '成员',
        ]);

        Role::create([
            'name'         => 'Visitor',
            'display_name' => '游客',
            'description'  => '游客',
        ]);
    }
}
