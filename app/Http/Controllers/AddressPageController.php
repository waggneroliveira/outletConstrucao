<?php

namespace App\Http\Controllers;

use App\Address;
use App\Contact;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AddressPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();

        return view('site.pages.address',[
            'addresses' => Address::where('customer_id', Auth::guard('customer')->user()->id)->get(),
            'contacts' => Contact::first(),
            'productsMenu' => $productsMenu,
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
        $this->validate($request,[
            "public_place" => 'required',
            "zip_code" => 'required|max:10',
            "region" => 'required',
            "reference" => 'required'
        ],[
            'required'=>'O campo :attribute é obrigatorio',
            'max' => 'O campo :attribute utrapassou o limite de caracteres'
        ]);

        if($request->default){
            $addressDefault  = Address::where('customer_id', Auth::guard('customer')->user()->id)->where('default',1)->first();
            if($addressDefault){
                $addressDefault->default = 0;
                $addressDefault->save();
            }
        }

        $address = new Address();
        $address->customer_id = $request->customer_id;
        $address->zip_code = $request->zip_code;
        $address->public_place = $request->public_place;
        $address->number = $request->number;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->region = $request->region;
        $address->complement = $request->complement?: '';
        $address->reference = $request->reference;
        $address->default = $request->default?:0;

        if($address->save()){

            if(!isset($request->field)){
                Session::put('cart_options.delivery.id',$address->id);
                Session::put('cart_options.delivery.zip_code',$address->zip_code);
                Session::save();
            }

            Session::flash('success', 'Novo endereço cadastrado com sucesso.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Address $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Address $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();

     return view('site.pages.address',[
         'addresses' => Address::where('customer_id', Auth::guard('customer')->user()->id)->get(),
         'contacts' => Contact::first(),
         'productsMenu' => $productsMenu,
         'addressEdit' => $address
     ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Address $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $this->validate($request,[
            "public_place" => 'required',
            "zip_code" => 'required|max:10',
            "region" => 'required',
            "reference" => 'required'
        ],[
            'required'=>'O campo :attribute é obrigatorio',
            'max' => 'O campo :attribute utrapassou o limite de caracteres'
        ]);

        if($request->default){
            $addressDefault  = Address::where('customer_id', Auth::guard('customer')->user()->id)->where('default',1)->first();
            if($addressDefault){
                $addressDefault->default = 0;
                $addressDefault->save();
            }
        }

        $address->customer_id = $request->customer_id;
        $address->zip_code = $request->zip_code;
        $address->public_place = $request->public_place;
        $address->number = $request->number;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->region = $request->region;
        $address->complement = $request->complement?: '';
        $address->reference = $request->reference;
        $address->default = $request->default?:0;

        if($address->save()){
            Session::flash('success', 'Endereço alterado com sucesso.');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        if($address->delete()){
            Session::flash('success','Endereço deletado com sucesso');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function default(Address $address)
    {
        $customer = auth('customer')->user()->id;
        Address::where('customer_id', $customer)->update(['default' => 0]);

        $address->default = 1;

        if($address->save()){
            Session::flash('success', 'Endereço marcado como padrão');
            return redirect()->back();
        }
    }
}
