<?php

namespace App\Http\Controllers;

use App\Brand;
use App\tag;
use App\Stock;
use App\Product;
use App\Category;
use App\ProductTag;
use App\ProductSize;
use App\Subcategory;
use App\ProductColor;
use App\product_gallery;
use App\NotificationPush;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\ProductOptionCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
            ->select('products.*', 'categories.title as category_title', 'subcategories.title as subcategory_title')
            ->where('products.id', '!=', 0)
            ->orderBy('order', 'ASC')
            ->get();

        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();
        return view('admin.product.index', [
            'products' => $products,
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
        $brands = Brand::where('active', 1)->get();
        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();

        return view('admin.product.create', [
            'categories' => Category::all(),
            'subcategories' => Subcategory::all(),
            'brands' => $brands,
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

        $categorySlug = Category::find($request->category_id);
        $slugUnique = $categorySlug->slug.'-'.Str::slug($request->title);

        if($request->subcategory_id){
            $subcategorySlug = Subcategory::find($request->subcategory_id);
            $slugUnique = $categorySlug->slug.'-'.$subcategorySlug->slug.'-'.Str::slug($request->title);
        }

        $request->promotinal_value = str_replace(',','.',$request->promotinal_value);
        $request->amount = str_replace(',','.',$request->amount);

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id?:1;
        $product->brand_id = $request->brand_id?:0;
        $product->title = $request->title;
        $product->description = $request->description?:null;
        $product->brief_description = $request->brief_description?:null;
        $product->feature = $request->feature?:null;
        $product->amount = (float) $request->amount;
        $product->reference_code = $request->reference_code;
        $product->order = $request->order;

        $product->promotinal_value = (float) $request->promotinal_value?:null;
        $product->promotion = $request->promotion?1:0;
        $product->active = $request->active?1:0;

        $product->slug = $slugUnique;
        $product->inputs = $request->inputs?implode(',',$request->inputs):null;;
        $product->width = $request->width;
        $product->length = $request->length;
        $product->weigth = str_replace(',','.', $request->weigth);
        $product->height = $request->height;
        $product->save();

        if($request->hasFile('path_image')){
            for($i=0; $i < count($request->allFiles()['path_image']); $i++){
                $image = $request->allFiles()['path_image'][$i];

                $clientOriginalName = $image->getClientOriginalName();
                $nameImage = explode('.', $clientOriginalName)[0];
                $nameSlug = Str::of($nameImage)->slug().'-'.time();
                $extension = $image->extension();

                $newNameImage = $nameSlug.'.'.$extension;

                $product_gallery = new product_gallery();
                $product_gallery->product_id = $product->id;
                $product_gallery->path_image = $newNameImage;
                if($i === 0){
                    $product_gallery->product_cover = 1;
                }
                $product_gallery->save();
                unset($product_gallery);
                $image->storeAs('admin/uploads/fotos', $newNameImage);
            }

        }

        Session::flash('success','Produto cadastrado com sucesso');
        return redirect()->route('admin.product.edit', ['product' => $product->slug]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $gallery = $product->gallery()->get();

        $brands = Brand::where('active', 1)->get();

        $productModels = $product->productModel()->get();

        $productTag = ProductTag::join('tags', 'tags.id', '=', 'product_tags.tag_id')
            ->where('product_id', $product->id)
            ->select('product_tags.*', 'tags.title', 'tags.path_image')
            ->get();

        $stocks = Stock::join('product_sizes', 'product_sizes.id', '=', 'stocks.productSize_id')
            ->join('product_colors', 'product_colors.id', '=', 'stocks.productColor_id')
            ->select('stocks.*','product_colors.name','product_sizes.title')
            ->where('product_id', $product->id)->get();

        $subcategories = Subcategory::where('category_id', $product->category_id)->get();

        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();
        return view('admin.product.edit',[
            'product' => $product,
            'galeries' => $gallery,
            'productModels' => $productModels,
            'categories' => Category::all(),
            'subcategories' => $subcategories,
            'brands' => $brands,
            'tags' => tag::all(),
            'productTags' => $productTag,
            'productOptionCategories' => ProductOptionCategory::where('product_id', $product->id)->get(),
            'stocks' => $stocks,
            'productSizes' => ProductSize::where('active', 1)->get(),
            'productColors' => ProductColor::where('active', 1)->get(),
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $categorySlug = Category::find($request->category_id);
        $slugUnique = $categorySlug->slug.'-'.Str::slug($request->title);

        if($request->subcategory_id){
            $subcategorySlug = Subcategory::find($request->subcategory_id);
            $slugUnique = $categorySlug->slug.'-'.$subcategorySlug->slug.'-'.Str::slug($request->title);
        }

        $request->promotinal_value = str_replace(',','.',$request->promotinal_value);
        $request->amount = str_replace(',','.',$request->amount);

        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id?:1;
        $product->brand_id = $request->brand_id?:0;
        $product->title = $request->title;
        $product->description = $request->description?:null;
        $product->brief_description = $request->brief_description?:null;
        $product->feature = $request->feature?:null;
        $product->amount = (float) $request->amount;
        $product->reference_code = $request->reference_code;
        $product->order = $request->order;

        $product->promotinal_value = (float) $request->promotinal_value?:null;
        $product->promotion = $request->promotion?1:0;
        $product->active = $request->active?1:0;

        $product->slug = $slugUnique;
        $product->inputs = $request->inputs?implode(',',$request->inputs):null;
        $product->width = $request->width;
        $product->length = $request->length;
        $product->weigth = str_replace(',','.', $request->weigth);
        $product->height = $request->height;

        $product->save();

        if($request->hasFile('path_image')){

            product_gallery::where('product_id', $product->id)->update(['product_cover' => 0]);

            for($i=0; $i < count($request->allFiles()['path_image']); $i++){
                $image = $request->allFiles()['path_image'][$i];

                $clientOriginalName = $image->getClientOriginalName();
                $nameImage = explode('.', $clientOriginalName)[0];
                $nameSlug = Str::of($nameImage)->slug().'-'.time();
                $extension = $image->extension();

                $newNameImage = $nameSlug.'.'.$extension;

                $product_gallery = new product_gallery();
                $product_gallery->product_id = $product->id;
                $product_gallery->path_image = $newNameImage;
                if($i === 0){
                    $product_gallery->product_cover = 1;
                }
                $product_gallery->save();
                unset($product_gallery);
                $image->storeAs('admin/uploads/fotos', $newNameImage);
            }

        }

        Session::flash('success','Alterações realizadas com sucesso');
        return redirect()->route('admin.product.edit', ['product' => $product->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->delete()){
            Session::flash('success','Produto deletada com sucesso');
        }else{
            Session::flash('error','Problema ao deletar produto');
        }

        return redirect()->route('admin.product.index');
    }

    public function editproduct(Request $request, Product $product){

        // return Response::json($product);

        switch($request->field){
            case 'promotion':
                if($request->promotion){
                    $product->promotion = (int) $request->promotion;
                    $rponse['mensagem'] = 'Produto marcado como promoção';
                }else{
                    $product->promotion = 0;
                    $rponse['mensagem'] = 'Produto desmarcado como promoção';
                }

                if($product->save()){
                    $rponse['response'] = 'success';
                }

                return Response::json($rponse);

            break;
            case 'active':
                if($request->active){
                    $product->active = (int) $request->active;
                    $rponse['mensagem'] = 'Produto marcado como ativo';
                }else{
                    $product->active = 0;
                    $rponse['mensagem'] = 'Produto marcado como inativo';
                }

                if($product->save()){
                    $rponse['response'] = 'success';
                }

                return Response::json($rponse);

            break;

        }
    }

    public function orderRecord(Request $request)
    {
        $product = Product::find($request->id);
        $product->order = $request->order;
        $rponse['response'] = 'success';

        if(!$product->save()){
            $rponse['response'] = 'error';
        }

        return Response::json($rponse);
    }
}
