<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Contact;
use App\Product;
use App\Category;
use App\CategoryBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class BlogPageController extends Controller
{
    public function index(){

        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();

        $categoryBlog = CategoryBlog::whereExists(function($query){
                $query->select(Blog::raw('id'))
                    ->from('blogs')
                    ->whereRaw('blogs.category_id = category_blogs.id');
            })->where([
                ['active', '=', 1],
            ])->get();

        return view('site.pages.blogs', [
            'categories' => $categoryBlog,
            'blogs' => Blog::all(),
            'productsMenu' => $productsMenu,
            'contacts' => Contact::first(),
        ]);
    }
    public function blogCategory(CategoryBlog $category)
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

        $categoryBlog = CategoryBlog::whereExists(function($query){
                $query->select(Blog::raw('id'))
                    ->from('blogs')
                    ->whereRaw('blogs.category_id = category_blogs.id');
            })->where([
                ['active', '=', 1],
            ])->get();

        return view('site.pages.blogs', [
            'categories' => $categoryBlog,
            'blogs' => Blog::where('category_id', $category->id)->get(),
            'productsMenu' => $productsMenu,
            'contacts' => Contact::first(),
        ]);
    }
    public function blogContent(Request $request, Blog $blog)
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

        $categoryBlog = CategoryBlog::whereExists(function($query){
            $query->select(Blog::raw('id'))
                ->from('blogs')
                ->whereRaw('blogs.category_id = category_blogs.id');
            })->where([
                ['active', '=', 1],
            ])->get();

        return view('site.pages.blogContent', [
            'categories' => $categoryBlog,
            'blog' => $blog,
            'blogs' => Blog::where('id', '!=', $blog->id)->get(),
            'productsMenu' => $productsMenu,
            'contacts' => Contact::first(),
        ]);
    }
}
