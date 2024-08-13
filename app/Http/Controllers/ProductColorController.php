<?php

namespace App\Http\Controllers;

use App\ProductColor;
use App\NotificationPush;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

class ProductColorController extends Controller
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
        return view('admin.productColor.index',[
            'productColors' => ProductColor::all(),
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
        return view('admin.productColor.create',[
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

        $productColor = new ProductColor();
        $productColor->color = $request->color;
        $productColor->name = $request->name;
        $productColor->active = $request->active ? 1:0;
        if($request->hasFile('path_image')){
            $productColor->path_image = $newNameImage;
        }

        $productColor->save();

        if($request->hasFile('path_image')){
            $request->file('path_image')->storeAs('admin/uploads/fotos', $newNameImage);
        }

        return redirect()->route('admin.productColor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductColor  $productColor
     * @return \Illuminate\Http\Response
     */
    public function show(ProductColor $productColor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductColor  $productColor
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductColor $productColor)
    {
        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();
        return view('admin.productColor.edit',[
            'productColor' => $productColor,
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductColor  $productColor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductColor $productColor)
    {
        if($request->hasFile('path_image')){
            $clientOriginalName = $request->file('path_image')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_image')->extension();

            $newNameImage = $nameSlug.'.'.$extension;
        }

        $productColor->color = $request->color;
        $productColor->name = $request->name;
        $productColor->active = $request->active?1:0;
        if($request->hasFile('path_image')){
            $productColor->path_image = $newNameImage;
        }

        $productColor->save();

        if($request->hasFile('path_image')){
            $request->file('path_image')->storeAs('admin/uploads/fotos', $newNameImage);
        }

        return redirect()->route('admin.productColor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductColor  $productColor
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductColor $productColor)
    {
        $productColor->delete();
        Session::flash('success','Cor deletada com sucesso');
        return redirect()->route('admin.productColor.index');
    }

    public function editColor(Request $request, ProductColor $productColor)
    {

        $productColor->active = $request->active?1:0;
        $rponse['mensagem'] = 'Registro atualizado com sucesso';

        if($productColor->save()){
            $rponse['response'] = 'success';
        }

        return Response::json($rponse);

    }
}
