<?php

namespace App\Http\Controllers;

use App\ProductOption;
use Illuminate\Http\Request;
use App\ProductOptionCategory;
use Illuminate\Support\Facades\Session;

class ProductOptionController extends Controller
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
    public function create(Request $request)
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

        $amount = str_replace(',', '.', str_replace('.', '', $request->amount));

        $productOption = new ProductOption();
        $productOption->category_id = $request->category_id;
        $productOption->title = $request->title;
        $productOption->quantity = $request->quantity;
        $productOption->amount = $amount?:null;
        $productOption->active = $request->active?1:0;
        $productOption->required = $request->required?1:0;

        if($productOption->save()){
            Session::flash('success','Opções de produto cadastrada com sucesso');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductOption  $productOption
     * @return \Illuminate\Http\Response
     */
    public function show(ProductOption $productOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductOption  $productOption
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductOption $productOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductOption  $productOption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductOption $productOption)
    {

        $amount = str_replace(',', '.', str_replace('.', '', $request->amount));

        $productOption->title = $request->title;
        $productOption->quantity = $request->quantity;
        $productOption->amount = $amount?:null;
        $productOption->active = $request->active?1:0;
        $productOption->required = $request->required?1:0;

        if($productOption->save()){
            Session::flash('success','Opções de produto atualizada com sucesso');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductOption  $productOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductOption $productOption)
    {
        if($productOption->delete()){
            Session::flash('success','Opção de produto deletada com sucesso');
        }
        return redirect()->back();
    }
}
