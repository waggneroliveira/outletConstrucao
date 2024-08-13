<?php

namespace App\Http\Controllers;

use App\Integration;
use App\NotificationPush;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IntegrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.integration.edit',[
            'integration' => Integration::first()
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Integration  $integration
     * @return \Illuminate\Http\Response
     */
    public function show(Integration $integration)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Integration  $integration
     * @return \Illuminate\Http\Response
     */
    public function edit(Integration $integration)
    {
        return view('admin.integration.edit',[
            'integration' => $integration
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Integration  $integration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Integration $integration)
    {

        if($request->hasFile('path_image_logo_header')){
            $clientOriginalName = $request->file('path_image_logo_header')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_image_logo_header')->extension();

            $path_image_logo_header = $nameSlug.'.'.$extension;
        }

        if($request->hasFile('path_image_logo_footer')){
            $clientOriginalName = $request->file('path_image_logo_footer')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_image_logo_footer')->extension();

            $path_image_logo_footer = $nameSlug.'.'.$extension;
        }

        $integration->email_pagseguro = $request->email_pagseguro;
        $integration->token_pagseguro = $request->token_pagseguro;
        $integration->min_price_freight_free = $request->min_price_freight_free;
        $integration->max_installment_nointerest = $request->max_installment_nointerest;
        $integration->client_id_me = $request->client_id_me;
        $integration->client_secret_me = $request->client_secret_me;

        $integration->mail_host = $request->mail_host;
        $integration->mail_port = $request->mail_port;
        $integration->mail_username = $request->mail_username;
        $integration->mail_password = $request->mail_password;
        $integration->limit_alert_stock = $request->limit_alert_stock;

        if($request->hasFile('path_image_logo_header')){
            $integration->path_image_logo_header = $path_image_logo_header;
        }
        if($request->hasFile('path_image_logo_footer')){
            $integration->path_image_logo_footer = $path_image_logo_footer;
        }

        if($integration->save()){
            if($request->hasFile('path_image_logo_header')){
                $request->file('path_image_logo_header')->storeAs('admin/uploads/fotos', $path_image_logo_header);
            }
            if($request->hasFile('path_image_logo_footer')){
                $request->file('path_image_logo_footer')->storeAs('admin/uploads/fotos', $path_image_logo_footer);
            }

            Session::flash('success','Informações cadastrada com sucesso');
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Integration  $integration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Integration $integration)
    {
        //
    }
}
