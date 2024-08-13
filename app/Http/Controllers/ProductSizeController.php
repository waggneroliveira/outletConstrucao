<?php

namespace App\Http\Controllers;

use App\ProductSize;
use App\NotificationPush;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

class ProductSizeController extends Controller
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
        return view('admin.productSize.index', [
            'productSizes' => ProductSize::all(),
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
        return view('admin.productSize.create',[
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
        $productSize = new ProductSize();
        $productSize->title = $request->title;
        $productSize->sizeChart = $request->sizeChart?1:0;
        $productSize->active = $request->active?1:0;

        if($productSize->save()){
            Session::flash('success','Tamanho cadastrado com sucesso');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductSize  $productSize
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSize $productSize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductSize  $productSize
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductSize $productSize)
    {
        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();
        return view('admin.productSize.edit', [
            'productSize' => $productSize,
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductSize  $productSize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductSize $productSize)
    {
        $productSize->title = $request->title;
        $productSize->active = $request->sizeChart?1:0;
        $productSize->active = $request->active?1:0;

        if($productSize->save()){
            Session::flash('success','Tamanho atualizado com sucesso');
            return redirect()->route('admin.productSize.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductSize  $productSize
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductSize $productSize)
    {
        if($productSize->delete()){
            Session::flash('success','Tamanho deletado com sucesso');
        }else{
            Session::flash('error','Problema ao deletar tamanho');
        }

        return redirect()->back();
    }

    public function editSize(Request $request, ProductSize $productSize)
    {
        switch ($request->field) {
            case 'active':
                $productSize->active = $request->active?1:0;
            break;
            case 'sizeChart':
                $productSize->sizeChart = $request->sizeChart?1:0;
            break;
        }

        $rponse['mensagem'] = 'Registro atualizado com sucesso';

        if($productSize->save()){
            $rponse['response'] = 'success';
        }

        return Response::json($rponse);

    }
}
