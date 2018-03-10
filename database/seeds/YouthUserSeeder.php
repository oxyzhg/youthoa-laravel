<?php

use Illuminate\Database\Seeder;
use App\Models\YouthUser;
use App\Models\Role;

class YouthUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createUser();
        $this->attachRoleToUser();
    }

    public function createUser()
    {
        YouthUser::create([
            'sdut_id'    => '15110302127',
            'name'       => '张强',
            'department' => '程序部',
            'grade'      => '2015',
            'phone'      => '17864305305',
            'birthday'   => '1996-12-01',
            'status'     => 1
        ]);

        YouthUser::create([
            'sdut_id'    => '16111111111',
            'name'       => '张三',
            'department' => '综合部',
            'grade'      => '2016',
            'phone'      => '17899999999',
            'birthday'   => '1999-11-08',
            'status'     => 0
        ]);
    }

    public function attachRoleToUser()
    {
        $User = YouthUser::where('sdut_id','15110302127')->first();
        $Role = Role::where('name','Administrator')->first()->toArray();
        $User->attachRole($Role['id']);
    }
}
