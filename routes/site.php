<?php

// #### ROUTES SITE ####

use App\Integration;

Route::resource('/home', 'HomePageController')->names('site.home');

Route::get('/carrinho', 'CartPageController@index')->name('site.cart');
Route::get('/pedido-finalizado','CheckoutController@confirmiedOrder')->name('finishedPayment');
Route::post('/notification','PagSeguroPaymentController@notification')->name('notification');

// ROTAS EMAIL TESTE
Route::get('/NotificationPagseguro/{order}', 'SendEmailController@NotificationPagseguro')->name('site.mail.NotificationPagseguro');
Route::get('/PaymentOrderNotification/{order}', 'SendEmailController@PaymentOrderNotification')->name('site.mail.PaymentOrderNotification');
Route::post('/ContactUs', 'HelpController@sendEmailContact')->name('site.mail.ContactUs');

// LOG ERROR
Route::post('/logError', 'ErrorLogController@LogError')->name('site.logError');

// Rota AJAX
Route::post('/verifyProductOption/{productOptionCategory}', 'ProductOptionCategoryController@verifyQuantity')->name('site.productOption.quantity');
Route::post('/Carrinho/add/{product}', 'CartController@add')->name('cart.add');
Route::get('/Carrinho/remove/{id}', 'CartController@delete')->name('cart.remove');
Route::post('/Carrinho/discount', 'CartController@discount')->name('cart.discount');
Route::post('/Carrinho/delivery','CartController@delivery')->name('cart.delivery');
Route::post('/Carrinho/changeAddress','CartController@changeAddress')->name('cart.changeAddress');
Route::get('/Carrinho/discount/remove', 'CartController@removeDiscount')->name('cart.remove.discount');
Route::get('/Carrinho/limpar', 'CartController@clean')->name('cart.clean');
Route::put('/Carrinho/quantidade/{cart_item}', 'CartController@changeQty')->name('cart.quantity');
Route::put('/Carrinho/frete/', 'CartController@frete')->name('cart.freight');
Route::post('/setInStore', 'CartController@setInStore')->name('cart.setInStore');
Route::post('/refreshAmountProduct/{stock}', 'StockController@refreshAmountProduct')->name('site.stock.refreshAmountProduct');
Route::post('/calcTimeAndPrice', 'CorreioController@calc')->name('site.correio.calc');
Route::post('/verifyProductStock', 'ProductPageController@verifyStock')->name('site.verifyStock');
Route::post('/favorite', 'FavoritesController@store')->name('site.addFavorite');
Route::get('/favorite/{favorites}', 'FavoritesController@destroy')->name('site.removeFavorite');
Route::get('/cliente/help', 'HelpController@index')->name('site.help');
Route::post('/calcFreight', 'MelhorEnvioController@calc')->name('site.melhorenvio.calc');

// COLORS
Route::get('/produtos/color/{productColor}', 'ProductPageController@productColorFilter')->name('site.product.productColors');
Route::get('/produtos/color/{category}/{productColor}', 'ProductPageController@productColorCategoryFilter')->name('site.product.productColorCategory');
Route::get('/produtos/color/{category}/{subcategory}/{productColor}', 'ProductPageController@productColorSubcategoryFilter')->name('site.product.productColorSubcategory');

// BRANDS
Route::get('/produtos/marca/{productBrand}', 'ProductPageController@productBrandFilter')->name('site.product.productBrand');
Route::get('/produtos/marca/{category}/{productBrand}', 'ProductPageController@productBrandCategoryFilter')->name('site.product.productBrandCategory');
Route::get('/produtos/marca/{category}/{subcategory}/{productBrand}', 'ProductPageController@productBrandSubcategoryFilter')->name('site.product.productBrandSubcategory');

// PRODUCT PAGE
Route::get('/produtos', 'ProductPageController@products')->name('site.product');
Route::get('/produtos/{category}', 'ProductPageController@products')->name('site.product.category');
Route::get('/produtos/{subcategory}/subcategoria', 'ProductPageController@products')->name('site.product.subcategory');
Route::get('/produto/{product}', 'ProductPageController@productContent')->name('site.product.productContent');
Route::post('/produtos/search', 'ProductPageController@productSearch')->name('site.product.search');
Route::get('/promocao/produtos', 'ProductPageController@productPromotion')->name('site.product.promotion');
Route::get('/mais-vendido/produtos', 'ProductPageController@productTop')->name('site.product.top');
Route::get('/lancamento/produtos', 'ProductPageController@productRelease')->name('site.product.release');
Route::post('/filtro-preco/produtos', 'ProductPageController@productPriceFilter')->name('site.product.priceFilter');
Route::post('/stockColor/{product}/{productSize}', 'ProductPageController@getColorStock','https')->name('site.stockColor');

