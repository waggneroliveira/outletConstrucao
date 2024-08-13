<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    protected $table = 'brands';

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
