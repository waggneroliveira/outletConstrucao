<?php

namespace App\Http\Controllers;

use App\NotificationPush;
use Illuminate\Support\Str;
use App\BannerInstitutional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BannerInstitutionalController extends Controller
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
        return view('admin.bannerInstitutional.index',[
            'bannerInstitutionals' => BannerInstitutional::all(),
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
        return view('admin.bannerInstitutional.create',[
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
        if($request->hasFile('path_image_menu')){
            $clientOriginalName = $request->file('path_image_menu')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_image_menu')->extension();

            $newNameImageMenu = $nameSlug.'.'.$extension;
        }

        $bannerInstitutional = new BannerInstitutional();
        $bannerInstitutional->path_image_menu = $newNameImageMenu;
        if($bannerInstitutional->save()){
            if($request->hasFile('path_image_menu')){
                $request->file('path_image_menu')->storeAs('admin/uploads/fotos', $newNameImageMenu);
            }

            Session::flash('success','Banner cadastrado com sucesso');
            return redirect()->route('admin.bannerInstitutional.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BannerInstitutional  $bannerInstitutional
     * @return \Illuminate\Http\Response
     */
    public function show(BannerInstitutional $bannerInstitutional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BannerInstitutional  $bannerInstitutional
     * @return \Illuminate\Http\Response
     */
    public function edit(BannerInstitutional $bannerInstitutional)
    {
        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();
        return view('admin.bannerInstitutional.edit',[
            'bannerInstitutional' => $bannerInstitutional,
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BannerInstitutional  $bannerInstitutional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BannerInstitutional $bannerInstitutional)
    {
        if($request->hasFile('path_image_menu')){
            $clientOriginalName = $request->file('path_image_menu')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_image_menu')->extension();

            $newNameImageMenu = $nameSlug.'.'.$extension;
        }

        $bannerInstitutional->path_image_menu = $newNameImageMenu;
        if($bannerInstitutional->save()){
            if($request->hasFile('path_image_menu')){
                $request->file('path_image_menu')->storeAs('admin/uploads/fotos', $newNameImageMenu);
            }

            Session::flash('success','Banner alterado com sucesso');
            return redirect()->route('admin.bannerInstitutional.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BannerInstitutional  $bannerInstitutional
     * @return \Illuminate\Http\Response
     */
    public function destroy(BannerInstitutional $bannerInstitutional)
    {
        Storage::delete('admin/uploads/fotos/'.$bannerInstitutional->path_image_menu);

        if($bannerInstitutional->delete()){
            Session::flash('success','Banner deletado com sucesso');
        }

        return redirect()->route('admin.bannerInstitutional.index');
    }
}
