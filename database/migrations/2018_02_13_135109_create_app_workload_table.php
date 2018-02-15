<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppWorkloadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_workloads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('member_id', 11)->default('');
            $table->string('description')->default('');
            $table->integer('workload')->default(0);
            $table->string('handler_id',11)->default('');
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
        Schema::dropIfExists('app_workloads');
    }
}
