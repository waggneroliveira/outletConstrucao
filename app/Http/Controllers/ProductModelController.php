<?php

namespace App\Http\Controllers;

use App\ProductModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductModelController extends Controller
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
        $this->validate($request,[
            "reference" => 'required'
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

        $productModel = new ProductModel();
        $productModel->product_id = $request->product_id;
        $productModel->reference = $request->reference;


        if($request->hasFile('path_image')){
            $productModel->path_image = $newNameImage;
        }

        if($productModel->save()){
            Session::flash('success','Modelo cadastrado com sucesso');
            if($request->hasFile('path_image')){
                $request->file('path_image')->storeAs('admin/uploads/fotos', $newNameImage);
            }
        }


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function show(ProductModel $productModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductModel $productModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductModel $productModel)
    {
        $this->validate($request,[
            "reference" => 'required'
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

        $productModel->reference = $request->reference;

        if($request->hasFile('path_image')){
            $productModel->path_image = $newNameImage;
        }

        if($productModel->save()){
            Session::flash('success','Modelo atualizado com sucesso');
            if($request->hasFile('path_image')){
                $request->file('path_image')->storeAs('admin/uploads/fotos', $newNameImage);
            }
        }


        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductModel $productModel)
    {
        if($productModel->delete()){
            Session::flash('success','Modelo deletado com sucesso');
        }

        return redirect()->back();
    }
}
