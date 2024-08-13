<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductModel extends Model
{
    protected $table = "product_models";

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
