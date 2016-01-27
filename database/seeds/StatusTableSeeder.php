<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$columns = ['Open', 'To do', 'Doing', 'Done', 'Completed'];

    	foreach($columns as $column)
    	{
	        DB::table('statuses')->insert([
	            'name' => $column,
	            'code' => ''
	        ]);
	    }
    }
}
