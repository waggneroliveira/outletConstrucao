<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSize extends Model
{
    protected $table = 'product_sizes';

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
