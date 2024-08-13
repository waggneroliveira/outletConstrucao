<?php

namespace App\Http\Controllers;

use App\City;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.region.index',[
            'regions'=>Region::all(),
            'cities'=>City::all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.region.create',[
            'cities'=>City::all()
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
            "region"=>'required',
            "city_id"=>'required',
            "amount"=>'required'
        ]);

        $region = new Region();
        $region->region = $request->region;
        $region->city_id = $request->city_id;
        $region->amount = (float) $request->amount;
        $region->active = $request->active? 1 :0;

        $region->save();

        Session::flash('success','Bairro criada com sucesso');

        return redirect()->route('admin.region.index');
    }

    public function ajaxUpdate(Region $region,Request $request)
    {
        $region->active = $request->active ? 1 : 0;
        $region->save();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        return view('admin.region.edit',[
            'region'=>$region,
            'cities'=>City::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $region)
    {
        $this->validate($request,[
            "region"=>'required',
            "city_id"=>'required',
            "amount"=>'required'
        ]);

        $region->region = $request->region;
        $region->city_id = $request->city_id;
        $region->amount = (float) $request->amount;
        $region->active = $request->active? 1 :0;

        $region->save();

        Session::flash('success','Bairro atualizado com sucesso');
        return redirect()->route('admin.region.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        $region->delete();
        Session::flash('success','Bairro deletado com sucesso');
        return redirect()->route('admin.region.index');
    }
}
