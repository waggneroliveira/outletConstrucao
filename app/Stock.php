<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    protected $table = 'stocks';

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function productSize(){
        return $this->hasOne(ProductSize::class, 'id', 'productSize_id');
    }
    public function productColor(){
        return $this->hasOne(ProductColor::class, 'id', 'productColor_id');
    }
    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
