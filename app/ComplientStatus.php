<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplientStatus extends Model
{
    protected $table = 'complient_status';

    protected $fillable = ['status', 'status_body', 'cid'];
}
