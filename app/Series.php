<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $fillable = ['user_id', 'name'];

    public function user() {
      return $this->belongsTo('App\User');
    }

    public function tasks() {
      return $this->hasMany('App\Task');
    }
}
