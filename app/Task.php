<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function state()
    {
      return $this->belongsTo('App\State');
    }
}
