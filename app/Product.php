<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $table = 'products';

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function gallery(){
        return $this->hasMany(product_gallery::class, 'product_id')->orderBy('product_cover', 'DESC');
    }

    public function productCover(){
        return $this->hasMany(product_gallery::class, 'product_id')->where('product_cover', 1);
    }

    public function stocksDefault(){
        return $this->hasMany(Stock::class, 'product_id')
            ->join('product_sizes', 'product_sizes.id', '=', 'stocks.productSize_id')
            ->select('product_sizes.title', 'product_sizes.sizeChart', 'stocks.*')->where('stocks.quantity','>', 0)->groupBy('product_id');
    }

    public function stocks(){
        return $this->hasMany(Stock::class, 'product_id')
            ->join('product_sizes', 'product_sizes.id', '=', 'stocks.productSize_id')
            ->select('product_sizes.title', 'stocks.*');
    }

    public function productTags(){
        return $this->hasMany(product_tags::class, 'product_id');
    }

    public function productModel()
    {
        return $this->hasMany(ProductModel::class, 'product_id', 'id');
    }
}
