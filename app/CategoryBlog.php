<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryBlog extends Model
{
    protected $table = 'category_blogs';

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
