<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductOptionCategory extends Model
{
    protected $table = 'product_option_categories';

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function productOptions(){
        return $this->hasMany(ProductOption::class, 'category_id', 'id');
    }
}
