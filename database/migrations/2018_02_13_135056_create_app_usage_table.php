<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppUsageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_usages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('machine')->default('');
            $table->string('activity')->default('');
            $table->dateTime('datetime');
            $table->string('borrower_id', 11)->default('');
            $table->string('memo_id', 11)->default('');
            $table->string('rememo_id', 11)->default('');
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_usage');
    }
}
