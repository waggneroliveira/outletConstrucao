<?php

namespace App\Http\Controllers;

use App\CategoryBlog;
use App\NotificationPush;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryBlogController extends Controller
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
        return view('admin.categoryBlog.index', [
            'categories' => CategoryBlog::all(),
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
        return view('admin.categoryBlog.create',[
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
        $categoryBlog = new CategoryBlog();
        $categoryBlog->title = $request->title;
        $categoryBlog->active = $request->active?1:0;

        if($categoryBlog->save()){
            Session::flash('success','Categoria cadastrada com sucesso');
            return redirect()->route('admin.categoryBlog.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoryBlog  $categoryBlog
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryBlog $categoryBlog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoryBlog  $categoryBlog
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryBlog $categoryBlog)
    {
        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();
        return view('admin.categoryBlog.edit', [
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity,
            'category' => $categoryBlog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryBlog  $categoryBlog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryBlog $categoryBlog)
    {
        $categoryBlog->title = $request->title;
        $categoryBlog->active = $request->active?1:0;

        if($categoryBlog->save()){
            Session::flash('success','Categoria atualizada com sucesso');
            return redirect()->route('admin.categoryBlog.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoryBlog  $categoryBlog
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryBlog $categoryBlog)
    {
        $categoryBlog->delete();
        Session::flash('success','Categoria deletada com sucesso');
        return redirect()->route('admin.categoryBlog.index');
    }
}
