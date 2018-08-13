<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complient extends Model
{

    protected $fillable = ['subject', 'messgae', 'category'];
}
