<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYouthUsersTable extends Migration
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

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('youth_users');
    }
}
