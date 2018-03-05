<?php

use Illuminate\Database\Seeder;
use App\Models\YouthUser;

class YouthUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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
    }
}
