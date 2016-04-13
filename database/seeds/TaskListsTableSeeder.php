<?php

use Illuminate\Database\Seeder;

class TaskListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_lists')->insert([
            'user_id' => '1',
            'name' => 'Fisdap Task Manager',
            'description' => 'Your task is to create a basic task manager (I know, I know, I\'m sorry). The requirements are below. Our recommendation is to read through the whole list before you consider the architecture you wish to employ.',
            'due_date' => '2016-04-12'
        ]);

        DB::table('task_lists')->insert([
            'user_id' => '1',
            'name' => 'Task List #2',
            'description' => 'Demo task list #2.',
            'due_date' => '2016-04-12'
        ]);

        DB::table('task_lists')->insert([
            'user_id' => '1',
            'name' => 'Task List #3',
            'description' => 'Demo task list #3.',
            'due_date' => '2016-04-12'
        ]);
    }
}
