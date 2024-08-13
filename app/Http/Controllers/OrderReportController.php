<?php

namespace App\Http\Controllers;

use App\Order;
use App\NotificationPush;
use Illuminate\Http\Request;

class OrderReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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

        return view('admin.orderReport.index',[
            'orders' => $orders,
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity,
            'request' => $request
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // dd($request);
        $notificationsQtd = NotificationPush::where('status', 0)->count();
        if($notificationsQtd > 0){
            foreach(NotificationPush::where('status', 0)->get() AS $notification){
                $notification->status = 1;
                $notification->save();
            }
        }
        $query = '';
        $orders = Order::with('orderCard')
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->select('customers.name', 'orders.*')
            ->orderBy('orders.created_at', 'DESC');

        if($request->status <> ''){
            $orders->where('orders.status', $request->status);
        }
        if($request->autorization <> ''){
            $orders->where('orders.autorization', $request->autorization);
        }
        if($request->month <> ''){
            $orders->whereMonth('orders.created_at', $request->month);
        }
        if($request->year <> ''){
            $orders->whereYear('orders.created_at', $request->year);
        }

        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();

        return view('admin.orderReport.index',[
            'orders' => $orders->get(),
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity,
            'request' => $request
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\OrderReport  $orderReport
     * @return \Illuminate\Http\Response
     */
    public function show($orderReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderReport  $orderReport
     * @return \Illuminate\Http\Response
     */
    public function edit($orderReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderReport  $orderReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $orderReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderReport  $orderReport
     * @return \Illuminate\Http\Response
     */
    public function destroy($orderReport)
    {
        //
    }
}
