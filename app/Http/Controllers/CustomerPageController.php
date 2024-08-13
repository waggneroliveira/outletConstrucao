<?php

namespace App\Http\Controllers;

use App\Favorites;
use id;
use App\tag;
use App\Order;
use App\Topic;
use App\Region;
use App\Address;
use App\Contact;
use App\Product;
use App\Category;
use App\Customer;
use App\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //dd(Session::all());
        $idCustomer = auth('customer')->user()->id;

        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();

        $orders = Order::with('orderItems')->where('orders.customer_id', $idCustomer)->get();

        // dd($orders);

        return view('site.pages.myOrders',[
            'orders' => $orders,
            'contacts' => Contact::first(),
            'productsMenu' => $productsMenu,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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

        return view('site.pages.profile', [
            'customer' => Customer::where('id', Auth('customer')->user()->id)->first(),
            'adresses' => Address::where('customer_id', Auth('customer')->user()->id)->get(),
            'contacts' => Contact::first(),
            'productsMenu' => $productsMenu,
        ]);
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
    public function update(Request $request, Customer $customer)
    {

        $chars = ['-','.','(', ')', ' '];
        $request['phone'] = str_replace($chars,'',$request->phone);

        $this->validate($request,[
            "name" => 'required|max:255',
            "email" => 'required|max:255',
            "phone" => 'required|min:10|max:11'
        ],[
            'required'=>'O campo :attribute é obrigatorio',
            'max' => 'O campo :attribute utrapassou o limite de caracteres',
            'phone.min'=>'Número de telefone inválido',
            'phone.max'=>'Número de telefone inválido',
        ]);

        $customer->name = $request->name;
        $customer->phone = $request->phone;
        if($customer->save()){
            Session::flash('success', 'Seu perfil foi atualizado com sucesso.');
            return redirect()->route('customer.profile.show');
        }
    }

    public function updatePassword(Request $request, Customer $customer)
    {
        $this->validate($request,[
            "password_current" => 'required|min:8',
            "password" => 'required|min:8',
            "password_verified" => 'required|same:password'
        ],[
            'required'=>'Todos os campos são obrigatórios',
            'min' => 'Sua senha deve conter no mínimo 8 caracteres',
            'same' => 'As senha não coincidem'
        ]);

        if (!Hash::check($request->password_current, $customer->password)) {
            Session::flash('error', 'A senha atual está incorreta.');
            return redirect()->route('customer.profile.show');
        }

        $customer->password = Hash::make($request->password);
        if($customer->save()){
            Session::flash('success', 'Sua senha foi alterada com sucesso.');
            return redirect()->route('customer.profile.show');
        }
    }

    /**
     * Show details order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailsOrder(Request $request, Order $order)
    {
        $order = Order::join('adresses', 'adresses.id', '=', 'orders.address_id')
            ->join('regions', 'regions.id', '=', 'adresses.region_id')
            ->join('cities', 'cities.id', '=', 'regions.city_id')
            ->join('payment_methods', 'payment_methods.id', '=', 'orders.payment_id')
            ->select('cities.city',
                'regions.region',
                'adresses.public_place',
                'adresses.public_place',
                'adresses.zip_code',
                'adresses.complement',
                'adresses.reference',
                'adresses.region_id',
                'payment_methods.flag',
                'orders.*')
            ->where('orders.id', $order->id)
            ->first();

        $orderItems = OrderItem::with('productOption')->with('optionItem')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->where('order_items.order_id', $order->id)
            ->select('order_items.*', 'products.title')
            ->get();

        // dd($orderItems);

        return view('site.pages.detailsOrder', [
            'order' => $order,
            'orderItems' => $orderItems
        ]);
    }
}
