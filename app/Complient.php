<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complient extends Model
{

    protected $fillable = ['subject', 'message', 'category'];

    public function status()
    {
        return $this->hasMany('App\ComplientStatus', 'cid', 'id');
    }
}
