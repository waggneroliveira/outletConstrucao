<?php

namespace App\Http\Controllers;

use App\tag;
use App\Post;
use App\Order;
use App\Slide;
use App\Topic;
use App\Region;
use App\Contact;
use App\Product;
use App\Category;
use App\Integration;
use App\Favorites;
use App\ProductTag;
use App\product_gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // dd(Session::all());

        // PRODUTOS EM DESTAQUE
        $topProducts = Product::with('gallery')->with('stocksDefault')
                            ->select('products.*')
                            ->addSelect([
                                'orderItems' => DB::raw('(SELECT count(order_items.id) FROM order_items
                                    INNER JOIN orders ON orders.id = order_items.order_id
                                    WHERE order_items.product_id = products.id AND orders.status = 3) AS orderItems')
                            ])
                            ->orderBy('orderItems', 'DESC')
                            ->get();

        // TODAS AS CATEGORIAS
        $categories = Category::with('products')
                            ->whereExists(function($query){
                                $query->select(Product::raw('id'))
                                    ->from('products')
                                    ->whereRaw('products.category_id = categories.id');
                            })->where([
                                ['active', '=', 1],
                            ])
                            ->orderBy('order', 'ASC')
                            ->get();

        // CATEGORIAS E SEUS PRODUTOS
        $categoriesAndProducts = Category::with('productsDestaque')
                                        ->whereExists(function($query){
                                            $query->select(Product::raw('id'))
                                                ->from('products')
                                                ->whereRaw('products.category_id = categories.id');
                                        })->where([
                                            ['active', '=', 1],
                                            ['featured', '=', 1],
                                        ])->select('categories.*')
                                        ->addSelect([
                                            'subcategory' => DB::raw('(select count(id) from subcategories where category_id = categories.id) as subcategory')
                                        ])
                                        ->orderBy('order', 'ASC')
                                        ->get();
        // dd($categoriesAndProducts);
        // TAG DO PRODUTO
        $productTags = ProductTag::join('tags', 'tags.id', '=', 'product_tags.tag_id')
                                ->select('product_tags.*', 'tags.title', 'tags.path_image')
                                ->get();

        $slides = Slide::join('products', 'products.id', '=', 'slides.product_id')
                        ->select('slides.*', 'products.slug AS productSlug')
                        ->get();

        // PRODUTOS MARCADOS COMO PROMOCAO
        $productsPromotion = Product::with('gallery')->with('stocksDefault')->where('promotion', 1)->orderBy('order', 'ASC')->get();

        return view('site.pages.home',[
            'slides' => $slides,
            'topics' => Topic::all(),
            'categories' =>$categories,
            'categoriesAndProducts' => $categoriesAndProducts,
            'contacts' => Contact::first(),
            'productsPromotion' => $productsPromotion,
            'topProducts' => $topProducts,
            'posts' => Post::all()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
