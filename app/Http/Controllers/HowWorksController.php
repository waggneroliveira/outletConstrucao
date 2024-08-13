<?php

namespace App\Http\Controllers;

use App\HowWorks;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HowWorksController extends Controller
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

        $howWorks = new HowWorks();
        $howWorks->title = $request->title;
        if($request->hasFile('path_image')){
            $howWorks->path_image = $newNameImage;
        }
        $howWorks->save();

        if($request->hasFile('path_image')){
            $request->file('path_image')->storeAs('admin/uploads/fotos', $newNameImage);
        }

        Session::flash('success','Registro cadastrado com sucesso');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HowWorks  $howWorks
     * @return \Illuminate\Http\Response
     */
    public function show(HowWorks $howWorks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HowWorks  $howWorks
     * @return \Illuminate\Http\Response
     */
    public function edit(HowWorks $howWorks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HowWorks  $howWorks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HowWorks $howWorks)
    {
        if($request->hasFile('path_image')){
            $clientOriginalName = $request->file('path_image')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_image')->extension();

            $newNameImage = $nameSlug.'.'.$extension;
        }

        $howWorks->title = $request->title;
        if($request->hasFile('path_image')){
            $howWorks->path_image = $newNameImage;
        }
        $howWorks->save();

        if($request->hasFile('path_image')){
            $request->file('path_image')->storeAs('admin/uploads/fotos', $newNameImage);
        }

        Session::flash('success','Registro atualizado com sucesso');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HowWorks  $howWorks
     * @return \Illuminate\Http\Response
     */
    public function destroy(HowWorks $howWorks)
    {
        $howWorks->delete();
        Session::flash('success','Registro deletado com sucesso');
        return redirect()->back();
    }
}
