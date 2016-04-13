<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function tasks() {
        return $this->belongsToMany('App\Task');
    }

    public function completedTasks() {
        return $this->belongsToMany('App\Task')->where('status', Task::STATUS_COMPLETE);
    }
}
