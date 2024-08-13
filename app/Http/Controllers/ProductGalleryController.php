<?php

namespace App\Http\Controllers;

use App\product_gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\product_gallery  $product_gallery
     * @return \Illuminate\Http\Response
     */
    public function show(product_gallery $product_gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product_gallery  $product_gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(product_gallery $product_gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product_gallery  $product_gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product_gallery $product_gallery)
    {
        product_gallery::where('product_id', $request->product_id)->update(['product_cover' => 0]);

        if($request->product_cover){
            $product_gallery->product_cover = $request->product_cover;
        }
        if($product_gallery->save()){
            $response['response'] = "success";
            $response['mensagem'] = "Capa de produto definida";
        }

        return Response::json($response);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product_gallery  $product_gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(product_gallery $product_gallery)
    {
        $removed = Storage::delete('admin/uploads/fotos/'.$product_gallery->path_image);

        if($product_gallery->delete()){
            $response['response'] = "success";
            $response['mensagem'] = "Imagem deletada com sucesso";
        }
        return Response::json($response);
    }
}
