<?php

namespace App\Http\Controllers;

use App\Extra;
use App\NotificationPush;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExtraController extends Controller
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
        return view('admin.extra.index', [
            'extras'=>Extra::all(),
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
        return view('admin.extra.create',[
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
            "extra" => 'required|max:255'
        ],[
            'required'=>'O campo :attribute é obrigatorio',
        ]);

        $extra = new Extra();
        $extra->extra = $request->extra;
        $extra->active = $request->active ? 1 : 0;

        $extra->save();

        Session::flash('success','Cupom cadastrado com sucesso');

        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();

        return redirect()->route('admin.extra.index',[
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function show(Extra $extra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function edit(Extra $extra)
    {
        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();

        return view('admin.extra.edit',[
            'extra'=>$extra,
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Extra $extra)
    {
        $this->validate($request,[
            "extra" => 'required|max:255',
        ],[
            'required'=>'O campo :attribute é obrigatorio',
        ]);

        $extra->extra = $request->extra;
        $extra->active = $request->active ? 1 : 0;

        $extra->save();

        Session::flash('success','Extra atualizado com sucesso');

        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();

        return redirect()->route('admin.extra.index',[
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity
        ]);

    }

    public function ajaxUpdate(Extra $Extra,Request $request)
    {

        switch ($request->field){

            case 'active':
                $Extra->active = $request->active ? 1 : 0;
                break;

        }

        $Extra->save();

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Extra $extra)
    {
        $extra->delete();
        Session::flash('success','Extra deletado com sucesso');
        return redirect()->route('admin.extra.index');
    }
}
