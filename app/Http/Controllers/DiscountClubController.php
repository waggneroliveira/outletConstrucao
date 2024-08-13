<?php

namespace App\Http\Controllers;

use App\Advantage;
use App\DiscountClub;
use App\HowWorks;
use App\NotificationPush;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DiscountClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discountClub = DiscountClub::first();
        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();
        return view('admin.discountClub.index',[
            'discountClub' => $discountClub,
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity
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
     * @param  \App\DiscountClub  $discountClub
     * @return \Illuminate\Http\Response
     */
    public function show(DiscountClub $discountClub)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DiscountClub  $discountClub
     * @return \Illuminate\Http\Response
     */
    public function edit(DiscountClub $discountClub)
    {
        $howWorks = HowWorks::all();
        $advantages = Advantage::all();
        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();
        return view('admin.discountClub.edit',[
            'discountClub' => $discountClub,
            'howWorks' => $howWorks,
            'advantages' => $advantages,
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DiscountClub  $discountClub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiscountClub $discountClub)
    {
        $discountClub->title = $request->title;
        $discountClub->subtitle = $request->subtitle;
        $discountClub->description = $request->description;
        $discountClub->active = $request->active?:0;
        if($discountClub->save()){
            Session::flash('success','Clube de Desconto atualizado com sucesso');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DiscountClub  $discountClub
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiscountClub $discountClub)
    {
        //
    }
}
