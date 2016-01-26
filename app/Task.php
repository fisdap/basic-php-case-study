<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    public function getTasks()
    {
    	$this->where('is_delete', '0')->get();
    }
}
