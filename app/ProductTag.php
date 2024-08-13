<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductTag extends Model
{
    protected $table = 'product_tags';

    use SoftDeletes;
    protected $data = ['deleted_at'];
}
