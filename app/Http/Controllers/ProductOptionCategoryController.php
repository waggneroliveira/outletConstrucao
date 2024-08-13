<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductOption;
use Illuminate\Http\Request;
use App\ProductOptionCategory;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

class ProductOptionCategoryController extends Controller
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
        return view('admin.categoryOption.create',[
            'product' => Product::where('id', $request->product)->first()
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

        $productOptionCategory = new ProductOptionCategory();
        $productOptionCategory->product_id = $request->product_id;
        $productOptionCategory->title = $request->title;
        $productOptionCategory->quantity_options = $request->quantity_options;
        $productOptionCategory->active = $request->active?1:0;
        $productOptionCategory->required = $request->required?1:0;

        if($productOptionCategory->save()){
            Session::flash('success','Categoria de Opções cadastrada com sucesso');
            return redirect()->route('admin.product.edit', ['product' => $request->product_id]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductOptionCategory  $productOptionCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductOptionCategory $productOptionCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductOptionCategory  $productOptionCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductOptionCategory $productOptionCategory)
    {
        $productOptionCategory = ProductOptionCategory::join('products', 'products.id', '=', 'product_option_categories.product_id')
            ->select('product_option_categories.*', 'products.title as product_title')
            ->where('product_option_categories.id', $productOptionCategory->id)
            ->first();

        return view('admin.categoryOption.edit', [
            'productOptionCategory' => $productOptionCategory,
            'productOptions' => ProductOption::where('category_id', $productOptionCategory->id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductOptionCategory  $productOptionCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductOptionCategory $productOptionCategory)
    {
        $productOptionCategory->title = $request->title;
        $productOptionCategory->quantity_options = $request->quantity_options;
        $productOptionCategory->active = $request->active?1:0;
        $productOptionCategory->required = $request->required?1:0;

        if($productOptionCategory->save()){
            Session::flash('success','Categoria de Opções atualizada com sucesso');
            return redirect()->route('admin.product.edit', ['product' => $productOptionCategory->product_id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductOptionCategory  $productOptionCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductOptionCategory $productOptionCategory)
    {
        if($productOptionCategory->delete()){
            Session::flash('success','Categoria deletada com sucesso');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductOptionCategory  $productOptionCategory
     * @return \Illuminate\Http\Response
     */
    public function verifyQuantity(Request $request, ProductOptionCategory $productOptionCategory)
    {

        $product = Product::where('id', $productOptionCategory->product_id)->first();

        switch($request->statusRequest){
            case 'verifyQuantity':
                if($request->quantity_options <= $productOptionCategory->quantity_options){
                    $rponse['status'] = 'success';
                }
            break;
            case 'isertSession':

                $productOption = ProductOption::where('id', $request->product_option_id)->first();

                if (!Session::has('productOptions')) {
                    Session::put('productOptions', []);
                }

                if($productOption->amount){

                    if(Session::has('productOptions.option_'.$request->product_option_id)){
                        Session::forget('productOptions.option_'.$request->product_option_id);
                        $valueRefresh = ($productOption->amount*$request->product_option_quantity);
                    }else{
                        $valueRefresh = $productOption->amount;
                    }

                    if($request->product_option_quantity > 0){
                        Session::push('productOptions.option_'.$request->product_option_id, [
                            'id' => $request->product_option_id,
                            'title' => $productOption->title,
                            'quantity' => $request->product_option_quantity,
                            'amount' => $valueRefresh
                        ]);
                    }


                    $sessionOptions = Session::get('productOptions');

                    $valueTotal=0;
                    foreach($sessionOptions as $value){
                        $valueTotal = ($valueTotal+$value[0]['amount']);
                    }
                    $rponse['status'] = 'success';
                    $rponse['valueTotal'] = $valueTotal+$product->amount;
                }else{

                    if(Session::has('productOptions.option_'.$request->product_option_id)){
                        Session::forget('productOptions.option_'.$request->product_option_id);
                    }else{
                        $valueRefresh = $productOption->amount;
                    }
                    if($request->product_option_quantity > 0){
                        Session::push('productOptions.option_'.$request->product_option_id, [
                            'id' => $request->product_option_id,
                            'title' => $productOption->title,
                            'quantity' => $request->product_option_quantity,
                            'amount' => null
                        ]);
                    }
                    $rponse['status'] = 'success';
                }
            break;
        }

        return Response::json($rponse);
    }

}
