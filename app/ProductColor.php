<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductColor extends Model
{
    protected $table = 'product_colors';

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
