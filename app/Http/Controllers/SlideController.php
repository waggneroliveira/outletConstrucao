<?php

namespace App\Http\Controllers;

use App\Slide;
use App\Product;
use App\NotificationPush;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = DB::table('slides')
            ->join('products', 'slides.product_id', '=', 'products.id')
            ->select('slides.*', 'products.title as product_title')
            ->get();

        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();
        return view('admin.slide.index', [
            'slides' => $slides,
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
        return view('admin.slide.create', [
            'products' => Product::all(),
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
            "path_image" => 'required'
        ],[
            'required'=>'O campo :attribute é obrigatorio',
        ]);

        if($request->hasFile('path_image')){
            $clientOriginalName = $request->file('path_image')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_image')->extension();

            $newNameImage = $nameSlug.'.'.$extension;
        }

        if($request->hasFile('path_image_mobile')){
            $clientOriginalName = $request->file('path_image_mobile')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_image_mobile')->extension();

            $newNameImageMobile = $nameSlug.'.'.$extension;
        }

        $slide = new Slide();
        $slide->title = $request->title ? $request->title : '';
        $slide->subtitle = $request->subtitle ? $request->subtitle : '';
        $slide->description = $request->description ? $request->description : '';
        $slide->whatsapp_button = $request->whatsapp_button ? $request->whatsapp_button : '';
        $slide->product_id = $request->product_id?:0;


        if($request->hasFile('path_image')){
            $slide->path_image = $newNameImage;
        }

        if($request->hasFile('path_image_mobile')){
            $slide->path_image_mobile = $newNameImageMobile;
        }

        if($slide->save()){
            Session::flash('success','Subcategoria cadastrada com sucesso');
        }

        if($request->hasFile('path_image')){
            $request->file('path_image')->storeAs('admin/uploads/fotos', $newNameImage);
        }

        if($request->hasFile('path_image_mobile')){
            $request->file('path_image_mobile')->storeAs('admin/uploads/fotos', $newNameImageMobile);
        }

        return redirect()->route('admin.slide.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();
        return view('admin.slide.edit', [
            'slide' => $slide,
            'products' => Product::all(),
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {

        if($request->hasFile('path_image')){
            $clientOriginalName = $request->file('path_image')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_image')->extension();

            $newNameImage = $nameSlug.'.'.$extension;
        }

        if($request->hasFile('path_image_mobile')){
            $clientOriginalName = $request->file('path_image_mobile')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_image_mobile')->extension();

            $newNameImageMobile = $nameSlug.'.'.$extension;
        }

        if($request->hasFile('path_image')){
            $removed = Storage::delete('admin/uploads/fotos/'.$slide->path_image);
        }
        if($request->hasFile('path_image_mobile')){
            $removed = Storage::delete('admin/uploads/fotos/'.$slide->path_image_mobile);
        }

        $slide->title = $request->title ? $request->title : '';
        $slide->subtitle = $request->subtitle ? $request->subtitle : '';
        $slide->description = $request->description ? $request->description : '';
        $slide->whatsapp_button = $request->whatsapp_button ? $request->whatsapp_button : '';
        $slide->product_id = $request->product_id?:0;

        if($request->hasFile('path_image')){
            $slide->path_image = $newNameImage;
        }

        if($request->hasFile('path_image_mobile')){
            $slide->path_image_mobile = $newNameImageMobile;
        }

        if($slide->save()){
            Session::flash('success','Subcategoria cadastrada com sucesso');
        }

        if($request->hasFile('path_image')){
            $request->file('path_image')->storeAs('admin/uploads/fotos', $newNameImage);
        }

        if($request->hasFile('path_image_mobile')){
            $request->file('path_image_mobile')->storeAs('admin/uploads/fotos', $newNameImageMobile);
        }

        return redirect()->route('admin.slide.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {

        Storage::delete('admin/uploads/fotos/'.$slide->path_image);
        Storage::delete('admin/uploads/fotos/'.$slide->path_image_mobile);

        if($slide->delete()){
            Session::flash('success','Subcategoria deletada com sucesso');
        }else{
            Session::flash('error','Problema ao deletar subcategoria');
        }

        return redirect()->route('admin.slide.index');
    }
}
