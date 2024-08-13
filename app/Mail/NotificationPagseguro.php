<?php

namespace App\Mail;

use App\Cards;
use App\Order;
use App\OrderItem;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationPagseguro extends Mailable
{
    use Queueable, SerializesModels;

    private $order;
    private $card;
    private $orderItem;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, Cards $card)
    {
        $this->order = $order;
        $this->card = $card;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $orderItem = OrderItem::join('products', 'products.id', '=', 'order_items.product_id')
            ->select('products.title', 'order_items.*')
            ->where('order_id', $this->order->id)->get();

        $this->subject('Daducha - Alteração de Status no seu Pedido');
        $this->to($this->order->customer_email, $this->order->customer_name);

        return $this->view('mail.NotificationPagseguro',[
            'order' => $this->order,
            'card' => $this->card,
            'orderItems' => $orderItem
        ]);
    }
}
