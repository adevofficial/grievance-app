<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maper extends Model
{
    protected $fillable = ['uid', 'type'];

    public function user()
    {
        return $this->belongsTo('App\User', 'uid', 'id');
    }
}
