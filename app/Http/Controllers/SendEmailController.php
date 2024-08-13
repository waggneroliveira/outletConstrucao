<?php

namespace App\Http\Controllers;

use App\Cards;
use App\Order;
use App\Customer;
use App\OrderItem;
use App\Integration;
use App\Mail\ContactUs;
use Illuminate\Http\Request;
use App\Mail\NotificationPagseguro;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentOrderNotification;

class SendEmailController extends Controller
{
    public static function NotificationPagseguro($order)
    {
        $order = Order::join('customers', 'customers.id', '=', 'orders.customer_id')
            ->join('adresses', 'adresses.id', '=', 'orders.address_id')
            ->select(
                'customers.name as customer_name',
                'customers.email as customer_email',
                'customers.phone as customer_phone',
                'orders.*',
                'adresses.public_place',
                'adresses.number',
                'adresses.zip_code',
                'adresses.complement',
                'adresses.reference',
                'adresses.state',
                'adresses.city',
                'adresses.region',
            )
            ->find($order);
        $card = $card = Cards::find(0);
        if($order->card_id <> 0){
            $card = Cards::find($order->card_id);
        }

        Mail::send(new NotificationPagseguro($order, $card));
        // return new NotificationPagseguro($order, $card);
    }

    public static function PaymentOrderNotification($order)
    {
        $order = Order::join('customers', 'customers.id', '=', 'orders.customer_id')
            ->join('adresses', 'adresses.id', '=', 'orders.address_id')
            ->select(
                'customers.name as customer_name',
                'customers.email as customer_email',
                'customers.phone as customer_phone',
                'orders.*',
                'adresses.public_place',
                'adresses.number',
                'adresses.zip_code',
                'adresses.complement',
                'adresses.reference',
                'adresses.state',
                'adresses.city',
                'adresses.region',
            )
            ->find($order);
        $card = $card = Cards::find(0);
        if($order->card_id <> 0){
            $card = Cards::find($order->card_id);
        }

        Mail::send(new PaymentOrderNotification($order, $card));
        // return new PaymentOrderNotification($order, $card);
    }

    public static function ContactUs($request)
    {
        Mail::send(new ContactUs($request));
        // return new ContactUs($request);
    }
}
