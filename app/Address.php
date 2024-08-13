<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    protected $table = 'adresses';

    use Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

}
