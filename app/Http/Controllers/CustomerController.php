<?php

namespace App\Http\Controllers;

use App\Region;
use App\Address;
use App\Customer;
use App\NotificationPush;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
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

        return view('admin.customer.index', [
            'customers' => Customer::all(),
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
        return view('admin.customer.create',[
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
            "name" => 'required|max:255',
            "cpf" => 'required|max:14',
            "phone" => 'required',
            "email" => 'required',
            "password" => 'required'
        ],[
            'required'=>'O campo :attribute é obrigatorio',
            'max' => 'O campo :attribute´utrapassou o limite de caracteres'
        ]);

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            Session::flash('error','Favor informar um email válido');
            return route('admin.customer.create');
        }
        $rc = ['.', '-'];

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->cpf = str_replace($rc, '', $request->cpf);
        $customer->phone = str_replace($rc, '', $request->phone);
        $customer->email = $request->email;
        $customer->active = $request->active ? $request->active : 0;
        $customer->password = Hash::make($request->password);
        if($customer->save()){
            Session::flash('info','Cliente cadastrado! Agora cadastre o endereço');
            return redirect()->route('admin.customer.edit', ['customer' => $customer->id]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {

        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();
        $adresses = Address::where('customer_id', $customer->id)->get();

        return view('admin.customer.edit', [
            'customer' => $customer,
            'adresses' => $adresses,
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $this->validate($request,[
            "name" => 'required|max:255',
            "cpf" => 'required|max:14',
            "phone" => 'required',
            "email" => 'required',
        ],[
            'required'=>'O campo :attribute é obrigatorio',
            'max' => 'O campo :attribute´utrapassou o limite de caracteres'
        ]);

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            Session::flash('error','Favor informar um email válido');
            return route('admin.customer.create');
        }
        $rc = ['.', '-'];

        $customer->name = $request->name;
        $customer->cpf = str_replace($rc, '', $request->cpf);
        $customer->phone = str_replace($rc, '', $request->phone);
        $customer->email = $request->email;
        $customer->active = $request->active ? $request->active : 0;
        $customer->password = Hash::make($request->password);
        if($customer->save()){
            Session::flash('success','Cliente atualizado');
            return redirect()->route('admin.customer.edit', ['customer' => $customer->id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        if($customer->delete()){
            Session::flash('success', 'Endereço deletado com sucesso');
            return redirect()->route('admin.customer.index');
        }
    }
}