Route::get('/teste',function(\Illuminate\Http\Request $request){

    $tokenParts = explode('.', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImMwYWMzN2M0NzM2MDY5MjBjZTc1M2VmZTJhOTQ0MWFkODJiN2VlZWY5MTY1OTkwMjE1ZTA4NjgzM2NkZDcyY2I2NjFjNjNhY2QyOGNlOGViIn0.eyJhdWQiOiIxMzM5IiwianRpIjoiYzBhYzM3YzQ3MzYwNjkyMGNlNzUzZWZlMmE5NDQxYWQ4MmI3ZWVlZjkxNjU5OTAyMTVlMDg2ODMzY2RkNzJjYjY2MWM2M2FjZDI4Y2U4ZWIiLCJpYXQiOjE2MTQyOTU0OTksIm5iZiI6MTYxNDI5NTQ5OSwiZXhwIjoxNjE2ODg3NDk5LCJzdWIiOiJjYTRkNzcxNi02ODAxLTRkOGYtYjYwZC0wNGIyZWEzZmM4ODYiLCJzY29wZXMiOlsiY2FydC1yZWFkIiwiY2FydC13cml0ZSIsImNvbXBhbmllcy1yZWFkIiwiY29tcGFuaWVzLXdyaXRlIiwiY291cG9ucy1yZWFkIiwiY291cG9ucy13cml0ZSIsIm5vdGlmaWNhdGlvbnMtcmVhZCIsIm9yZGVycy1yZWFkIiwicHJvZHVjdHMtcmVhZCIsInByb2R1Y3RzLXdyaXRlIiwicHVyY2hhc2VzLXJlYWQiLCJzaGlwcGluZy1jYWxjdWxhdGUiLCJzaGlwcGluZy1jYW5jZWwiLCJzaGlwcGluZy1jaGVja291dCIsInNoaXBwaW5nLWNvbXBhbmllcyIsInNoaXBwaW5nLWdlbmVyYXRlIiwic2hpcHBpbmctcHJldmlldyIsInNoaXBwaW5nLXByaW50Iiwic2hpcHBpbmctc2hhcmUiLCJzaGlwcGluZy10cmFja2luZyIsImVjb21tZXJjZS1zaGlwcGluZyIsInRyYW5zYWN0aW9ucy1yZWFkIiwidXNlcnMtcmVhZCIsInVzZXJzLXdyaXRlIl19.Mm5BLywn3I3UkZE4_59W7HJLqJ5iIQNBUhIZNsv8U8t3HF65cl01MAYwy86tiTVWSbif0GMSnvLl6W6vjlqTI_UTbXIBP3Tf-23H3x1pO6KIr7nG6wIGWN_ND3kUoIkl249nMRlQqo6FmE2t072KgnUSnHcVprzAYKIT1o1NbQqxgVGMuzVbBxsXHnG01I-Qn8t6KuS769YLk1Jwjjl77JtJDBWB2gnT72wakz9MN9FyxoIIg_emUksbzqrhPCTf90_g6rMwUlN6GwiqM0kbsC6I8mA_gQwcmnyCV-2DLn0qdXriJWIeyk6sIGzjhbqPihuXilpIEcgDxfIU4d1A_iLiT3kQaDdeORYdOIam3pUdF9wJwWHP1VszUdqtBlo3ibFMik3zZn0usGJAK4Xk2YW8_BRnIwLuD9Q7JUAOjDK6JTZ9WN6gEhGly6oo8sUKgzLwLOAlN5QIr2qPLoEbkUiI-ODRskwUbmkEoMjaJtXmYYAhaoHl026JqmHT8tcY37xoYpSBoHlu84a9bxCEE8gt0qB1gAwQg7uw2SNbL-vrloAsWeH7_Y3f2IRy56BX9JbyjHT-nsnsy8Tw-bfkw-ybGi2pZ2Tu6uuhWkblkcyn4W8LCEO4pbaU3lNYb-HIe3AFEVCX8B5DcCwXfqn7h0jGKBAwPpQkWlRcrRpab-U');

    $tokenHeader = json_decode(base64_decode($tokenParts[0]));
    $tokenPayload = json_decode(base64_decode($tokenParts[1]));
    $tokenSignature = $tokenParts[2];

    $tokenExpirationDate = date('Y-m-d', $tokenPayload->exp);

    dd($tokenExpirationDate);

});

Route::get('/pegarToken',function(){

    $code = "def50200074bc29e7f96bb713b67dd75a7471e83ec45842783c4808cab0c75b66907c7159888b4cc48a8e2167996c079fb55e8cc3ab545588a4d7533ce66f62c2471a7d05b983fbdc5b80d74269ecbed2dac99aeb70b0c61e36de76b1769b357ebd98bc0519141161af17576fcf544ab273531cd6bd59de6fbfcc835a122cf0851cb10568943f12122719489f512ffb58a11cd62871d6f902645c0b9359eda92f7eab2d74d13b7f976193d63607924e4415dc9c84748b4052af6ee48e144bbf77d82576a713b33d300f91c207965713ac6129c907c5525f22144540d483bfb2356789b9e1fc843130bf227074d693eab89cf2e13c7e5ea2645207553527e4ccf4f624606da613336782d116ec771c79b74bb59603f2af62e68cfce12d86951b5669849b6ba7a71ed261f9e06ebd3aa1d04d34c8cf0a428427d334340ba6743a66b044b8b2971c3ed90ce3335b6d6618c937691976ca4521db672b5ae1644ea1c982f51b0caaae81a4dabc49906da6ea21eade19339bd9d86ef22b218e95f7be4a74eb110795d857bb541163e0bc1632efdd6a795db2a2d1f728c8c3cb1226d745d349bd0ac9e4168fab8e59f04dd2ddf7e15";

    $integration = Integration::first();

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://sandbox.melhorenvio.com.br/oauth/token",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => array('grant_type' => 'authorization_code'
                                    ,'client_id' => '1339'
                                    ,'client_secret' => 'JInKLxwPmKhGsY4o6cTbFF8Wu8hfoOYKhzw9UXnw'
                                    ,'redirect_uri' => 'http://www.localhost:8000/teste'
                                    ,'code' => $code),
        CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "User-Agent: Daducha (analista@hoom.com.br)"
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;


});


