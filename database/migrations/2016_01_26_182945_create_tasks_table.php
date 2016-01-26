<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->default(1); // No users so lets give default
            $table->string('task_title', 100);
            $table->string('task_description', 255);
            $table->integer('status_id')->default(1); // Open
            $table->boolean('is_deleted')->default(0);
            $table->integer('group_tasks_id')->default(1);
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
        //
    }
}
