<?php

namespace App\Http\Controllers;

use App\tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tag.index',[
            'tags' => Tag::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
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

        $tag = new Tag();
        $tag->title = $request->title;
        $tag->path_image = $newNameImage;

        if($tag->save()){
            Session::flash('success','Etiqueta cadastrada com sucesso');
        }

        if($request->hasFile('path_image')){
            $request->file('path_image')->storeAs('admin/uploads/fotos', $newNameImage);
        }

        return redirect()->route('admin.tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(tag $tag)
    {
        return view('admin.tag.edit', [
            'tag' => $tag->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tag $tag)
    {
        if($request->hasFile('path_image')){
            $clientOriginalName = $request->file('path_image')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_image')->extension();

            $newNameImage = $nameSlug.'.'.$extension;
        }

        if($request->hasFile('path_image')){
            $removed = Storage::delete('admin/uploads/fotos/'.$tag->path_image);
        }

        $tag->title = $request->title;
        if($request->hasFile('path_image')){
            $tag->path_image = $newNameImage;
        }
        if($tag->save()){
            Session::flash('success','Etiqueta alterada com sucesso');
        }

        if($request->hasFile('path_image')){
            $request->file('path_image')->storeAs('admin/uploads/fotos', $newNameImage);
        }

        return redirect()->route('admin.tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(tag $tag)
    {
        $tag->delete();
        Session::flash('success','Etiqueta deletada com sucesso');
        return redirect()->route('admin.tag.index');
    }
}
