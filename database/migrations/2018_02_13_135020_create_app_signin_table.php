<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppSigninTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 青春在线成员信息表
        Schema::create('youth_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sdut_id',11)->unique();
            $table->string('name', 30)->default('');
            $table->string('department', 30)->default('');
            $table->string('grade', 4)->default('');
            $table->string('phone', 11)->default('');
            $table->dateTime('birthday');
            $table->integer('status')->default(0); // 0使用 1正式 2退站 3劝退
            $table->timestamps();
        });

        // 签到任务表
        Schema::create('app_signin_dutys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sdut_id')->unique();
            $table->string('duty_at', 60)->default(''); // 0:1|6:5
            $table->timestamps();
        });

        // 签到记录表
        Schema::create('app_signin_records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sdut_id')->default('');
            $table->integer('status')->default(0);   // 0未签退 1正常值班 2多余值班 3早退 4无效值班
            $table->integer('duration')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('app_users');
        Schema::drop('app_signin_dutys');
        Schema::drop('app_signin_records');
    }
}
