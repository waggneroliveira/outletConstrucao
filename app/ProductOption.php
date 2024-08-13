<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductOption extends Model
{
    protected $table = 'product_options';

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
