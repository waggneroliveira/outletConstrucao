<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\NotificationPush;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();
        return view('admin.coupon.index',[
            'coupons' => Coupon::all(),
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity
        ]);
    }

    public function ajaxUpdate(Coupon $coupon,Request $request)
    {

        switch ($request->field){

            case 'active':
                $coupon->active = $request->active ? 1 : 0;
            break;

            case 'fixed_value':
                $coupon->fixed_value = $request->fixed_value ? 1 : 0;
            break;
            case 'first_order_only':
                $coupon->first_order_only = $request->first_order_only ? 1 : 0;
            break;
            case 'percentage':
                $coupon->percentage = $request->percentage ? 1 : 0;
            break;

        }

        $coupon->save();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();
        return view('admin.coupon.create',[
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "coupon" => 'required|max:255',
            "amount" => 'required',
        ],[
            'required'=>'O campo :attribute é obrigatorio',
        ]);

        $coupon = new Coupon();
        $coupon->coupon = $request->coupon;
        $coupon->amount = (float) $request->amount;
        $coupon->use_limit = (int) $request->use_limit == 0? null : (int) $request->use_limit ;
        $coupon->fixed_value = $request->fixed_value ? 1 : 0;
        $coupon->percentage = $request->percentage ? 1 : 0;
        $coupon->first_order_only = $request->first_order_only ? 1 : 0;
        $coupon->active = $request->active ? 1 : 0;

        $coupon->save();

        Session::flash('success','Cupom cadastrado com sucesso');

        return redirect()->route('admin.coupon.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Coupon $coupon)
    {
        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();
        return view('admin.coupon.edit',[
            'coupon'=>$coupon,
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        $this->validate($request,[
            "coupon" => 'required|max:255',
            "amount" => 'required',
        ],[
            'required'=>'O campo :attribute é obrigatorio',
        ]);

        $coupon->coupon = $request->coupon;
        $coupon->amount = (float) $request->amount;
        $coupon->use_limit = (int) $request->use_limit == 0? null : (int) $request->use_limit ;
//        $coupon->fixed_value = $request->fixed_value ? 1 : 0;
        $coupon->first_order_only = $request->first_order_only ? 1 : 0;
        $coupon->percentage = $request->percentage ? 1 : 0;
        $coupon->active = $request->active ? 1 : 0;

        $coupon->save();

        Session::flash('success','Cupom atualizado com sucesso');

        return redirect()->route('admin.coupon.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        Session::flash('success','Bairro deletado com sucesso');
        return redirect()->route('admin.coupon.index');
    }
}
