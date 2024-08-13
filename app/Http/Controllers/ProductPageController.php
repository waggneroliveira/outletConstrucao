<?php

namespace App\Http\Controllers;

use App\tag;
use App\Post;
use App\Brand;
use App\Stock;
use App\Topic;
use App\Region;
use App\Contact;
use App\Product;
use App\Category;
use App\Favorites;
use App\SizeChart;
use App\ProductTag;
use App\ProductSize;
use App\Subcategory;
use App\ProductColor;
use App\product_gallery;
use App\BannerInstitutional;
use Illuminate\Http\Request;
use App\ProductOptionCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

class ProductPageController extends Controller
{
    public function products(Request $request, Category $category, Subcategory $subcategory)
    {
        // dd($category);

        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();

        // LISTAGEM DAS CATEGORIAS E SUAS SUBCATEGORIAS
        $categories = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])
            ->orderBy('order', 'ASC')
            ->get();

        $brands = Brand::whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.brand_id = brands.id');
                })
            ->where('active', 1)
            ->orderBy('name', 'ASC')
            ->get();

        $field = 'products';

        // FILTRAGEM PARA OS PRODUTOS CATEGRY E SUB
        $products = Product::with('stocksDefault')->with('gallery')->orderBy('order', 'ASC')->paginate(12);

        $productColors = Stock::join('products', 'products.id', 'stocks.product_id')
            ->join('product_colors', 'product_colors.id', 'stocks.productColor_id')
            ->select('stocks.*', 'product_colors.name', 'product_colors.id as productColorId', 'products.title as productTitle')
            ->whereRaw('products.deleted_at is null')
            ->orderBy('product_colors.name', 'ASC')
            ->groupBy('stocks.productColor_id')
            ->get();

        $productSizes = Stock::join('products', 'products.id', 'stocks.product_id')
            ->join('product_sizes', 'product_sizes.id', 'stocks.productSize_id')
            ->select('stocks.*', 'product_sizes.title', 'product_sizes.id as productSizeId', 'products.title as productTitle')
            ->whereRaw('products.deleted_at is null')
            ->orderBy('product_sizes.title', 'ASC')
            ->groupBy('stocks.productSize_id')
            ->get();

        if($category->exists){
            $field = 'category';
            $products = Product::with('stocksDefault')->with('gallery')
                ->where('category_id', $category->id)
                ->orderBy('order', 'ASC')
                ->paginate(12);

            $brands = Brand::join('products', 'products.brand_id', 'brands.id')
                ->join('categories', 'categories.id', 'products.category_id')
                ->select(
                    'brands.*',
                    'products.category_id',
                    'categories.slug as category_slug'
                )
                ->where('products.category_id', $category->id)
                ->where('brands.active', 1)
                ->groupBy('brands.id')
                ->orderBy('brands.name', 'ASC')
                ->get();

            $productColors = Stock::join('product_colors', 'product_colors.id', 'stocks.productColor_id')
                ->join('products', 'products.id', 'stocks.product_id')
                ->join('categories', 'categories.id', 'products.category_id')
                ->select(
                    'stocks.*',
                    'product_colors.name',
                    'product_colors.id as productColorId',
                    'products.category_id',
                    'categories.slug as category_slug'
                )
                ->where('products.category_id', $category->id)
                ->whereRaw('products.deleted_at is null')
                ->orderBy('product_colors.name', 'ASC')
                ->groupBy('stocks.productColor_id')
                ->get();

            $productSizes = Stock::join('product_sizes', 'product_sizes.id', 'stocks.productSize_id')
                ->join('products', 'products.id', 'stocks.product_id')
                ->join('categories', 'categories.id', 'products.category_id')
                ->select(
                    'stocks.*',
                    'product_sizes.title',
                    'product_sizes.id as productSizeId',
                    'products.category_id',
                    'categories.slug as category_slug'
                )
                ->where('products.category_id', $category->id)
                ->whereRaw('products.deleted_at is null')
                ->orderBy('product_sizes.title', 'ASC')
                ->groupBy('stocks.productSize_id')
                ->get();

        }else if($subcategory->exists){
            $field = 'subcategory';
            $products = Product::with('stocksDefault')->with('gallery')
                ->where('category_id', $subcategory->category_id)
                ->where('subcategory_id', $subcategory->id)
                ->orderBy('order', 'ASC')
                ->paginate(12);

            $brands = Brand::join('products', 'products.brand_id', 'brands.id')
                ->join('categories', 'categories.id', 'products.category_id')
                ->join('subcategories', 'subcategories.id', 'products.subcategory_id')
                ->select(
                    'brands.*',
                    'products.category_id',
                    'categories.slug as category_slug',
                    'products.subcategory_id',
                    'subcategories.slug as subcategory_slug'
                )
                ->where('products.category_id', $subcategory->category_id)
                ->where('products.subcategory_id', $subcategory->id)
                ->where('brands.active', 1)
                ->groupBy('brands.id')
                ->orderBy('brands.name', 'ASC')
                ->get();

            $productColors = Stock::join('product_colors', 'product_colors.id', 'stocks.productColor_id')
                ->join('products', 'products.id', 'stocks.product_id')
                ->join('categories', 'categories.id', 'products.category_id')
                ->join('subcategories', 'subcategories.id', 'products.subcategory_id')
                ->select(
                    'stocks.*',
                    'product_colors.name',
                    'product_colors.id as productColorId',
                    'products.category_id',
                    'products.subcategory_id',
                    'categories.slug as category_slug',
                    'subcategories.slug as subcategory_slug'
                )
                ->where('products.category_id', $subcategory->category_id)
                ->where('products.subcategory_id', $subcategory->id)
                ->whereRaw('products.deleted_at is null')
                ->orderBy('product_colors.name', 'ASC')
                ->groupBy('stocks.productColor_id')
                ->get();

            $productSizes = Stock::join('product_sizes', 'product_sizes.id', 'stocks.productSize_id')
                ->join('products', 'products.id', 'stocks.product_id')
                ->join('categories', 'categories.id', 'products.category_id')
                ->join('subcategories', 'subcategories.id', 'products.subcategory_id')
                ->select(
                    'stocks.*',
                    'product_sizes.title',
                    'product_sizes.id as productSizeId',
                    'products.category_id',
                    'products.subcategory_id',
                    'categories.slug as category_slug',
                    'subcategories.slug as subcategory_slug'
                )
                ->where('products.category_id', $subcategory->category_id)
                ->where('products.subcategory_id', $subcategory->id)
                ->whereRaw('products.deleted_at is null')
                ->orderBy('product_sizes.title', 'ASC')
                ->groupBy('stocks.productSize_id')
                ->get();
            // dd($products);
        }

        // LISTAGEM DE SUBCATEGORIAS
        $category = Category::select('categories.*')
            ->addSelect([
                'subcategory' => DB::raw('(select count(id) from subcategories where category_id = categories.id) as subcategory')
            ])
            ->where('categories.id', $category->id)->first();

        // LISTAGEM DE SUBCATEGORIAS
        $subcategory = Subcategory::join('categories', 'categories.id', '=', 'subcategories.category_id')
            ->select('categories.title as category', 'categories.path_image', 'subcategories.*')
            ->where('subcategories.id', $subcategory->id)->first();

        $bannerInstitutionals = BannerInstitutional::first();

        return view('site.pages.products',[
            'productsMenu' => $productsMenu,
            'field' => $field,
            'contacts' => Contact::first(),
            'categories' => $categories,
            'categoryCurrent' => $category,
            'subcategoryCurrent' => $subcategory,
            'brands' => $brands,
            'products' => $products,
            'colors'=> $productColors,
            'sizes'=> $productSizes,
            'posts' => Post::all(),
            'bannerInstitutionals' => $bannerInstitutionals
        ]);
    }

    public function productContent(Request $request, Product $product)
    {
        // dd(config('pagseguro.token'));
        // dd($product);
        // dd(Request::path());
        // Session::forget('productOptions');

        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();

        $product = Product::with('stocksDefault')->with('productModel')->where('id', $product->id)->first();

        $products = Product::with('stocksDefault')->with('gallery')
            ->where('category_id', $product->category_id)
            ->whereNotIn('id', [$product->id])
            ->limit('4')
            ->get();

        $favorite = null;
        if(Auth::guard('customer')->check()){
            $favorite = Favorites::where('product_id', $product->id)->where('customer_id', Auth::guard('customer')->user()->id)->first();
        }

        $productColor = array();

        foreach($product->stocksDefault as $colorDefault){
            $productColor = Stock::join('product_colors', 'product_colors.id', '=', 'stocks.productColor_id')
                ->select('stocks.productSize_id', 'stocks.id as stockId', 'product_colors.*')
                ->where('stocks.productSize_id', $colorDefault->productSize_id)
                ->where('stocks.product_id', $product->id)
                ->where('stocks.quantity','>', 0)
                ->where('stocks.active', 1)
                ->get();
        }

        $galleries = product_gallery::where('product_id', $product->id)->get();

        $productSize = Stock::join('product_sizes', 'product_sizes.id', '=', 'stocks.productSize_id')
            ->select('product_sizes.title', 'stocks.*')
            ->where('product_id', $product->id)
            ->where('stocks.quantity','>', 0)
            ->where('stocks.active', 1)
            ->groupBy('stocks.productSize_id')
            ->get();

        return view('site.pages.productContent', [
            'product' => $product,
            'products' => $products,
            'galleries' => $galleries,
            'productSizes' => $productSize,
            'productColors' => $productColor,
            'productsMenu' => $productsMenu,
            'contacts' => Contact::first(),
            'posts' => Post::all(),
            'sizeChart' => SizeChart::first(),
            'favorite' => $favorite
        ]);
    }

    public function getColorStock(Product $product, ProductSize $productSize)
    {
        $stockColors = Stock::join('product_colors', 'product_colors.id', '=', 'stocks.productColor_id')
            ->select('stocks.productSize_id', 'stocks.id as stockId', 'product_colors.*')
            ->where('stocks.product_id', $product->id)
            ->where('stocks.productSize_id', $productSize->id)
            ->where('stocks.quantity','>', 0)
            ->where('stocks.active', 1)
            ->get();

        $html = '';
        foreach($stockColors as $stockColor){
            if($stockColor->path_image){
                $colors =
                '<li class="col-inline">
                    <input type="radio" onclick="refreshAmountProduct(this)" data-route="'.route('site.stock.refreshAmountProduct', ['stock' => $stockColor->stockId]).'" name="product_color" id="productColor-'.$stockColor->stockId.'" value="'.$stockColor->stockId.'">
                    <label for="productColor-'.$stockColor->stockId.'" title="'.$stockColor->name.'" href="javascript:void(0)" style="background: url('.asset('storage/admin/uploads/fotos').'/'.$stockColor->path_image.') center no-repeat;background-size: cover;" onclick="" class="radius-full trans-slow">
                        <span class="hoverEstampa trans-slow"><img src="'.asset('storage/admin/uploads/fotos/').'/'.$stockColor->path_image.'" alt="'.$stockColor->name.'"></span>
                    </label>
                </li>';
            }else{
                $colors =
                '<li class="col-inline">
                    <input type="radio" onclick="refreshAmountProduct(this)" data-route="'.route('site.stock.refreshAmountProduct', ['stock' => $stockColor->stockId]).'" name="product_color" id="productColor-'.$stockColor->stockId.'" value="'.$stockColor->stockId.'">
                    <label for="productColor-'.$stockColor->stockId.'" href="javascript:void(0)" title="'.$stockColor->name.'" style="background-color: '.$stockColor->color.';" onclick="" class="radius-full trans-slow"></label>
                </li>';
            }
            $html .= $colors;
        }

        $response = [
            'status' => 'success',
            'html' => $html
        ];

        return Response::json($response);
    }

    public function productSearch(Request $request){
        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('products')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();

        // LISTAGEM DAS CATEGORIAS E SUAS SUBCATEGORIAS
        $categories = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->get();

        $field = 'products';
        $productColors = Stock::join('products', 'products.id', 'stocks.product_id')
            ->join('product_colors', 'product_colors.id', 'stocks.productColor_id')
            ->select('stocks.*', 'product_colors.name', 'product_colors.id as productColorId', 'products.title as productTitle')
            ->whereRaw('products.deleted_at is null')
            ->groupBy('stocks.productColor_id')
            ->get();

        $brands = Brand::whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.brand_id = brands.id');
                })
            ->where('active', 1)
            ->orderBy('name', 'ASC')
            ->get();

        $productSizes = Stock::join('products', 'products.id', 'stocks.product_id')
            ->join('product_sizes', 'product_sizes.id', 'stocks.productSize_id')
            ->select('stocks.*', 'product_sizes.title', 'product_sizes.id as productSizeId', 'products.title as productTitle')
            ->whereRaw('products.deleted_at is null')
            ->orderBy('product_sizes.title', 'ASC')
            ->groupBy('stocks.productSize_id')
            ->get();

        $products = Product::with('stocksDefault')->with('gallery')->where('active', 1)->where('title', 'like', '%'.$request->search.'%')->orderBy('order', 'ASC')->get();
        $bannerInstitutionals = BannerInstitutional::first();
        return view('site.pages.products',[
            'categories' => $categories,
            'brands' => $brands,
            'sizes' => $productSizes,
            'contacts' => Contact::first(),
            'products' => $products,
            'colors' => $productColors,
            'productsMenu' => $productsMenu,
            'field' => $field,
            'search' => $request->search?:'',
            'bannerInstitutionals' => $bannerInstitutionals
        ]);
    }

    public function productPromotion()
    {
        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();

        // LISTAGEM DAS CATEGORIAS E SUAS SUBCATEGORIAS
        $categories = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])
            ->orderBy('order', 'ASC')
            ->get();

        $products = Product::with('stocksDefault')->with('gallery')
            ->where('promotion', 1)->orderBy('order', 'ASC')->paginate(12);


        $productColors = Stock::join('products', 'products.id', 'stocks.product_id')
            ->join('product_colors', 'product_colors.id', 'stocks.productColor_id')
            ->select('stocks.*', 'product_colors.name', 'product_colors.id as productColorId', 'products.title as productTitle')
            ->whereRaw('products.deleted_at is null')
            ->groupBy('stocks.productColor_id')
            ->get();

        $brands = Brand::whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.brand_id = brands.id');
                })
            ->where('active', 1)
            ->orderBy('name', 'ASC')
            ->get();

        $productSizes = Stock::join('products', 'products.id', 'stocks.product_id')
            ->join('product_sizes', 'product_sizes.id', 'stocks.productSize_id')
            ->select('stocks.*', 'product_sizes.title', 'product_sizes.id as productSizeId', 'products.title as productTitle')
            ->whereRaw('products.deleted_at is null')
            ->orderBy('product_sizes.title', 'ASC')
            ->groupBy('stocks.productSize_id')
            ->get();

        $bannerInstitutionals = BannerInstitutional::first();
        $field = 'products';
        return view('site.pages.products',[
            'productsMenu' => $productsMenu,
            'brands' => $brands,
            'sizes' => $productSizes,
            'contacts' => Contact::first(),
            'categories' => $categories,
            'products' => $products,
            'posts' => Post::all(),
            'field' => $field,
            'colors'=> $productColors,
            'bannerInstitutionals' => $bannerInstitutionals
        ]);
    }

    public function productTop()
    {
        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();

        // LISTAGEM DAS CATEGORIAS E SUAS SUBCATEGORIAS
        $categories = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])
            ->orderBy('order', 'ASC')
            ->get();


        // PRODUTOS EM DESTAQUE
        $topProducts = Product::with('gallery')->with('stocksDefault')
            ->select('products.*')
            ->addSelect([
                'orderItems' => DB::raw('(SELECT count(order_items.id) FROM order_items
                    INNER JOIN orders ON orders.id = order_items.order_id
                    WHERE order_items.product_id = products.id AND orders.status = 3) AS orderItems')
            ])
            ->orderBy('orderItems', 'DESC')
            ->paginate(12);

        $productColors = Stock::join('products', 'products.id', 'stocks.product_id')
            ->join('product_colors', 'product_colors.id', 'stocks.productColor_id')
            ->select('stocks.*', 'product_colors.name', 'product_colors.id as productColorId', 'products.title as productTitle')
            ->whereRaw('products.deleted_at is null')
            ->groupBy('stocks.productColor_id')
            ->get();

        $brands = Brand::whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.brand_id = brands.id');
                })
            ->where('active', 1)
            ->orderBy('name', 'ASC')
            ->get();

        $productSizes = Stock::join('products', 'products.id', 'stocks.product_id')
            ->join('product_sizes', 'product_sizes.id', 'stocks.productSize_id')
            ->select('stocks.*', 'product_sizes.title', 'product_sizes.id as productSizeId', 'products.title as productTitle')
            ->whereRaw('products.deleted_at is null')
            ->orderBy('product_sizes.title', 'ASC')
            ->groupBy('stocks.productSize_id')
            ->get();

        $bannerInstitutionals = BannerInstitutional::first();

        $field = 'products';
        return view('site.pages.products',[
            'productsMenu' => $productsMenu,
            'brands' => $brands,
            'sizes' => $productSizes,
            'contacts' => Contact::first(),
            'categories' => $categories,
            'products' => $topProducts,
            'posts' => Post::all(),
            'field' => $field,
            'colors'=> $productColors,
            'bannerInstitutionals' => $bannerInstitutionals
        ]);
    }

    public function productRelease()
    {
        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();

        // LISTAGEM DAS CATEGORIAS E SUAS SUBCATEGORIAS
        $categories = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])
            ->orderBy('order', 'ASC')
            ->get();

        $products = Product::with('stocksDefault')->with('gallery')
            ->orderBy('created_at', 'DESC')->paginate(12);


        $productColors = Stock::join('products', 'products.id', 'stocks.product_id')
            ->join('product_colors', 'product_colors.id', 'stocks.productColor_id')
            ->select('stocks.*', 'product_colors.name', 'product_colors.id as productColorId', 'products.title as productTitle')
            ->whereRaw('products.deleted_at is null')
            ->groupBy('stocks.productColor_id')
            ->get();

        $brands = Brand::whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.brand_id = brands.id');
                })
            ->where('active', 1)
            ->orderBy('name', 'ASC')
            ->get();

        $productSizes = Stock::join('products', 'products.id', 'stocks.product_id')
            ->join('product_sizes', 'product_sizes.id', 'stocks.productSize_id')
            ->select('stocks.*', 'product_sizes.title', 'product_sizes.id as productSizeId', 'products.title as productTitle')
            ->whereRaw('products.deleted_at is null')
            ->orderBy('product_sizes.title', 'ASC')
            ->groupBy('stocks.productSize_id')
            ->get();

        $bannerInstitutionals = BannerInstitutional::first();

        $field = 'products';

        return view('site.pages.products',[
            'productsMenu' => $productsMenu,
            'brands' => $brands,
            'sizes' => $productSizes,
            'contacts' => Contact::first(),
            'categories' => $categories,
            'products' => $products,
            'posts' => Post::all(),
            'field' => $field,
            'colors'=> $productColors,
            'bannerInstitutionals' => $bannerInstitutionals
        ]);
    }

    public function productPriceFilter(Request $request)
    {
        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();

        // LISTAGEM DAS CATEGORIAS E SUAS SUBCATEGORIAS
        $categories = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])
            ->orderBy('order', 'ASC')
            ->get();

        $products = Product::with('stocksDefault')->with('gallery')
            ->join('stocks', 'stocks.product_id', '=', 'products.id')
            ->select(
                'stocks.amount as stock_amount',
                'stocks.promotion_value',
                'products.*')
            ->whereBetween('stocks.amount', [$request->priceStart, $request->priceEnd])
            ->groupBy('products.id')
            ->orderBy('stocks.amount')
            ->get();

        $productColors = Stock::join('products', 'products.id', 'stocks.product_id')
            ->join('product_colors', 'product_colors.id', 'stocks.productColor_id')
            ->select('stocks.*', 'product_colors.name', 'product_colors.id as productColorId', 'products.title as productTitle')
            ->whereRaw('products.deleted_at is null')
            ->groupBy('stocks.productColor_id')
            ->get();

        $brands = Brand::whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.brand_id = brands.id');
                })
            ->where('active', 1)
            ->orderBy('name', 'ASC')
            ->get();

        $productSizes = Stock::join('products', 'products.id', 'stocks.product_id')
            ->join('product_sizes', 'product_sizes.id', 'stocks.productSize_id')
            ->select('stocks.*', 'product_sizes.title', 'product_sizes.id as productSizeId', 'products.title as productTitle')
            ->whereRaw('products.deleted_at is null')
            ->orderBy('product_sizes.title', 'ASC')
            ->groupBy('stocks.productSize_id')
            ->get();

        $bannerInstitutionals = BannerInstitutional::first();

        $field = 'products';

        return view('site.pages.products',[
            'field' => $field,
            'brands' => $brands,
            'sizes' => $productSizes,
            'productsMenu' => $productsMenu,
            'contacts' => Contact::first(),
            'categories' => $categories,
            'products' => $products,
            'request' => $request,
            'posts' => Post::all(),
            'bannerInstitutionals' => $bannerInstitutionals,
            'colors'=> $productColors
        ]);
    }

    public function productColorFilter(Request $request, ProductColor $productColor)
    {
        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();

        // LISTAGEM DAS CATEGORIAS E SUAS SUBCATEGORIAS
        $categories = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])
            ->orderBy('order', 'ASC')
            ->get();

        $products = Product::with('stocksDefault')->with('gallery')
            ->join('stocks', 'stocks.product_id', '=', 'products.id')
            ->select(
                'stocks.amount as stock_amount',
                'stocks.promotion_value',
                'products.*'
            )
            ->where('stocks.productColor_id', $productColor->id)
            ->groupBy('products.id')
            ->paginate(12);

        $productColors = Stock::join('product_colors', 'product_colors.id', 'stocks.productColor_id')
            ->join('products', 'products.id', 'stocks.product_id')
            ->select('stocks.*', 'product_colors.name', 'product_colors.id as productColorId', 'products.category_id')
            ->whereRaw('products.deleted_at is null')
            ->groupBy('stocks.productColor_id')
            ->orderBy('order', 'ASC')
            ->get();

        $productSizes = Stock::join('product_sizes', 'product_sizes.id', 'stocks.productSize_id')
            ->join('products', 'products.id', 'stocks.product_id')
            ->select('stocks.*', 'product_sizes.title', 'product_sizes.id as productSizeId', 'products.category_id')
            ->whereRaw('products.deleted_at is null')
            ->orderBy('product_sizes.title', 'ASC')
            ->groupBy('stocks.productSize_id')
            ->get();

        $brands = Brand::whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.brand_id = brands.id');
                })
            ->where('active', 1)
            ->orderBy('name', 'ASC')
            ->get();

        $bannerInstitutionals = BannerInstitutional::first();

        // dd($brands);

        $field = 'products';

        return view('site.pages.products',[
            'productsMenu' => $productsMenu,
            'contacts' => Contact::first(),
            'categories' => $categories,
            'products' => $products,
            'colorCurrent' => $productColor,
            'colors'=> $productColors,
            'sizes'=> $productSizes,
            'brands'=> $brands,
            'request' => $request,
            'posts' => Post::all(),
            'field' => $field,
            'bannerInstitutionals' => $bannerInstitutionals
        ]);
    }

    public function productSizeFilter(Request $request, ProductSize $productSize)
    {
        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();

        // LISTAGEM DAS CATEGORIAS E SUAS SUBCATEGORIAS
        $categories = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])
            ->orderBy('order', 'ASC')
            ->get();

        $products = Product::with('stocksDefault')->with('gallery')
            ->join('stocks', 'stocks.product_id', '=', 'products.id')
            ->select(
                'stocks.amount as stock_amount',
                'stocks.promotion_value',
                'products.*'
            )
            ->where('stocks.productSize_id', $productSize->id)
            ->groupBy('products.id')
            ->paginate(12);

        $productColors = Stock::join('product_colors', 'product_colors.id', 'stocks.productColor_id')
            ->join('products', 'products.id', 'stocks.product_id')
            ->select('stocks.*', 'product_colors.name', 'product_colors.id as productColorId', 'products.category_id')
            ->whereRaw('products.deleted_at is null')
            ->orderBy('product_colors.name', 'ASC')
            ->groupBy('stocks.productColor_id')
            ->get();

        $productSizes = Stock::join('product_sizes', 'product_sizes.id', 'stocks.productSize_id')
            ->join('products', 'products.id', 'stocks.product_id')
            ->select('stocks.*', 'product_sizes.title', 'product_sizes.id as productSizeId', 'products.category_id')
            ->whereRaw('products.deleted_at is null')
            ->orderBy('product_sizes.title', 'ASC')
            ->groupBy('stocks.productSize_id')
            ->get();

        $brands = Brand::whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.brand_id = brands.id');
                })
            ->where('active', 1)
            ->orderBy('name', 'ASC')
            ->get();

        $bannerInstitutionals = BannerInstitutional::first();

        $field = 'products';

        return view('site.pages.products',[
            'productsMenu' => $productsMenu,
            'contacts' => Contact::first(),
            'categories' => $categories,
            'products' => $products,
            'sizeCurrent' => $productSize,
            'colors'=> $productColors,
            'sizes'=> $productSizes,
            'brands'=> $brands,
            'request' => $request,
            'posts' => Post::all(),
            'field' => $field,
            'bannerInstitutionals' => $bannerInstitutionals
        ]);
    }

    public function productBrandFilter(Request $request, Brand $productBrand)
    {
        //  dd($productBrand); //ESSE AQUI OK OK OK
        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();

        // LISTAGEM DAS CATEGORIAS E SUAS SUBCATEGORIAS
        $categories = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])
            ->orderBy('order', 'ASC')
            ->get();

        $products = Product::with('stocksDefault')->with('gallery')->where('products.brand_id', $productBrand->id)->orderBy('order', 'ASC')->paginate(12);

        $productColors = Stock::join('product_colors', 'product_colors.id', 'stocks.productColor_id')
            ->join('products', 'products.id', 'stocks.product_id')
            ->select('stocks.*', 'product_colors.name', 'product_colors.id as productColorId', 'products.category_id')
            ->whereRaw('products.deleted_at is null')
            ->orderBy('product_colors.name', 'ASC')
            ->groupBy('stocks.productColor_id')
            ->get();

        $productSizes = Stock::join('product_sizes', 'product_sizes.id', 'stocks.productSize_id')
            ->join('products', 'products.id', 'stocks.product_id')
            ->select('stocks.*', 'product_sizes.title', 'product_sizes.id as productSizeId', 'products.category_id')
            ->whereRaw('products.deleted_at is null')
            ->orderBy('product_sizes.title', 'ASC')
            ->groupBy('stocks.productSize_id')
            ->get();

        $brands = Brand::whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.brand_id = brands.id');
                })
            ->where('active', 1)
            ->orderBy('name', 'ASC')
            ->get();

        $bannerInstitutionals = BannerInstitutional::first();

        $field = 'products';


        return view('site.pages.products',[
            'productsMenu' => $productsMenu,
            'contacts' => Contact::first(),
            'categories' => $categories,
            'products' => $products,
            'brandCurrent' => $productBrand,
            'colors'=> $productColors,
            'sizes'=> $productSizes,
            'brands'=> $brands,
            'request' => $request,
            'posts' => Post::all(),
            'field' => $field,
            'bannerInstitutionals' => $bannerInstitutionals
        ]);
    }

    public function productColorCategoryFilter(Category $category, ProductColor $productColor)
    {

        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();

        // LISTAGEM DAS CATEGORIAS E SUAS SUBCATEGORIAS
        $categories = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])
            ->orderBy('order', 'ASC')
            ->get();

        // FILTRAGEM PARA OS PRODUTOS CATEGRY E SUB
        $products = Product::with('stocksDefault')->with('gallery')
            ->join('stocks', 'stocks.product_id', 'products.id')
            ->select('products.*', 'stocks.product_id')
            ->where('products.category_id', $category->id)
            ->where('stocks.productColor_id', $productColor->id)
            ->groupBy('products.id')
            ->orderBy('order', 'ASC')
            ->paginate(12);

        $productColors = Stock::join('product_colors', 'product_colors.id', 'stocks.productColor_id')
            ->join('products', 'products.id', 'stocks.product_id')
            ->join('categories', 'categories.id', 'products.category_id')
            ->select(
                'stocks.*',
                'product_colors.name',
                'product_colors.id as productColorId',
                'products.category_id',
                'categories.slug as category_slug'
            )
            ->where('products.category_id', $category->id)
            ->whereRaw('products.deleted_at is null')
            ->groupBy('stocks.productColor_id')
            ->get();


        $productSizes = Stock::join('product_sizes', 'product_sizes.id', 'stocks.productSize_id')
            ->join('products', 'products.id', 'stocks.product_id')
            ->join('categories', 'categories.id', 'products.category_id')
            ->select(
                'stocks.*',
                'product_sizes.title',
                'product_sizes.id as productSizeId',
                'products.category_id',
                'categories.slug as category_slug'
            )
            ->where('products.category_id', $category->id)
            ->whereRaw('products.deleted_at is null')
            ->orderBy('product_sizes.title', 'ASC')
            ->groupBy('stocks.productSize_id')
            ->get();


        $brands = Brand::join('products', 'products.brand_id', 'brands.id')
            ->join('categories', 'categories.id', 'products.category_id')
            ->select(
                'brands.*',
                'products.category_id',
                'categories.slug as category_slug'
            )
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.brand_id = brands.id');
                })
            ->where('brands.active', 1)
            ->groupBy('brands.id')
            ->orderBy('name', 'ASC')
            ->get();

        $field = 'category';

        // LISTAGEM DE CATEGORIAS
        $category = Category::select('categories.*')
            ->addSelect([
                'subcategory' => DB::raw('(select count(id) from subcategories where category_id = categories.id) as subcategory')
            ])
            ->where('categories.id', $category->id)->first();

        $bannerInstitutionals = BannerInstitutional::first();

        return view('site.pages.products',[
            'field' => $field,
            'productsMenu' => $productsMenu,
            'contacts' => Contact::first(),
            'categories' => $categories,
            'categoryCurrent' => $category,
            'products' => $products,
            'colorCurrent' => $productColor,
            'sizes'=> $productSizes,
            'brands'=> $brands,
            'colors'=> $productColors,
            'posts' => Post::all(),
            'bannerInstitutionals' => $bannerInstitutionals
        ]);
    }

    public function productSizeCategoryFilter(Category $category, ProductSize $productSize)
    {

        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();

        // LISTAGEM DAS CATEGORIAS E SUAS SUBCATEGORIAS
        $categories = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])
            ->orderBy('order', 'ASC')
            ->get();

        // FILTRAGEM PARA OS PRODUTOS CATEGRY E SUB
        $products = Product::with('stocksDefault')->with('gallery')
            ->join('stocks', 'stocks.product_id', 'products.id')
            ->select('products.*', 'stocks.product_id')
            ->where('products.category_id', $category->id)
            ->where('stocks.productSize_id', $productSize->id)
            ->groupBy('products.id')
            ->orderBy('order', 'ASC')
            ->paginate(12);

        $productColors = Stock::join('product_colors', 'product_colors.id', 'stocks.productColor_id')
            ->join('products', 'products.id', 'stocks.product_id')
            ->join('categories', 'categories.id', 'products.category_id')
            ->select(
                'stocks.*',
                'product_colors.name',
                'product_colors.id as productColorId',
                'products.category_id',
                'categories.slug as category_slug'
            )
            ->where('products.category_id', $category->id)
            ->whereRaw('products.deleted_at is null')
            ->orderBy('product_colors.name', 'ASC')
            ->groupBy('stocks.productColor_id')
            ->get();

        $productSizes = Stock::join('product_sizes', 'product_sizes.id', 'stocks.productSize_id')
            ->join('products', 'products.id', 'stocks.product_id')
            ->join('categories', 'categories.id', 'products.category_id')
            ->select(
                'stocks.*',
                'product_sizes.title',
                'product_sizes.id as productSizeId',
                'products.category_id',
                'categories.slug as category_slug'
            )
            ->where('products.category_id', $category->id)
            ->whereRaw('products.deleted_at is null')
            ->orderBy('product_sizes.title', 'ASC')
            ->groupBy('stocks.productSize_id')
            ->get();

        $brands = Brand::join('products', 'products.brand_id', 'brands.id')
            ->join('categories', 'categories.id', 'products.category_id')
            ->select(
                'brands.*',
                'products.category_id',
                'categories.slug as category_slug'
            )
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.brand_id = brands.id');
                })
            ->where('brands.active', 1)
            ->groupBy('brands.id')
            ->orderBy('brands.name', 'ASC')
            ->get();

        $field = 'category';

        // LISTAGEM DE CATEGORIAS
        $category = Category::select('categories.*')
            ->addSelect([
                'subcategory' => DB::raw('(select count(id) from subcategories where category_id = categories.id) as subcategory')
            ])
            ->where('categories.id', $category->id)->first();

        $bannerInstitutionals = BannerInstitutional::first();

        return view('site.pages.products',[
            'field' => $field,
            'productsMenu' => $productsMenu,
            'contacts' => Contact::first(),
            'categories' => $categories,
            'categoryCurrent' => $category,
            'products' => $products,
            'sizeCurrent' => $productSize,
            'colors'=> $productColors,
            'sizes'=> $productSizes,
            'brands'=> $brands,
            'posts' => Post::all(),
            'bannerInstitutionals' => $bannerInstitutionals
        ]);
    }

    public function productBrandCategoryFilter(Category $category, Brand $productBrand)
    {

        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();

        // LISTAGEM DAS CATEGORIAS E SUAS SUBCATEGORIAS
        $categories = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])
            ->orderBy('order', 'ASC')
            ->get();

        // FILTRAGEM PARA OS PRODUTOS CATEGRY E SUB
        $products = Product::with('stocksDefault')->with('gallery')->where('products.category_id', $category->id)->where('products.brand_id', $productBrand->id)->orderBy('order', 'ASC')->paginate(12);

        $productColors = Stock::join('product_colors', 'product_colors.id', 'stocks.productColor_id')
            ->join('products', 'products.id', 'stocks.product_id')
            ->join('categories', 'categories.id', 'products.category_id')
            ->select(
                'stocks.*',
                'product_colors.name',
                'product_colors.id as productColorId',
                'products.category_id',
                'categories.slug as category_slug'
            )
            ->where('products.category_id', $category->id)
            ->whereRaw('products.deleted_at is null')
            ->orderBy('product_colors.name', 'ASC')
            ->groupBy('stocks.productColor_id')
            ->get();

        $productSizes = Stock::join('product_sizes', 'product_sizes.id', 'stocks.productSize_id')
            ->join('products', 'products.id', 'stocks.product_id')
            ->join('categories', 'categories.id', 'products.category_id')
            ->select(
                'stocks.*',
                'product_sizes.title',
                'product_sizes.id as productSizeId',
                'products.category_id',
                'categories.slug as category_slug'
            )
            ->where('products.category_id', $category->id)
            ->whereRaw('products.deleted_at is null')
            ->orderBy('product_sizes.title', 'ASC')
            ->groupBy('stocks.productSize_id')
            ->get();

        $brands = Brand::join('products', 'products.brand_id', 'brands.id')
            ->join('categories', 'categories.id', 'products.category_id')
            ->select(
                'brands.*',
                'products.category_id',
                'categories.slug as category_slug'
            )
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.brand_id = brands.id');
                })
            ->where('products.category_id', $category->id)
            ->where('brands.active', 1)
            ->groupBy('brands.id')
            ->orderBy('brands.name', 'ASC')
            ->get();

        $field = 'category';

        // LISTAGEM DE CATEGORIAS
        $category = Category::select('categories.*')
            ->addSelect([
                'subcategory' => DB::raw('(select count(id) from subcategories where category_id = categories.id) as subcategory')
            ])
            ->where('categories.id', $category->id)->first();

        $bannerInstitutionals = BannerInstitutional::first();

        return view('site.pages.products',[
            'field' => $field,
            'productsMenu' => $productsMenu,
            'contacts' => Contact::first(),
            'categories' => $categories,
            'categoryCurrent' => $category,
            'products' => $products,
            'sizeCurrent' => $productBrand,
            'colors'=> $productColors,
            'sizes'=> $productSizes,
            'brands'=> $brands,
            'posts' => Post::all(),
            'bannerInstitutionals' => $bannerInstitutionals
        ]);
    }

    public function productColorSubcategoryFilter(Category $category, Subcategory $subcategory, ProductColor $productColor)
    {
        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();

        // LISTAGEM DAS CATEGORIAS E SUAS SUBCATEGORIAS
        $categories = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])
            ->orderBy('order', 'ASC')
            ->get();

        $field = 'subcategory';
        // FILTRAGEM PARA OS PRODUTOS CATEGRY E SUB
        // FILTRAGEM PARA OS PRODUTOS CATEGRY E SUB
        $products = Product::with('stocksDefault')->with('gallery')
            ->join('stocks', 'stocks.product_id', 'products.id')
            ->select('products.*', 'stocks.product_id')
            ->where('products.category_id', $category->id)
            ->where('products.subcategory_id', $subcategory->id)
            ->where('stocks.productColor_id', $productColor->id)
            ->groupBy('products.id')
            ->orderBy('order', 'ASC')
            ->paginate(12);

        $productColors = Stock::join('product_colors', 'product_colors.id', 'stocks.productColor_id')
            ->join('products', 'products.id', 'stocks.product_id')
            ->join('categories', 'categories.id', 'products.category_id')
            ->join('subcategories', 'subcategories.id', 'products.subcategory_id')
            ->select(
                'stocks.*',
                'product_colors.name',
                'product_colors.id as productColorId',
                'products.category_id',
                'products.subcategory_id',
                'categories.slug as category_slug',
                'subcategories.slug as subcategory_slug',
            )
            ->where('products.category_id', $category->id)
            ->where('products.subcategory_id', $subcategory->id)
            ->whereRaw('products.deleted_at is null')
            ->groupBy('stocks.productColor_id')
            ->get();

        $productSizes = Stock::join('product_sizes', 'product_sizes.id', 'stocks.productSize_id')
            ->join('products', 'products.id', 'stocks.product_id')
            ->join('categories', 'categories.id', 'products.category_id')
            ->join('subcategories', 'subcategories.id', 'products.subcategory_id')
            ->select(
                'stocks.*',
                'product_sizes.title',
                'product_sizes.id as productSizeId',
                'products.category_id',
                'products.subcategory_id',
                'categories.slug as category_slug',
                'subcategories.slug as subcategory_slug',
            )
            ->where('products.category_id', $category->id)
            ->where('products.subcategory_id', $subcategory->id)
            ->whereRaw('products.deleted_at is null')
            ->orderBy('product_sizes.title', 'ASC')
            ->groupBy('stocks.productSize_id')
            ->get();

        $brands = Brand::join('products', 'products.brands_id', 'brands.id')
            ->join('categories', 'categories.id', 'products.category_id')
            ->join('subcategories', 'subcategories.id', 'products.subcategory_id')
            ->select(
                'brands.*',
                'products.category_id',
                'products.subcategory_id',
                'categories.slug as category_slug',
                'subcategories.slug as subcategory_slug',
            )
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.brand_id = brands.id');
                })
            ->where('brands.active', 1)
            ->groupBy('brands.id')
            ->orderBy('brands.name', 'ASC')
            ->get();

        // LISTAGEM DE SUBCATEGORIAS
        $category = Category::select('categories.*')
            ->addSelect([
                'subcategory' => DB::raw('(select count(id) from subcategories where category_id = categories.id) as subcategory')
            ])
            ->where('categories.id', $category->id)->first();

        // LISTAGEM DE SUBCATEGORIAS
        $subcategory = Subcategory::join('categories', 'categories.id', '=', 'subcategories.category_id')
            ->select('categories.title as category', 'subcategories.*')
            ->where('subcategories.id', $subcategory->id)->first();

        $bannerInstitutionals = BannerInstitutional::first();

        return view('site.pages.products',[
            'field' => $field,
            'productsMenu' => $productsMenu,
            'contacts' => Contact::first(),
            'categoryCurrent' => $category,
            'subcategoryCurrent' => $subcategory,
            'categories' => $categories,
            'products' => $products,
            'colorCurrent' => $productColor,
            'colors'=> $productColors,
            'sizes'=> $productSizes,
            'brands'=> $brands,
            'posts' => Post::all(),
            'bannerInstitutionals' => $bannerInstitutionals
        ]);
    }

    public function productSizeSubcategoryFilter(Category $category, Subcategory $subcategory, ProductSize $productSize)
    {
        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();

        // LISTAGEM DAS CATEGORIAS E SUAS SUBCATEGORIAS
        $categories = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])
            ->orderBy('order', 'ASC')
            ->get();

        $field = 'subcategory';
        // FILTRAGEM PARA OS PRODUTOS CATEGRY E SUB
        // FILTRAGEM PARA OS PRODUTOS CATEGRY E SUB
        $products = Product::with('stocksDefault')->with('gallery')
            ->join('stocks', 'stocks.product_id', 'products.id')
            ->select('products.*', 'stocks.product_id')
            ->where('products.category_id', $category->id)
            ->where('products.subcategory_id', $subcategory->id)
            ->where('stocks.productSize_id', $productSize->id)
            ->groupBy('products.id')
            ->orderBy('order', 'ASC')
            ->paginate(12);

        $productColors = Stock::join('product_colors', 'product_colors.id', 'stocks.productColor_id')
            ->join('products', 'products.id', 'stocks.product_id')
            ->join('categories', 'categories.id', 'products.category_id')
            ->join('subcategories', 'subcategories.id', 'products.subcategory_id')
            ->select(
                'stocks.*',
                'product_colors.name',
                'product_colors.id as productColorId',
                'products.category_id',
                'products.subcategory_id',
                'categories.slug as category_slug',
                'subcategories.slug as subcategory_slug',
            )
            ->where('products.category_id', $category->id)
            ->where('products.subcategory_id', $subcategory->id)
            ->whereRaw('products.deleted_at is null')
            ->orderBy('product_colors.name', 'ASC')
            ->groupBy('stocks.productColor_id')
            ->get();

        $productSizes = Stock::join('product_sizes', 'product_sizes.id', 'stocks.productSize_id')
            ->join('products', 'products.id', 'stocks.product_id')
            ->join('categories', 'categories.id', 'products.category_id')
            ->join('subcategories', 'subcategories.id', 'products.subcategory_id')
            ->select(
                'stocks.*',
                'product_sizes.title',
                'product_sizes.id as productSizeId',
                'products.category_id',
                'products.subcategory_id',
                'categories.slug as category_slug',
                'subcategories.slug as subcategory_slug',
            )
            ->where('products.category_id', $category->id)
            ->where('products.subcategory_id', $subcategory->id)
            ->whereRaw('products.deleted_at is null')
            ->orderBy('product_sizes.title', 'ASC')
            ->groupBy('stocks.productSize_id')
            ->get();

        $brands = Brand::join('products', 'products.brands_id', 'brands.id')
            ->join('categories', 'categories.id', 'products.category_id')
            ->join('subcategories', 'subcategories.id', 'products.subcategory_id')
            ->select(
                'brands.*',
                'products.category_id',
                'products.subcategory_id',
                'categories.slug as category_slug',
                'subcategories.slug as subcategory_slug',
            )
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.brand_id = brands.id');
                })
            ->where('brands.active', 1)
            ->groupBy('brands.id')
            ->orderBy('brands.name', 'ASC')
            ->get();

        // LISTAGEM DE SUBCATEGORIAS
        $category = Category::select('categories.*')
            ->addSelect([
                'subcategory' => DB::raw('(select count(id) from subcategories where category_id = categories.id) as subcategory')
            ])
            ->where('categories.id', $category->id)->first();

        // LISTAGEM DE SUBCATEGORIAS
        $subcategory = Subcategory::join('categories', 'categories.id', '=', 'subcategories.category_id')
            ->select('categories.title as category', 'subcategories.*')
            ->where('subcategories.id', $subcategory->id)->first();

        $bannerInstitutionals = BannerInstitutional::first();

        return view('site.pages.products',[
            'field' => $field,
            'productsMenu' => $productsMenu,
            'contacts' => Contact::first(),
            'categoryCurrent' => $category,
            'subcategoryCurrent' => $subcategory,
            'categories' => $categories,
            'products' => $products,
            'sizeCurrent' => $productSize,
            'colors'=> $productColors,
            'sizes'=> $productSizes,
            'brands'=> $brands,
            'posts' => Post::all(),
            'bannerInstitutionals' => $bannerInstitutionals
        ]);
    }

    public function productBrandSubcategoryFilter(Category $category, Subcategory $subcategory, Brand $productBrand)
    {
        // dd($subcategory);
        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();

        // LISTAGEM DAS CATEGORIAS E SUAS SUBCATEGORIAS
        $categories = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])
            ->orderBy('order', 'ASC')
            ->get();

        $field = 'subcategory';
        // FILTRAGEM PARA OS PRODUTOS CATEGRY E SUB
        // FILTRAGEM PARA OS PRODUTOS CATEGRY E SUB
        // $products = Product::with('stocksDefault')->with('gallery')
        //     ->join('stocks', 'stocks.product_id', 'products.id')
        //     ->select('products.*', 'stocks.product_id')
        //     ->where('products.category_id', $category->id)
        //     ->where('products.subcategory_id', $subcategory->id)
        //     ->where('products.brand_id', $productBrand->id)
        //     ->groupBy('products.id')
        //     ->orderBy('order', 'ASC')
        //     ->paginate(12);

        $products = Product::with('stocksDefault')->with('gallery')->where('products.category_id', $category->id)->where('products.subcategory_id', $subcategory->id)->where('products.brand_id', $productBrand->id)->orderBy('order', 'ASC')->paginate(12);

        $productColors = Stock::join('product_colors', 'product_colors.id', 'stocks.productColor_id')
            ->join('products', 'products.id', 'stocks.product_id')
            ->join('categories', 'categories.id', 'products.category_id')
            ->join('subcategories', 'subcategories.id', 'products.subcategory_id')
            ->select(
                'stocks.*',
                'product_colors.name',
                'product_colors.id as productColorId',
                'products.category_id',
                'products.subcategory_id',
                'categories.slug as category_slug',
                'subcategories.slug as subcategory_slug',
            )
            ->where('products.category_id', $category->id)
            ->where('products.subcategory_id', $subcategory->id)
            ->whereRaw('products.deleted_at is null')
            ->orderBy('product_colors.name', 'ASC')
            ->groupBy('stocks.productColor_id')
            ->get();

        $productSizes = Stock::join('product_sizes', 'product_sizes.id', 'stocks.productSize_id')
            ->join('products', 'products.id', 'stocks.product_id')
            ->join('categories', 'categories.id', 'products.category_id')
            ->join('subcategories', 'subcategories.id', 'products.subcategory_id')
            ->select(
                'stocks.*',
                'product_sizes.title',
                'product_sizes.id as productSizeId',
                'products.category_id',
                'products.subcategory_id',
                'categories.slug as category_slug',
                'subcategories.slug as subcategory_slug',
            )
            ->where('products.category_id', $category->id)
            ->where('products.subcategory_id', $subcategory->id)
            ->whereRaw('products.deleted_at is null')
            ->orderBy('product_sizes.title', 'ASC')
            ->groupBy('stocks.productSize_id')
            ->get();

        $brands = Brand::join('products', 'products.brand_id', 'brands.id')
            ->join('categories', 'categories.id', 'products.category_id')
            ->join('subcategories', 'subcategories.id', 'products.subcategory_id')
            ->select(
                'brands.*',
                'products.category_id',
                'products.subcategory_id',
                'categories.slug as category_slug',
                'subcategories.slug as subcategory_slug',
            )
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.brand_id = brands.id');
                })
            ->where('products.category_id', $category->id)
            ->where('products.subcategory_id', $subcategory->id)
            ->where('brands.active', 1)
            ->groupBy('brands.id')
            ->orderBy('brands.name', 'ASC')
            ->get();
        // dd($brands);
        // LISTAGEM DE SUBCATEGORIAS
        $category = Category::select('categories.*')
            ->addSelect([
                'subcategory' => DB::raw('(select count(id) from subcategories where category_id = categories.id) as subcategory')
            ])
            ->where('categories.id', $category->id)->first();

        // LISTAGEM DE SUBCATEGORIAS
        $subcategory = Subcategory::join('categories', 'categories.id', '=', 'subcategories.category_id')
            ->select('categories.title as category', 'subcategories.*')
            ->where('subcategories.id', $subcategory->id)->first();

        $bannerInstitutionals = BannerInstitutional::first();

        return view('site.pages.products',[
            'field' => $field,
            'productsMenu' => $productsMenu,
            'contacts' => Contact::first(),
            'categoryCurrent' => $category,
            'subcategoryCurrent' => $subcategory,
            'categories' => $categories,
            'products' => $products,
            'sizeCurrent' => $productBrand,
            'colors'=> $productColors,
            'sizes'=> $productSizes,
            'brands'=> $brands,
            'posts' => Post::all(),
            'bannerInstitutionals' => $bannerInstitutionals

        ]);
    }

    public function verifyStock(Request $request)
    {
        $stock = Stock::find($request->stock);

        if($request->quantity > $stock->quantity){
            $response['status'] = 'error';
            $response['quantity'] = $stock->quantity;
        }else{
            $response['status'] = 'success';
        }

        return Response::json($response);
    }

}
