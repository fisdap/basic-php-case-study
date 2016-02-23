<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'description', 'state', 'series_id', 'user_id'];

    public function series() {
      return $this->belongsTo('App\Series');
    }

    public function user() {
      return $this->belongsTo('App\User');
    }
}
