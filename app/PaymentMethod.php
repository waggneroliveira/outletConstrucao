<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model
{
    protected $table = "payment_methods";
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
