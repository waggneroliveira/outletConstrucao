<?php

namespace App\Http\Controllers;

use App\Blog;
use DateTime;
use App\CategoryBlog;
use App\NotificationPush;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
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
        return view('admin.blog.index', [
            'blogs' => Blog::all(),
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
        return view('admin.blog.create', [
            'categories' => CategoryBlog::where('active', 1)->orderBy('title', 'ASC')->get(),
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
        if($request->hasFile('path_image')){
            $clientOriginalName = $request->file('path_image')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_image')->extension();

            $newNameImage = $nameSlug.'.'.$extension;
        }

        $request->publishing = str_replace('/','-',$request->publishing);
        $request->publishing = new DateTime($request->publishing);

        $blog = new Blog();
        $blog->category_id = $request->category_id;
        $blog->title = $request->title;
        $blog->publishing = $request->publishing;
        $blog->description = $request->description;
        $blog->text = $request->text;

        if($request->hasFile('path_image')){
            $blog->path_image = $newNameImage;
        }

        if($blog->save()){
            if($request->hasFile('path_image')){
                $request->file('path_image')->storeAs('admin/uploads/fotos', $newNameImage);
            }
            Session::flash('success','Blog cadastrado com sucesso');
            return redirect()->route('admin.blog.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();
        return view('admin.blog.edit', [
            'categories' => CategoryBlog::where('active', 1)->orderBy('title', 'ASC')->get(),
            'blog' => $blog,
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        if($request->hasFile('path_image')){
            $clientOriginalName = $request->file('path_image')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_image')->extension();

            $newNameImage = $nameSlug.'.'.$extension;
        }

        $request->publishing = str_replace('/','-',$request->publishing);
        $request->publishing = new DateTime($request->publishing);

        $blog->category_id = $request->category_id;
        $blog->title = $request->title;
        $blog->publishing = $request->publishing;
        $blog->description = $request->description;
        $blog->text = $request->text;

        if($request->hasFile('path_image')){
            $blog->path_image = $newNameImage;
        }

        if($blog->save()){
            if($request->hasFile('path_image')){
                $request->file('path_image')->storeAs('admin/uploads/fotos', $newNameImage);
            }
            Session::flash('success','Blog atualizado com sucesso');
            return redirect()->route('admin.blog.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {

        Storage::delete('admin/uploads/fotos/'.$blog->path_image);

        $blog->delete();

        Session::flash('success','Blog deletado com sucesso');
        return redirect()->route('admin.blog.index');
    }
}
