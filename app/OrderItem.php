<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    protected $table = 'order_items';

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function productOption(){
        return $this->belongsToMany(ProductOption::class, 'options_items', 'item_id', 'option_id');
    }
    public function optionItem(){
        return $this->hasMany(OptionItem::class, 'item_id', 'id');
    }
}
