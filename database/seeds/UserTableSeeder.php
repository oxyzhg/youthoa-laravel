<?php

use Illuminate\Database\Seeder;

use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 创建后台管理用户
        User::create([
            'name'     => 'youthol',
            'email'    => 'youthlab@126.com',
            'password' => bcrypt('youth123')
        ]);
    }
}
