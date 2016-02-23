<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class List extends Model
{
    protected $fillable = ['user_id', 'name'];

    public function user() {
      return $this->belongsTo('App\User');
    }
}
