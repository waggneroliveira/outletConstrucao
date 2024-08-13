<?php

namespace App\Http\Controllers;

use App\PaymentMethod;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.paymentMethod.index', [
            'paymentMethods' => PaymentMethod::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.paymentMethod.create');
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

        $paymentMethod = new PaymentMethod();
        $paymentMethod->flag = $request->flag;
        $paymentMethod->active = $request->active;

        if($request->hasFile('path_image')){
            $paymentMethod->path_image = $newNameImage;
        }
        $paymentMethod->save();

        if($request->hasFile('path_image')){
            $request->file('path_image')->storeAs('admin/uploads/fotos', $newNameImage);
        }

        Session::flash('success','Forma de Pagamento cadastrada com sucesso');
        return redirect()->route('admin.paymentMethod.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentMethod $paymentMethod)
    {
        return view('admin.paymentMethod.edit', [
            'paymentMethod' => $paymentMethod
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        if($request->hasFile('path_image')){
            $clientOriginalName = $request->file('path_image')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_image')->extension();

            $newNameImage = $nameSlug.'.'.$extension;
        }

        $paymentMethod->flag = $request->flag;
        $paymentMethod->active = $request->active;

        if($request->hasFile('path_image')){
            $paymentMethod->path_image = $newNameImage;
        }
        $paymentMethod->save();
        if($request->hasFile('path_image')){
            $request->file('path_image')->storeAs('admin/uploads/fotos', $newNameImage);
        }

        Session::flash('success','Forma de Pagamento alterada com sucesso');
        return redirect()->route('admin.paymentMethod.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentMethod $paymentMethod)
    {
        if($paymentMethod->delete()){
            Session::flash('success','Forma de Pagamento deletada com sucesso');
        }else{
            Session::flash('error','Problema ao deletar Forma de Pagamento');
        }

        return redirect()->route('admin.paymentMethod.index');
    }
}
