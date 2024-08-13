<?php

namespace App;

use App\Notifications\Customer\OrderReceipt as OrderReceipt;
use App\Notifications\Customer\ResetPasswordNotification as CustomerResetPassordsNotification;
use App\Notifications\Customer\VerifyEmail as CustomerVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Customer extends Authenticatable
{

    use Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomerResetPassordsNotification($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    // public function sendEmailVerificationNotification(){
    //     $this->notify(new CustomerVerifyEmail());
    // }

    public function sendOrderReceipt(){
        $this->notify(new OrderReceipt());
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','cpf','phone','active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
