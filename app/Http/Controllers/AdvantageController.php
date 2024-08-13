<?php

namespace App\Http\Controllers;

use App\Advantage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdvantageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if($request->hasFile('path_image')){
            $clientOriginalName = $request->file('path_image')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_image')->extension();

            $newNameImage = $nameSlug.'.'.$extension;
        }

        $advantage = new Advantage();
        $advantage->title = $request->title;
        $advantage->description = $request->description;
        if($request->hasFile('path_image')){
            $advantage->path_image = $newNameImage;
        }
        $advantage->save();

        if($request->hasFile('path_image')){
            $request->file('path_image')->storeAs('admin/uploads/fotos', $newNameImage);
        }

        Session::flash('success','Vantagem cadastrado com sucesso');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Advantage  $advantage
     * @return \Illuminate\Http\Response
     */
    public function show(Advantage $advantage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Advantage  $advantage
     * @return \Illuminate\Http\Response
     */
    public function edit(Advantage $advantage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Advantage  $advantage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advantage $advantage)
    {
        if($request->hasFile('path_image')){
            $clientOriginalName = $request->file('path_image')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_image')->extension();

            $newNameImage = $nameSlug.'.'.$extension;
        }

        $advantage->title = $request->title;
        $advantage->description = $request->description;
        if($request->hasFile('path_image')){
            $advantage->path_image = $newNameImage;
        }
        $advantage->save();

        if($request->hasFile('path_image')){
            $request->file('path_image')->storeAs('admin/uploads/fotos', $newNameImage);
        }

        Session::flash('success','Vantagem atualizada com sucesso');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Advantage  $advantage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advantage $advantage)
    {
        $advantage->delete();
        Session::flash('success','Registro deletado com sucesso');
        return redirect()->back();
    }
}
