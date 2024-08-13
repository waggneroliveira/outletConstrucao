<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    protected $table = 'subcategories';

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
