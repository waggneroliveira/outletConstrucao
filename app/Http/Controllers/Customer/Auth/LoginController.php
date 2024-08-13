<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Contact;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/cliente';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
        $this->redirectTo = url()->previous();
    }

    public function showLoginForm()
    {
        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('products')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();

        return view('site.auth.login',[
            'productsMenu' => $productsMenu,
            'contacts' => Contact::first()
        ]);
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();
        return redirect()->route('customer.login');
    }
    protected function guard()
    {
        return Auth::guard('customer');
    }

}
