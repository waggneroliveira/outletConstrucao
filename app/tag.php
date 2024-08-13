<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tag extends Model
{
    protected $table = 'tags';

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
