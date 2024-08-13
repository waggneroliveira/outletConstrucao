<?php

Route::middleware('auth:user')->group(function () {

    Route::resource('/painel/produtos', 'ProductController')->names('admin.product')->parameters(['produtos' => 'product']);
    Route::resource('/painel/product-galleries', 'ProductGalleryController')->names('admin.productGallery')->parameters(['product-galleries' => 'product_gallery']);
    Route::resource('/painel/categorias','CategoryController')->names('admin.category')->parameters(['categorias' => 'category']);
    Route::resource('/painel/subcategorias', 'SubcategoryController')->names('admin.subcategory')->parameters(['subcategorias' => 'subcategory']);
    Route::resource('/painel/pedidos', 'OrderController')->names('admin.order')->parameters(['pedidos' => 'order']);
    Route::resource('/painel/banners', 'SlideController')->names('admin.slide')->parameters(['banners' => 'slide']);
    Route::resource('/painel/cupom','CouponController')->names('admin.coupon')->parameters(['cupom' => 'coupon']);
    Route::resource('/painel/user','UserController')->names('admin.user');
    Route::resource('/painel/clientes','CustomerController')->names('admin.customer')->parameters(['clientes' => 'customer']);
    Route::resource('/painel/bairro','regionController')->names('admin.region')->parameters(['bairro' => 'region']);
    Route::resource('/painel/cidade','cityController')->names('admin.city')->parameters(['cidade' => 'city']);
    Route::resource('/painel/address','AddressController')->names('admin.address')->parameters(['address' => 'address']);
    Route::resource('/painel/dashboard','DashboardController')->names('admin.dashboard');
    Route::resource('/painel/topicos','TopicController')->names('admin.topic')->parameters(['topicos' => 'topic']);
    Route::resource('/painel/informacoes-contato','ContactController')->names('admin.contact')->parameters(['informacoes-contato' => 'contact']);
    Route::resource('/painel/etiquetas','TagController')->names('admin.tag')->parameters(['etiquetas' => 'tag']);
    Route::resource('/painel/productTag','ProductTagController')->names('admin.productTag');
    Route::resource('/painel/categoria-opcao-produto','ProductOptionCategoryController')->names('admin.productOptionCategory')->parameters(['categoria-opcao-produto' => 'productOptionCategory']);
    Route::resource('/painel/opcao-produto','ProductOptionController')->names('admin.productOption')->parameters(['opcao-produto' => 'productOption']);
    Route::resource('/painel/tamanhos-produtos','ProductSizeController')->names('admin.productSize')->parameters(['tamanhos-produtos' => 'productSize']);
    Route::resource('/painel/cores-produtos','ProductColorController')->names('admin.productColor')->parameters(['cores-produtos' => 'productColor']);
    Route::resource('/painel/stock','StockController')->names('admin.stock');
    Route::resource('/painel/extra','ExtraController')->names('admin.extra');
    Route::resource('/painel/categoria-blog','CategoryBlogController')->names('admin.categoryBlog')->parameters(['categoria-blog' => 'categoryBlog']);
    Route::resource('/painel/blog','BlogController')->names('admin.blog');
    Route::resource('/painel/postagem','PostController')->names('admin.post')->parameters(['postagem' => 'post']);
    Route::resource('/painel/productModel','ProductModelController')->names('admin.productModel');
    Route::resource('/painel/banner-institucional','BannerInstitutionalController')->names('admin.bannerInstitutional')->parameters(['banner-institucional' => 'bannerInstitutional']);
    Route::resource('/painel/tabela-tamanhos','SizeChartController')->names('admin.sizeChart')->parameters(['tabela-tamanhos' => 'sizeChart']);
    Route::resource('/painel/informacoes-gerais','IntegrationController')->names('admin.integration')->parameters(['informacoes-gerais' => 'integration']);
    Route::resource('/painel/newsletter','NewsletterController')->names('admin.newsletter');
    Route::resource('/painel/relatorio-pedidos','OrderReportController')->names('admin.orderReport');
    Route::resource('/painel/clube-desconto','DiscountClubController')->names('admin.discountClub')->parameters(['clube-desconto' => 'discountClub']);
    Route::resource('/painel/howWorks','HowWorksController')->names('admin.howWorks')->parameters(['howWorks' => 'howWorks']);
    Route::resource('/painel/advantages','AdvantageController')->names('admin.advantages')->parameters(['advantages' => 'advantages']);
    Route::resource('/painel/marcas','BrandController')->names('admin.brand')->parameters(['marcas' => 'brand']);
    Route::resource('/painel/footer-links','FooterLinkController')->names('admin.footerLink')->parameters(['footer-links' => 'footerLink']);


    Route::post('/painel/relatorio-pedidos/search','OrderReportController@search')->name('admin.orderReport.search');

    Route::get('/painel/address/{customer}/do', 'AddressController@create')->name('admin.address.create');

    //ROTAS AJAX
    Route::put('/editcustomer/{customer}', 'CustomerController@editcustomer')->name('admin.customer.editcustomer');
    Route::put('/painel/user/ajax/{user}','User\\UserController@ajaxUpdate')->name('admin.user.ajax');
    Route::put('/painel/cupom/ajax/{coupon}','CouponController@ajaxUpdate')->name('admin.coupon.ajax');
    Route::put('/painel/city/ajax/{city}','cityController@ajaxUpdate')->name('admin.city.ajax');
    Route::put('/painel/region/ajax/{region}','regionController@ajaxUpdate')->name('admin.region.ajax');
    Route::put('/painel/extra/ajax/{extra}','extraController@ajaxUpdate')->name('admin.extra.ajax');
    Route::put('/editproduct/{product}', 'ProductController@editproduct')->name('admin.product.editproduct');
    Route::put('/editSize/{productSize}', 'ProductSizeController@editSize')->name('admin.productSize.editSize');
    Route::put('/editColor/{productColor}', 'ProductColorController@editColor')->name('admin.productColor.editColor');
    Route::put('/editStock/{stock}', 'StockController@editStock')->name('admin.stock.editStock');
    Route::get('/filterSubcategory', 'SubcategoryController@filterSubcategory')->name('admin.filterSubcategory');
    Route::put('/editcategoryOption/{categoryOption}', 'ProductOptionCategoryController@editCategoryOption')->name('admin.productOptionCategory.editCategoryOption');
    Route::put('/editProductOption/{productOption}', 'ProductOptionController@editProductOption')->name('admin.productOption.editProductOption');
    Route::get('/excel', 'DashboardController@excelGenerator')->name('ajaxExcel');

    Route::post('/orderProducts', 'ProductController@orderRecord')->name('admin.orderRecord');
    Route::get('/exportProducts', 'ExportExelController@export')->name('admin.exportProducts');


    Route::get('/painel','User\\UserController@index')->name('painel');

});
