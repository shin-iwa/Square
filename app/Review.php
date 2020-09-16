<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //

    Public function user()
    {
      return $this->belongsTo('App\User');
    }

}

