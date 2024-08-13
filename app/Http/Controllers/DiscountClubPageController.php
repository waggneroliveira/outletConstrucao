<?php

namespace App\Http\Controllers;

use App\HowWorks;
use App\Advantage;
use App\DiscountClub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DiscountClubPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discountClub = DiscountClub::first();
        $howWorks = HowWorks::all();
        $advantages = Advantage::all();
        if($discountClub->active == 0){
            Session::flash('info','Ops! Nosso clube de desconto está inativo no momento');
            return redirect()->route('site.home.index');
        }

        return view('site.pages.clubeOutlet',[
            'discountClub' => $discountClub,
            'howWorks' => $howWorks,
            'advantages' => $advantages
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
