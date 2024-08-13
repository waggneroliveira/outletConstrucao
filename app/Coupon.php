<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $fillable = ['coupon','amount'];

    use SoftDeletes;

}
