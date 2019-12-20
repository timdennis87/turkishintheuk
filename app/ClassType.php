<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassType extends Model
{
    protected $table = 'class_types';

    public $timestamps = false;

    protected $guarded = [];
}