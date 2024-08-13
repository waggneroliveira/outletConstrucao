<?php

namespace App\Http\Controllers;

use App\Region;
use App\Address;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AddressController extends Controller
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
    public function create(Request $request, Customer $customer)
    {
        return view('admin.address.create', [
            'customer' => $customer,
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
            "customer_id" => 'required|max:1',
            "public_place" => 'required|max:255',
            "zip_code" => 'required',
            "reference" => 'required',
            "number" => 'required',
            "region" => 'required',
            "city" => 'required',
            "state" => 'required',
        ],[
            'required'=>'O campo :attribute é obrigatorio',
        ]);

        $address = new Address();
        $address->customer_id = $request->customer_id;
        $address->public_place = $request->public_place;
        $address->zip_code = $request->zip_code;
        $address->reference = $request->reference;
        $address->number = $request->number;
        $address->complement = $request->complement ? $request->complement : '';
        $address->region = $request->region;
        $address->city = $request->city;
        $address->state = $request->state;

        if($address->save()){
            Session::flash('success', 'Endereço cadastrado com sucesso');
            return redirect()->route('admin.customer.edit', ['customer' => $request->customer_id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        $customer = Customer::where('id', $address->customer_id)->first();
        return view('admin.address.edit', [
            'address' => $address,
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $this->validate($request,[
            "customer_id" => 'required|max:1',
            "public_place" => 'required|max:255',
            "zip_code" => 'required',
            "reference" => 'required',
            "number" => 'required',
            "region" => 'required',
            "city" => 'required',
            "state" => 'required',
        ],[
            'required'=>'O campo :attribute é obrigatorio',
        ]);

        $address->customer_id = $request->customer_id;
        $address->public_place = $request->public_place;
        $address->zip_code = $request->zip_code;
        $address->reference = $request->reference;
        $address->number = $request->number;
        $address->complement = $request->complement ? $request->complement : '';
        $address->region = $request->region;
        $address->city = $request->city;
        $address->state = $request->state;

        if($address->save()){
            Session::flash('success', 'Endereço alterado com sucesso');
            return redirect()->route('admin.customer.edit', ['customer' => $request->customer_id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        if($address->delete()){
            Session::flash('success', 'Endereço deletado com sucesso');
            return redirect()->route('admin.customer.edit', ['customer' => $address->customer_id]);
        }
    }
}
