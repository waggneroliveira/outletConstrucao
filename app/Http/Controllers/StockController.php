<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Integration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $integration = Integration::first();
        $stocks = Stock::with('productSize')->with('productColor')->with('product')->where('quantity', '<=', $integration->limit_alert_stock)->get();
        // dd($stocks);
        return view('admin.stock.index',[
            'stocks' => $stocks,
            'integration' => $integration
        ]);
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
        $stock = new Stock();
        $stock->product_id = $request->product_id;
        $stock->productSize_id = $request->productSize_id;
        $stock->productColor_id = $request->productColor_id;
        $stock->quantity = $request->quantity;
        $stock->default = $request->default?1:0;
        $stock->amount = str_replace(',', '.', str_replace('.', '', $request->amount));
        if($request->promotion_value){
            $stock->promotion_value = str_replace(',', '.', str_replace('.', '', $request->promotion_value));
        }
        $stock->active = $request->active?1:0;

        if($stock->save()){
            Session::flash('success','Estoque inserido com sucesso');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $stock->product_id = $request->product_id;
        $stock->productSize_id = $request->productSize_id;
        $stock->productColor_id = $request->productColor_id;
        $stock->quantity = $request->quantity;
        $stock->default = $request->default?1:0;
        $stock->amount = str_replace(',', '.', str_replace('.', '', $request->amount));
        if($request->promotion_value){
            $stock->promotion_value = str_replace(',', '.', str_replace('.', '', $request->promotion_value));
        }
        $stock->active = $request->active?1:0;

        if($stock->save()){
            Session::flash('success','Tamanho editado com sucesso');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        if($stock->delete()){
            Session::flash('success','Tamanho removido com sucesso');
        }else{
            Session::flash('error','Problema ao deletar tamanho');
        }

        return redirect()->back();
    }

    public function editStock(Request $request, Stock $stock)
    {
        switch ($request->field) {
            case 'default':
                $stock->default = $request->default?1:0;
            break;
            case 'active':
                $stock->active = $request->active?1:0;
            break;
        }

        $rponse['mensagem'] = 'Registro atualizado com sucesso';

        if($stock->save()){
            $rponse['response'] = 'success';
        }

        return Response::json($rponse);

    }
    /**
     * Refresh amount product.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function refreshAmountProduct(Stock $stock)
    {
        if($stock->promotion_value){
            $html = '
                <div id="appendAmount">
                    <div class="value col-inline">
                        <i>R$ '.$stock->promotion_value.'</i>
                    </div>
                    <div class="value-passado col-inline">
                        <i>R$ '.$stock->amount.'</i>
                    </div>
                </div>
            ';
        }else{
            $html = '
                <div id="appendAmount">
                    <div class="value col-inline">
                        <i>R$ '.$stock->amount.'</i>
                    </div>
                </div>
            ';
        }

        $rponse['status'] = 'success';
        $rponse['getAmounts'] = $html;
        $rponse['total'] = $stock->promotion_value?:$stock->amount;

        return Response::json($rponse);
    }
}
