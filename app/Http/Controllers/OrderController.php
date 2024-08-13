<?php

namespace App\Http\Controllers;

use App\Cards;
use App\Order;
use App\OrderItem;
use Dompdf\Options;
use App\PaymentMethod;
use App\NotificationPush;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notificationsQtd = NotificationPush::where('status', 0)->count();
        if($notificationsQtd > 0){
            foreach(NotificationPush::where('status', 0)->get() AS $notification){
                $notification->status = 1;
                $notification->save();
            }
        }

        $orders = Order::with('orderCard')
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->select('customers.name', 'orders.*')
            ->orderBy('orders.created_at', 'DESC')
            ->get();

        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();

        return view('admin.order.index',[
            'orders' => $orders,
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {

        $order = Order::join('customers', 'customers.id', '=', 'orders.customer_id')
            ->join('adresses', 'adresses.id', '=', 'orders.address_id')
            ->select('orders.*', 'orders.created_at as order_created', 'orders.id as orderId', 'customers.*', 'adresses.*')
            ->where('orders.id', $order->id)
            ->first();

        $card = Cards::find($order->card_id);

        $itens = OrderItem::with('productOption')->with('optionItem')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->select('order_items.*', 'products.title', 'products.reference_code')
            ->where('order_items.order_id', $order->orderId)
            ->get();
        // dd($itens);

        $data = view('admin.order.show',[
            'order' => $order,
            'items' => $itens,
            'card' => $card
        ]);

        $pdf = App::make('dompdf.wrapper');
        // $pdf->
        $pdf->loadHTML($data);

        return $pdf->stream($order->name.' - Pedido #OS'.str_pad($order->orderId, 4, "0", STR_PAD_LEFT) .' '. $order->created_at->format('d/m/Y H:i').'.pdf');
        // return view('admin.order.show',[
        //     'order' => $order,
        //     'items' => $itens,
        //     'card' => $card
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $orders = Order::join('customers', 'customers.id', '=', 'orders.customer_id')
            ->join('adresses', 'adresses.id', '=', 'orders.address_id')
            ->select('orders.*', 'orders.created_at as order_created', 'orders.id as orderId', 'customers.*', 'adresses.*')
            ->where('orders.id', $order->id)
            ->first();

        $card = Cards::find($orders->card_id);

        $itens = OrderItem::with('productOption')->with('optionItem')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->select('order_items.*', 'products.title', 'products.reference_code')
            ->where('order_items.order_id', $order->id)
            ->get();

        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();

        return view('admin.order.edit',[
            'order' => $orders,
            'items' => $itens,
            'paymentMethods' => PaymentMethod::all(),
            'notifications' => $notifications,
            'notificationQuantity' => COUNT($notifications),
            'card' => $card
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->status = $request->status?:'';
        $order->restriction_code = $request->restriction_code?:'';
        $order->autorization = $request->autorization;
        $order->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        if($order->delete()){
            Session::flash('success','Pedido deletado com sucesso');
        }

        return redirect()->route('admin.order.index');
    }
}
