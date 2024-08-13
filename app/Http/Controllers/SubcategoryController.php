<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use App\NotificationPush;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = DB::table('subcategories')
            ->join('categories', 'subcategories.category_id', '=', 'categories.id')
            ->whereNull('subcategories.deleted_at')
            ->select('subcategories.*', 'categories.title as category_title')
            ->get();

        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();
        return view('admin.subcategory.index', [
            'subcategories' => $subcategories->toArray(),
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
        return view('admin.subcategory.create', [
            'categories' => Category::all(),
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
        $this->validate($request,[
            "title" => 'required|max:255',
            "category_id" => 'required'
        ],[
            'required'=>'O campo :attribute é obrigatorio',
        ]);

        $categorySlug = Category::find($request->category_id);

        $slugUnique = $categorySlug->slug.'-'.Str::slug($request->title);

        $table = new Subcategory();
        $table->category_id = $request->category_id;
        $table->title = $request->title;
        $table->active = $request->active? 1:0;
        $table->slug = $slugUnique;
        if($table->save()){
            Session::flash('success','Subcategoria cadastrada com sucesso');
        }

        return redirect()->route('admin.subcategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();
        return view('admin.subcategory.edit', [
            'subcategory' => $subcategory->toArray(),
            'categories' => Category::all()->toArray(),
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $this->validate($request,[
            "title" => 'required|max:255',
            "category_id" => 'required'
        ],[
            'required'=>'O campo :attribute é obrigatorio',
        ]);

        $categorySlug = Category::find($request->category_id);
        $slugUnique = $categorySlug->slug.'-'.Str::slug($request->title);

        $subcategory->title = $request->title;
        $subcategory->category_id = $request->category_id;
        $subcategory->active = $request->active ? 1:0;
        $subcategory->slug = $slugUnique;
        if($subcategory->save()){
            Session::flash('success','Alterações realizadas com sucesso');
        }

        return redirect()->route('admin.subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        if($subcategory->delete()){
            Session::flash('success','Subcategoria deletada com sucesso');
        }else{
            Session::flash('error','Problema ao deletar subcategoria');
        }

        return redirect()->route('admin.subcategory.index');

    }

    public function filterSubcategory(Request $request)
    {

        $subcategories = Subcategory::where('category_id', $request->category_id)->get();

        return Response::json($subcategories);
    }
}
