<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    protected $table = 'orders';

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function orderItems(){
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

    public function orderCard(){
        return $this->hasMany(Cards::class, 'id', 'card_id');
    }

}
