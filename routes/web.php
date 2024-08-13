<?php
use App\Contact;
use App\Product;
use App\Category;
use App\Favorites;
use App\FooterLink;
use App\Integration;
use App\Subcategory;
use App\DiscountClub;
use Barryvdh\DomPDF\PDF;
use App\NotificationPush;
use App\Mail\CustomerMail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Concerns\FromCollection;

View::composer('admin.layouts.app', function ($view) {
    $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
    $notificationQuantity = NotificationPush::where('status', 0)->count();

    return $view->with('notifications', $notifications)->with('notificationQuantity', $notificationQuantity);
});

View::composer('site.layouts.app', function ($view) {
    // LISTAGEM DOS PRODUTOS PARA MENU TOPO
    $productsMenu = Category::with('subcategory')
        ->whereExists(function($query){
            $query->select(Product::raw('id'))
                ->from('products')
                ->whereRaw('products.category_id = categories.id');
        })->where([
            ['active', '=', 1],
        ])->get();

    $contacts = Contact::first();
    $discountClub = DiscountClub::first();
    $config = Integration::first();
    $footerLinks = FooterLink::where('active', 1)->get();
    $integration = Integration::first();


    // LISTAGEM DAS CATEGORIAS PARA MENU
    $categoriesMenu = Category::whereExists(function($query){
        $query->select(Product::raw('id'))
            ->from('products')
            ->whereRaw('products.category_id = categories.id');
    })->where('featured', 1)->limit('7')->get();
    $favorites = '';
    if(Auth::guard('customer')->check()){
        $favorites = Favorites::where('customer_id', Auth::guard('customer')->user()->id)->get();
    }

    return $view->with('productsMenu', $productsMenu)
        ->with('categoriesMenu', $categoriesMenu)
        ->with('contacts', $contacts)
        ->with('config', $config)
        ->with('footerLinks', $footerLinks)
        ->with('integration', $integration)
        ->with('favorites', $favorites)
        ->with('discountClub', $discountClub);
});

require_once 'auth/user.php';
require_once 'auth/customer.php';
require_once 'painel.php';
require_once 'site.php';

Route::get('/', function () {
    return redirect()->route('site.home.index');
});
Route::get('envio-email',function(){
    $CustomerMail = new CustomerMail();

    return $CustomerMail;

});



