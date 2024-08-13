<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OptionItem extends Model
{
    protected $table = 'options_items';

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
