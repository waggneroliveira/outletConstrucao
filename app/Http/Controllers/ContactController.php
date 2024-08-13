<?php

namespace App\Http\Controllers;

use App\Contact;
use App\NotificationPush;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
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
        return view('admin.contact.index',[
            'contacts' => Contact::all(),
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
        return view('admin.contact.create',[
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

        if($request->hasFile('path_archive')){
            $clientOriginalName = $request->file('path_archive')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_archive')->extension();

            $newNameImage = $nameSlug.'.'.$extension;
        }

        $contact = new Contact();
        $contact->phone = $request->phone ? $request->phone : '';
        $contact->email = $request->email ? $request->email : '';
        $contact->email_form = $request->email_form ? $request->email_form : '';
        $contact->instagram = $request->instagram ? $request->instagram : '';
        $contact->whatsapp = $request->whatsapp ? $request->whatsapp : '';
        $contact->youtube = $request->youtube ? $request->youtube : '';
        $contact->twitter = $request->twitter ? $request->twitter : '';
        $contact->facebook = $request->facebook ? $request->facebook : '';
        $contact->address = $request->address ? $request->address : '';

        if($request->hasFile('path_archive')){
            $contact->path_archive = $newNameImage;
        }

        if($contact->save()){
            Session::flash('success','Contato cadastrado com sucesso');

            if($request->hasFile('path_archive')){
                $request->file('path_archive')->storeAs('admin/uploads/archive', $newNameImage);
            }
        }

        return redirect()->route('admin.contact.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();
        return view('admin.contact.edit',[
            'contact' => $contact,
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {

        if($request->hasFile('path_archive')){
            $clientOriginalName = $request->file('path_archive')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_archive')->extension();

            $newNameImage = $nameSlug.'.'.$extension;
        }

        $contact->phone = $request->phone ? $request->phone : '';
        $contact->email = $request->email ? $request->email : '';
        $contact->email_form = $request->email_form ? $request->email_form : '';
        $contact->instagram = $request->instagram ? $request->instagram : '';
        $contact->whatsapp = $request->whatsapp ? $request->whatsapp : '';
        $contact->youtube = $request->youtube ? $request->youtube : '';
        $contact->twitter = $request->twitter ? $request->twitter : '';
        $contact->facebook = $request->facebook ? $request->facebook : '';
        $contact->address = $request->address ? $request->address : '';

        if($request->hasFile('path_archive')){
            $contact->path_archive = $newNameImage;
        }

        if($contact->save()){
            if($request->hasFile('path_archive')){
                $request->file('path_archive')->storeAs('admin/uploads/archive', $newNameImage);
            }

            Session::flash('success','Contato alterado com sucesso');
        }

        return redirect()->route('admin.contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        if($contact->delete()){
            Session::flash('success','Contato deletado com sucesso');
            return redirect()->route('admin.contact.index');
        }
    }
}
