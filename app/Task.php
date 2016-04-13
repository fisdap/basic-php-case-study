<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    const STATUS_OPEN = 1;
    const STATUS_IN_PROGRESS = 2;
    const STATUS_COMPLETE = 3;


    protected $fillable = [
        'user_id',
        'status',
        'description'
    ];


    public function user() {
        return $this->belongsTo('App\User');
    }

    public function taskLists() {
        return $this->belongsToMany('App\TaskList');
    }
}
