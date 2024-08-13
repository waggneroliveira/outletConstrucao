<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.city.index')->with(['cities'=>City::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.city.create');

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
           "city"=>'required'
        ]);

        $city = new City();
        $city->city = $request->city;
        $city->active = $request->active? 1 :0;

        $city->save();

        Session::flash('success','Cidade criada com sucesso');

        return redirect()->route('admin.city.index');

    }

    public function ajaxUpdate(City $city,Request $request)
    {
        $city->active = $request->active ? 1 : 0;
        $city->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('admin.city.edit')->with(['city'=>$city]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $this->validate($request,[
            "city"=>'required'
        ]);

        $city->city = $request->city;
        $city->active = $request->active? 1 :0;

        $city->save();

        Session::flash('success','Cidade atualizado com sucesso');
        return redirect()->route('admin.city.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        Session::flash('success','Bairro deletado com sucesso');
        return redirect()->route('admin.city.index');

    }
}
