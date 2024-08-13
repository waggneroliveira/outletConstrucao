<?php

namespace App\Http\Controllers;

use App\Brand;
use App\NotificationPush;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
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

        return view('admin.brand.index', [
            'brands' => Brand::all(),
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
        return view('admin.brand.create',[
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
        if($request->hasFile('path_image')){
            $clientOriginalName = $request->file('path_image')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_image')->extension();

            $newNameImage = $nameSlug.'.'.$extension;
        }

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->active = $request->active ? 1:0;
        if($request->hasFile('path_image')){
            $brand->path_image = $newNameImage;
        }

        $brand->save();

        if($request->hasFile('path_image')){
            $request->file('path_image')->storeAs('admin/uploads/fotos', $newNameImage);
        }
        Session::flash('success', 'Marca Salva com Sucesso');
        return redirect()->route('admin.brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();
        return view('admin.brand.edit', [
            'brand' => $brand,
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        if($request->hasFile('path_image')){
            $clientOriginalName = $request->file('path_image')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_image')->extension();

            $newNameImage = $nameSlug.'.'.$extension;
        }
        if($request->hasFile('path_image')){
            $removed = Storage::delete('admin/uploads/fotos/'.$brand->path_image);
        }
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->active = $request->active ? 1:0;
        if($request->hasFile('path_image')){
            $brand->path_image = $newNameImage;
        }
        $brand->save();

        if($request->hasFile('path_image')){
            $request->file('path_image')->storeAs('admin/uploads/fotos', $newNameImage);
        }

        Session::flash('success', 'Marca alterada com Sucesso');
        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        Session::flash('success','Marca deletada com sucesso');
        return redirect()->route('admin.brand.index');
    }
}
