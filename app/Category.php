<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $table = 'categories';

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function subcategory(){
        return $this->hasMany(Subcategory::class)->whereExists(function($query){
            $query->select(Product::raw('id'))
                ->from('products')
                ->whereRaw('products.subcategory_id = subcategories.id');
            })->where([
                ['active', '=', 1],
            ]);
    }

    public function products(){
        return $this->hasMany(Product::class)->with('gallery')->with('stocks')->orderBy('order', 'ASC');
    }

    public function productsDestaque(){
        return $this->hasMany(Product::class)->with('productCover')->with('stocks')->orderBy('order', 'ASC');
    }
}
