<?php

namespace App\Http\Controllers;

use App\FooterLink;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class FooterLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footerLinks = FooterLink::all();
        return view('admin.footerLink.index',[
            'footerLinks' => $footerLinks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.footerLink.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('path_archive')){
            $clientOriginalName = $request->file('path_archive')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_archive')->extension();
            $newNameImage = $nameSlug.'.'.$extension;
        }

        $footerLink = new FooterLink();
        $footerLink->title_link = $request->title_link;
        $footerLink->title_modal = $request->title_modal;
        $footerLink->active = $request->active?:0;
        $footerLink->text = $request->text;
        if($request->hasFile('path_archive')){
            $footerLink->path_archive = $newNameImage;
        }
        if($footerLink->save()){
            if($request->hasFile('path_archive')){
                $request->file('path_archive')->storeAs('admin/uploads/archive', $newNameImage);
            }

            Session::flash('success','Conteúdo cadastrado com sucesso');
            return redirect()->route('admin.footerLink.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FooterLink  $footerLink
     * @return \Illuminate\Http\Response
     */
    public function show(FooterLink $footerLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FooterLink  $footerLink
     * @return \Illuminate\Http\Response
     */
    public function edit(FooterLink $footerLink)
    {
        return view('admin.footerLink.edit',[
            'footerLink' => $footerLink
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FooterLink  $footerLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FooterLink $footerLink)
    {
        if($request->hasFile('path_archive')){
            $clientOriginalName = $request->file('path_archive')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_archive')->extension();
            $newNameImage = $nameSlug.'.'.$extension;
        }

        if($request->hasFile('path_image')){
            $removed = Storage::delete('admin/uploads/fotos/'.$footerLink->path_archive);
        }

        $footerLink->title_link = $request->title_link;
        $footerLink->title_modal = $request->title_modal;
        $footerLink->active = $request->active?:0;
        $footerLink->text = $request->text;
        if($request->hasFile('path_archive')){
            $footerLink->path_archive = $newNameImage;
        }
        if($footerLink->save()){
            if($request->hasFile('path_archive')){
                $request->file('path_archive')->storeAs('admin/uploads/archive', $newNameImage);
            }

            Session::flash('success','Conteúdo atualizado com sucesso');
            return redirect()->route('admin.footerLink.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FooterLink  $footerLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(FooterLink $footerLink)
    {
        Storage::delete('admin/uploads/fotos/'.$footerLink->path_archive);
        $footerLink->delete();
        Session::flash('success','Link deletado com sucesso');
        return redirect()->route('admin.footerLink.index');
    }
}
