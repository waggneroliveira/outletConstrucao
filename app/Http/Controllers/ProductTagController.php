<?php

namespace App\Http\Controllers;

use App\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductTagController extends Controller
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
        $productTag = new ProductTag();
        $productTag->tag_id = $request->tag_id;
        $productTag->product_id = $request->product_id;

        if($productTag->save()){
            Session::flash('success','Etiqueta cadastrada');
        }
        return redirect()->route('admin.product.edit', ['product' => $request->product_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductTag  $productTag
     * @return \Illuminate\Http\Response
     */
    public function show(ProductTag $productTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductTag  $productTag
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductTag $productTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductTag  $productTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductTag $productTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductTag  $productTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductTag $productTag)
    {
        $productId = $productTag->product_id;
        if($productTag->delete()){
            Session::flash('success','Produto deletada com sucesso');
        }

        return redirect()->route('admin.product.edit', ['product' => $productId]);
    }
}
