<?php

namespace App\Http\Controllers;

use App\Topic;
use App\NotificationPush;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TopicController extends Controller
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
        return view('admin.topic.index', [
            'topics' => Topic::all(),
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
        return view('admin.topic.create',[
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
            "title" => 'required|max:45'
        ],[
            'required'=>'O campo :attribute é obrigatorio',
            'max'=>'O campo :attribute ultrapassou o limite de caracteres',
        ]);

        if($request->hasFile('path_image')){
            $clientOriginalName = $request->file('path_image')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_image')->extension();

            $newNameImage = $nameSlug.'.'.$extension;
        }

        $topic = new Topic();
        $topic->title = $request->title ? $request->title : '';
        $topic->subtitle = $request->subtitle ? $request->subtitle : '';


        if($request->hasFile('path_image')){
            $topic->path_image = $newNameImage;
        }

        if($topic->save()){
            Session::flash('success','Topico cadastrado com sucesso');
        }

        if($request->hasFile('path_image')){
            $request->file('path_image')->storeAs('admin/uploads/fotos', $newNameImage);
        }

        return redirect()->route('admin.topic.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();
        return view('admin.topic.edit', [
            'topic' => $topic,
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        $this->validate($request,[
            "title" => 'required|max:45'
        ],[
            'required'=>'O campo :attribute é obrigatorio',
            'max'=>'O campo :attribute ultrapassou o limite de caracteres',
        ]);

        if($request->hasFile('path_image')){
            $clientOriginalName = $request->file('path_image')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_image')->extension();

            $newNameImage = $nameSlug.'.'.$extension;
        }

        if($request->hasFile('path_image_mobile')){
            $removed = Storage::delete('admin/uploads/fotos/'.$topic->path_image);
        }

        $topic->title = $request->title ? $request->title : '';
        $topic->subtitle = $request->subtitle ? $request->subtitle : '';


        if($request->hasFile('path_image')){
            $topic->path_image = $newNameImage;
        }

        if($topic->save()){
            Session::flash('success','Topico cadastrado com sucesso');
        }

        if($request->hasFile('path_image')){
            $request->file('path_image')->storeAs('admin/uploads/fotos', $newNameImage);
        }

        return redirect()->route('admin.topic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        Storage::delete('admin/uploads/fotos/'.$topic->path_image);

        if($topic->delete()){
            Session::flash('success','Topico deletado com sucesso');
        }else{
            Session::flash('error','Problema ao deletar topico');
        }

        return redirect()->route('admin.topic.index');
    }
}
