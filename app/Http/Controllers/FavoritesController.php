<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Product;
use App\Category;
use App\Favorites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $idCustomer = auth('customer')->user()->id;

        $favorites = Product::join('favorites', 'favorites.product_id', '=', 'products.id')
            ->with('gallery')
            ->with('stocksDefault')
            ->select('products.*', 'favorites.id as favorite_id')
            ->where('customer_id',$idCustomer)
            ->get();

        // dd($favorites);

        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();

        return view('site.pages.favorites',[
            'contacts' => Contact::first(),
            'productsMenu' => $productsMenu,
            'favorites' => $favorites
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

        $response['status'] = '';
        $response['msg'] = '';
        $op = '';

        if(!Auth::guard('customer')->check()){
            $response['status'] = 'error';
            $response['msg'] = 'Usuário precisa estar logado para salvar favoritos';
            return Response::json($response);
        }

        if(!$product = Product::find($request->product_id)){
            $response['status'] = 'error';
            $response['msg'] = 'Erro ao identificar o produto';
            return Response::json($response);
        }

        $favorite = Favorites::where('product_id',$request->product_id)->where('customer_id',Auth::guard('customer')->user()->id)->first();

        if($favorite){
            $op = 'remove';
        }else{
            $op = 'add';
        }

        if($response['status'] !== 'error') {

            if($op=='add'){
                $favorite = new Favorites();
                $favorite->product_id = $request->product_id;
                $favorite->customer_id = Auth::guard('customer')->user()->id;

                if (!$favorite->save()) {
                    $response['status'] = 'error';
                    $response['msg'] = 'Erro ao salvar favoritos';
                }else{
                    $response['status'] = 'success';
                    $response['op'] = $op;
                    $response['msg'] = 'Produto adicionado aos favoritos com sucesso';
                }
            }
            else if($op=='remove'){
                $favorite = Favorites::where('product_id',$request->product_id)->where('customer_id',Auth::guard('customer')->user()->id);

                if (!$favorite->delete()) {
                    $response['status'] = 'error';
                    $response['msg'] = 'Erro ao remover o produto dos favoritos';
                }else{
                    $response['status'] = 'success';
                    $response['op'] = $op;
                    $response['msg'] = 'Produto removido dos favoritos com sucesso';
                }
            }

        }

        return Response::json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Favorites  $favorites
     * @return \Illuminate\Http\Response
     */
    public function show(Favorites $favorites)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Favorites  $favorites
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorites $favorites)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Favorites  $favorites
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorites $favorites)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Favorites  $favorites
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favorites $favorites)
    {
        $favorites->delete();
        Session::flash('success','Produto removido dos favoritos com sucesso');
        return redirect()->back();
    }
}
