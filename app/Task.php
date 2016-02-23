<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'description', 'state', 'list_id', 'user_id'];

    public function list() {
      return $this->belongsTo('App\List');
    }

    public function user() {
      return $this->belongsTo('App\User');
    }
}
