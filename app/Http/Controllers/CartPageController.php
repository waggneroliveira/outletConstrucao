<?php

namespace App\Http\Controllers;

use App\tag;
use App\Slide;
use App\Topic;
use App\Region;
use App\Contact;
use App\Product;
use App\Category;
use App\Integration;
use App\product_gallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartPageController extends Controller
{

    public function index()
    {


        // dd(Session::get('cart_options'));
        // dd(Session::get('cart_options.coupon'));
        // Cart::setGlobalDiscount(20);
        // dd(Cart::content());
        // PRODUTOS EM DESTAQUE

        if(Cart::count()<1){
            Session::flash('info', 'Adicione itens ao carrinho');
            return redirect()->route('site.product');
        }

        $topProducts = Product::with('gallery')->with('stocksDefault')
            ->select('products.*')
            ->addSelect([
                'orderItems' => DB::raw('(SELECT count(order_items.id) FROM order_items
                    INNER JOIN orders ON orders.id = order_items.order_id
                    WHERE order_items.product_id = products.id AND orders.status = 3) AS orderItems')
            ])
            ->orderBy('orderItems', 'DESC')
            ->limit(8)
            ->get();


        // dd(Cart::content());

        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();


        return view('site.pages.cart',[
            'topProducts' => $topProducts,
            'productsMenu' => $productsMenu,
            'contacts' => Contact::first(),
            'integration' => Integration::first(),
        ]);
    }


}