// BLOG PAGE
Route::get('/blogs', 'BlogPageController@index')->name('site.blog.index');
Route::get('/blogs/{category}', 'BlogPageController@blogCategory')->name('site.blog.category');
Route::get('/blog/{blog}', 'BlogPageController@blogContent')->name('site.blog.blogContent');
Route::post('/newsletter','NewsletterController@store')->name('site.newsletter.store');


Route::middleware(['auth:customer','verified'])->group(function () {
    Route::get('/finalizar-pedido', 'CheckoutController@index')->name('site.checkout');
    Route::post('/checkout','CheckoutController@checkout')->name('site.checkout.payment');
    Route::post('/saveSaleOrderPayment','CheckoutController@saveSaleOrderPayment')->name('site.saveSaleOrderPayment');
    Route::post('/cieloPayment', 'CieloPaymentController@payment')->name('site.payment');
    Route::post('/deliveryAddress/{address}', 'CheckoutController@deliveryAddress')->name('site.checkout.address');
    Route::get('/cliente','CustomerPageController@index')->name('customer.home');
    Route::get('/cliente/perfil', 'CustomerPageController@show')->name('customer.profile.show');
    Route::put('/cliente/perfil/{customer}', 'CustomerPageController@update')->name('customer.profile.update');
    Route::put('/cliente/perfil/{customer}/password', 'CustomerPageController@updatePassword')->name('customer.profile.updatePassword');
    Route::resource('/cliente/endereco', 'AddressPageController')->names('site.address')->parameters(['endereco' => 'address']);
    Route::post('/addressDefault/{address}', 'AddressPageController@default')->name('site.address.default');
    Route::get('cliente/favorites', 'FavoritesController@index')->name('site.customer.favorites');
});

// Rota AJAX product

Route::get('/cadastro','Customer\Auth\RegisterController@showRegistrationForm')->name('site.cadastro');
Route::get('/clube-outlet', 'DiscountClubPageController@index')->name('site.clubeOutlet');


