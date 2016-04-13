<?php

use App\Task;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($x = 1; $x < 20; $x++) {
            $task = Task::create([
                'user_id' => '1',
                'description' => 'Demo Task '.$x,
                'status' => rand(1,3),
            ]);

            $task->taskLists()->attach(rand(1,3));
        }
    }
}
