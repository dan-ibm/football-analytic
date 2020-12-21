<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = [
        'id',
        'title',
        'commandA',
        'commandB',
        'predict',
        'description',
        'type',
        'img_src',
        'views'
    ];
}
