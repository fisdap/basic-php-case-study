<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskGroup extends Model
{
	public $timestamps = false;

    protected $table = 'task_groups';
}
