<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TaskGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$columns = ['New' => '#33ce74', 'Important' => '#c0392b', 'Soon' => '#f1c40f'];

    	foreach($columns as $name => $color)
    	{
	        DB::table('task_groups')->insert([
	            'name' => $name,
	            'color' => $color
	        ]);
	    }
    }
}
