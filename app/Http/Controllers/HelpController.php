<?php

namespace App\Http\Controllers;

use App\Address;
use App\Contact;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HelpController extends Controller
{
    public function index(){
        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();

        return view('site.pages.help',[
            'productsMenu' => $productsMenu,
            'addresses' => Address::where('customer_id', Auth::guard('customer')->user()->id)->get(),
            'contacts' => Contact::first(),
        ]);
    }

    public function sendEmailContact(Request $request){
        if(SendEmailController::ContactUs($request) == null){
            return redirect()->route('site.help');
        }
    }
}
