<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maper extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'uid', 'id');
    }
}
