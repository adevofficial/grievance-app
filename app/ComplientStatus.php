<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplientStatus extends Model
{

    protected $fillable = ['status', 'status_body', 'cid'];
}
