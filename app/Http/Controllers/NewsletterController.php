<?php

namespace App\Http\Controllers;

use App\Newsletter;
use App\NotificationPush;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewsletterController extends Controller
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
        return view('admin.newsletter.index',[
            'newsletters' => Newsletter::all(),
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
        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();
        return view('admin.newsletter.index',[
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
        $newsletter = new Newsletter();
        $newsletter->name = $request->name;
        $newsletter->email = $request->email;
        $newsletter->profession = $request->profession;
        $newsletter->phone = $request->phone;
        if($newsletter->save()){
            Session::flash('success','Obrigado por se inscrever em nosso clube.');
            return redirect()->back();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsletter $newsletter)
    {
        //
    }
}
