<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTaskListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_task_list', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integer('task_id', false, true);
            $table->integer('task_list_id', false, true);

            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');;
            $table->foreign('task_list_id')->references('id')->on('task_lists')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_task_list');
    }
}
