<?php

namespace App\Http\Controllers\Customer\Auth\Traits;

use Gloudemans\Shoppingcart\Facades\Cart;

trait RedirectsUsersTrait
{
    public function redirectTo()
    {
        if(Cart::count() > 0){
            return '/carrinho';
        }else{
            return '/cliente';
        }
    }
}
