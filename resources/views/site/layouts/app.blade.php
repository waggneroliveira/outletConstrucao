@php
    $bannerInstitutional = App\BannerInstitutional::first();
@endphp
<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KJK2MTL');</script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="facebook-domain-verification" content="2hv083vgfzzgxcum936ycatbn1uz13" />

    @php
        $arrPagina = explode('/', Request::path());
    @endphp
    @if ($arrPagina[0] == 'produto')
        <meta name="facebook-domain-verification" content="8c3xgrizo2k2c6x3mce80a5pcd81ph" />
        @php
            $productShare = App\Product::where('slug', $arrPagina[1])->first();
        @endphp
        <title>Outlet da Construção - {{$productShare->title}}</title>
        <meta property="og:title" content="{{$productShare->title}} - Outlet da Construção">
        <meta property="og:description" content="{{strip_tags(substr($productShare->description,0,130))}}...">
        @foreach ($galleries as $gallery)
            @if ($gallery->product_cover == 1)
                <meta property="og:image" content="{{asset('storage/admin/uploads/fotos/')}}/{{$gallery->path_image}}">
            @endif
        @endforeach
    @else
        <title>Outlet da Construção</title>
        <meta property="og:title" content="Outlet da Construção">
        <meta property="og:description" content="Os produtos ideais para a sua construção e/ou reforma você encontra aqui! Temos tudo o que você precisa, as melhores marcas com a qualidade que você merece.">
        <meta property="og:keywords" content="Outlet da Contrução">
        <meta property="og:image" content="{{asset('site/assets/images/logo.png')}}">
        <meta property="og:image:type" content="image/png">
        <meta property="og:type" content="website">
        <meta property="og:image:width" content="176">
        <meta property="og:image:height" content="74">
    @endif



    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('site/assets/images/favicon.png')}}" />
    <!-- Links externos CSS -->
    <link type="text/css" rel="stylesheet" href="{{url(mix('site/assets/css/padrao/default.css'))}}" />
    <!-- estrutura padrao -->
    <link type="text/css" rel="stylesheet" href="{{url(mix('site/assets/css/plugins/jquery.fancybox.min.css'))}}">
    <!-- padrao fancybox 3 -->
    <link type="text/css" rel="stylesheet" href="{{url(mix('site/assets/css/plugins/owl.carousel.css'))}}">
    <link type="text/css" rel="stylesheet" href="{{url(mix('site/assets/css/plugins/animate.css'))}}">
    <!-- padrao owl.carousel -->
    <link type="text/css" rel="stylesheet" href="{{url(mix('site/assets/css/padrao/linkFontes.css'))}}">
    <!-- padrao linkFontes -->
    <link type="text/css" rel="stylesheet" href="{{url(mix('site/assets/css/main.css'))}}" />

    <!-- padrao linkFontes -->
    <link type="text/css" rel="stylesheet" href="{{url(mix('site/assets/libs/sweetalert2/sweetalert2.min.css'))}}">

    <link rel="stylesheet" type="text/css"  href="{{url(mix('admin/assets/libs/jquery-toast/jquery.toast.min.css'))}}" />
    <!-- tema padrao -->

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700;800&display=swap" rel="stylesheet">

    <!-- Links externos JS -->
    <script type="text/javascript" src="{{url(mix('site/assets/funcoes/biblioteca/jquery-3.3.1.min.js'))}}"></script>

    <!-- Global site tag (gtag.js) - Google Ads: 10812352202 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-10812352202%22%3E"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-10812352202');
    </script>
    
    {{-- @if ($arrPagina[0] == 'produto' || $arrPagina[0] == 'finalizar-pedido')
        <script type="text/javascript" src="{{ PagSeguro::getUrl()['javascript'] }}"></script>
        <script>
            PagSeguroDirectPayment.setSessionId('{{PagSeguro::startSession()}}');
        </script>
    @endif --}}

    <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '246864563589243');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=246864563589243&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->

    <!-- Hotjar Tracking Code for https://Outlet da Construção.com.br -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:2282292,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    <script type="text/javascript" async src="https://d335luupugsy2.cloudfront.net/js/loader-scripts/2b7baf6c-dfc0-42e7-adfa-7c681a98416b-loader.js" ></script>
</head>
<body>

    
<!--INICIO LGPD -->

<div id="mySidenav" class="sidenav">

   <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

   <div class="log">

      <img width="120" src="https://outletconstrucao.com.br/storage/admin/uploads/fotos/rebranding-outletdaconstrucao-1-1-18-1632922794.png" alt="">

   </div>

   <div class="content">

      <h3>Política Privacidade</h3>

      <p>

         A sua privacidade é importante para nós. É política do respeitar a sua privacidade em relação a qualquer informação sua que possamos coletar no site , e outros sites que possuímos e operamos.

         Solicitamos informações pessoais apenas quando realmente precisamos delas para lhe fornecer um serviço. Fazemo-lo por meios justos e legais, com o seu conhecimento e consentimento. Também informamos por que estamos coletando e como será usado.

      </p>

      <br>

      <p>

         Apenas retemos as informações coletadas pelo tempo necessário para fornecer o serviço solicitado. Quando armazenamos dados, protegemos dentro de meios comercialmente aceitáveis ​​para evitar perdas e roubos, bem como acesso, divulgação, cópia, uso ou modificação não autorizados.

      </p>

      <br>

      <p>

         Você é livre para recusar a nossa solicitação de informações pessoais, entendendo que talvez não possamos fornecer alguns dos serviços desejados.

      </p>

      <br>

      <p>

         Não compartilhamos informações de identificação pessoal publicamente ou com terceiros, exceto quando exigido por lei.

      </p>

      <h3>Política de Cookies</h3>

      <p>

         Como é prática comum em quase todos os sites profissionais, este site usa cookies, que são pequenos arquivos baixados no seu computador, para melhorar sua experiência. Esta página descreve quais informações eles coletam, como as usamos e por que às vezes precisamos armazenar esses cookies. Também compartilharemos como você pode impedir que esses cookies sejam armazenados, no entanto, isso pode fazer o downgrade ou 'quebrar' certos elementos da funcionalidade do site.

      </p>

      <div class="permis">

         <h3>Gerenciar preferências de consentimento</h3>

         <label data-toggle="tooltip" data-placement="right" title="Necessário para que o site funcione corretamente" for="necessarily">Necessário

         <input  class="checkbox"   id="necessarily" type="checkbox" data-function="necessarily">

         </label>

         <label data-toggle="tooltip" data-placement="right" title="Necessário para salvar suas preferências de site, por exemplo, lembrar seu nome de usuário, etc." for="useAnalysis"> Preferências do site

         <input class="checkbox"    id="useAnalysis" type="checkbox" data-function="useAnalysis">

         </label>

         <label data-toggle="tooltip" data-placement="right" title="Necessário para coletar visitas ao site, tipos de navegador, etc." for="analytics">Analytics

         <input class="checkbox" id="analytics" type="checkbox" data-function="analytics" >

         </label>

         <label data-toggle="tooltip" data-placement="right" title="Obrigatório para marketing, por exemplo, boletins informativos, mídia social, etc." for="marketing">Marketing

         <input class="checkbox" id="marketing" type="checkbox" data-function="marketing" >

         </label>

      </div>

   </div>

   <div class="plus_button">

      <button class="button_modal_req_cookie">Confirme Minhas Escolhas</button>

   </div>

</div>

<div class="cookies-container">

   <div class="cookie-content">

      <h5>Ao clicar em “Permitir todos”, você concorda com o armazenamento de cookies em seu dispositivo para melhorar a navegação no site, analisar o uso do site e auxiliar nos serviços de marketing. <b><a target="_blank" href="https://policies.google.com/technologies/cookies?hl=pt-BR">Aviso de Cookie</a></b></h5>

      <div class="cookies-pref">

         <Button class="save_cookie_button">Permitir Todos</Button>

         <Button class="personal_cookie_button" onclick="openNav()">Personalizar Configurações</Button>

         <a href="https://hoom.com.br/" target="_blank"><img class="fav" src="https://hoom.com.br/images/favicon.png" alt=""></a>

      </div>

   </div>

</div>

<!--FINAL LGPD -->


<section id="pagina">
		 <!--***********START HEADER********-->
    <header id="topo" class="normal secao" style="background-image: url({{asset('site/assets/images/bg-topo.jpg')}})">
        <div class="wrap">
            <div class="logo" id="logo">
                <a href="{{route('site.home.index')}}" class="link-full"></a>
                <img src="{{asset('storage/admin/uploads/fotos/'.$integration->path_image_logo_header)}}" alt="">
            </div>

            <div class="engloba-super-menu trans-slow">
                <form id="seach" action="{{route('site.product.search')}}" method="POST" class="col-inline">
                    @csrf
                    <input type="text" name="search" placeholder="Procurar um produto" value="{{ isset($search) ? $search : '' }}">
                </form>

                {{-- <div class="desconto col-inline">
                    @if ($discountClub->active == 1)
                        <a href="{{route('site.clubeOutlet')}}" class="link-full"></a>

                        <div class="image col-inline">
                            <img src="{{asset('site/assets/images/desconto.png')}}" alt="">
                        </div>

                        <div class="descricao col-inline">
                            <h6 class="titulo">Clube <span>Outlet</span></h6>
                        </div>
                    @endif
                </div>

                <div class="options col-inline">
                    <div class="whilist col-inline">
                        @if (Auth::guard('customer')->check())
                            <i class="cart_count">{{$favorites->count()}}</i>
                        @endif
                        <a href="{{route('site.customer.favorites')}}" class="icon-text">&#xe819;</a>
                    </div>
                </div>
                <a id="cart" href=" {{route('site.cart')}} " class="col-inline">
                    <i class="cart_count">{{Cart::content()->count()}}</i>
                    <img src="{{asset('site/assets/images/cart.png')}}" >
                </a>
                <div class="engloba-menu col-inline">
                    <nav>
                        <ul>
                            @if(Auth::guard('customer')->check())
                                <li class="col-inline">
                                    <a href="{{route('customer.home')}}">Olá! {{explode(' ', auth('customer')->user()->name)[0]}} </a>
                                    <form action="{{route('customer.logout')}}" method="post">
                                        @csrf
                                        <input type="submit" value="Sair">
                                    </form>
                                </li>
                            @else
                                <li class="col-inline">
                                    <a href="{{route('customer.login')}}"><img src="{{asset('site/assets/images/user-login.png')}}" > Login <span>Cadastrar</span></a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div> --}}
            </div>
        </div>

        <div class="tracos">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div class="eng-mega-menu">
            <div class="wrap">
                <!--***********START MEGA MENU********-->
                <div id="mega-menu" class="col-inline col-3">
                    <div class="content">
                        <a href="javascript::" class="link-full"></a>
                        <h5 class="titulo"> <i class="icon-text">&#xe8d4;</i> Nossos Produtos <i class="icon-text">&#xe93e;</i></h5>
                    </div>
                    <div class="submenu dropdown">
                        <div class="content back">
                            {{-- <a href="javascript::" class="image col-inline"  style="background-image: url({{asset('storage/admin/uploads/fotos')}}/{{isset($bannerInstitutional->path_image_menu) ? $bannerInstitutional->path_image_menu : ''}});"></a> --}}
                            <div class="categoria col-inline">
                                <nav>
                                    @foreach ($productsMenu as $category)
                                        <ul class="col-inline col-2">
                                            <p><a href="{{route('site.product.category', ['category' => $category->slug])}}">{{$category->title}}</a></p>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($category->subcategory as $subcategory)
                                                @if ($i <= 5)
                                                    <li><a href="{{route('site.product.subcategory', ['subcategory' => $subcategory->slug])}}">{{$subcategory->title}}</a></li>
                                                @endif
                                                @php
                                                    $i++;
                                                @endphp
                                            @endforeach
                                        </ul>
                                    @endforeach
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!--***********END MEGA MENU********-->

                <div class="categorias col-inline col-9 dir">
                    <nav>
                        <ul>
                            @foreach ($categoriesMenu as $categoryMenu)
                                <li class="col-inline">
                                    <a href="{{route('site.product.category', ['category' => $categoryMenu->slug])}}">{{$categoryMenu->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
<!--***********END HEADER********-->
<div class="menu-mobile">

	<ul>

		<li class="col-x3 col-inline">

		<a href="#" class="icon-text btn_sidebar" data-sidebar="#menu_sidebar">&#xe8d4;</a>

		</li>

		{{-- <li class="col-x5 col-inline icon-text">

			<a href="{{route('site.customer.favorites')}}" title="Favoritos" class="icon-text">&#xe819;</a>

		</li> --}}

		<li class="col-x3 col-inline icon-text home">

			<a href="{{route('site.home.index')}}" title="Home">&#xe8e4;</a>

		</li>
        {{-- <li class="col-x5 col-inline icon-text">
			<a id="cart" href=" {{route('site.cart')}} ">
                <i class="cart_count">{{Cart::content()->count()}}</i>
                <img src="{{asset('site/assets/images/cart.png')}}" alt="">
            </a>
		</li> --}}
		<li class="col-x3 col-inline icon-text">

			<a href="https://api.whatsapp.com/send?phone=55{{$contacts->whatsapp}}&text=Ol%C3%A1%2C%20" target="_blank" title="">&#xf232;</a>

		</li>



	</ul>

</div>
<div id="menu_sidebar" class="sidebar">
    <div class="closeSidebar">X</div>
	<div class="inside">
		<div class="cont-navegacao-sidebar">
			<div class="container">
			<div class="central">
				<nav id="menu-flutuante" class="trans-fast">
                    <div class="logo" id="logo">
                        <a href="{{route('site.home.index')}}">
                            <img src="{{asset('storage/admin/uploads/fotos/'.$integration->path_image_logo_header)}}" alt="">
                        </a>
                    </div>
                    <form id="seach" action="{{route('site.product.search')}}" method="POST" class="col-inline">
                        @csrf
                        <input type="text" name="search">
                        <button type="submit" class="icon-text">&#xe816;</button>
                    </form>
					<ul>
                        @foreach ($productsMenu as $category)
                            <li><a href="{{route('site.product.category', ['category' => $category->slug])}}">{{$category->title}}</a></li>
                        @endforeach
                        <li><a style="color: #F58533;font-weight: 900;font-family: 'Nunito-Bold';" href="{{asset('storage/admin/uploads/archive')}}/{{ $contacts->path_archive}}" target="_blank">Política de Troca</a></li>
                        <li>
                            <div class="engloba-user-sidebar">
                                <div class="btn-cadastre">
                                    <a href="{{route('customer.login')}}">Cadastre-se</a>
                                </div>
                                @if(Auth::guard('customer')->check())
                                    <div class="btn-logar">
                                        <a href="{{route('customer.home')}}">Olá! {{explode(' ', auth('customer')->user()->name)[0]}} </a>
                                        <form action="{{route('customer.logout')}}" method="post">
                                            @csrf
                                            <input type="submit" value="Sair">
                                        </form>
                                    </div>
                                @else
                                    <div class="btn-logar">
                                        <a href="{{route('customer.login')}}">Logar</a>
                                    </div>
                                @endif
                            </div>
                        </li>
					</ul>

				</nav>
                <div id="rede-social">
                    @if (!empty($contacts->whatsapp))
                        <a style="color: #f58220;" href="https://api.whatsapp.com/send?phone=55{{ $contacts->whatsapp }}" target="_blank" class="col-inline icon-text trans-slow">&#xf232;</a>
                    @endif
                    @if (!empty($contacts->facebook))
                        <a style="color:#f58220;" href="https://www.facebook.com/{{$contacts->facebook}}" target="_blank" class="col-inline icon-text trans-slow">&#xf308;</a>
                    @endif
                    @if (!empty($contacts->instagram))
                        <a style="color:#f58220;" href="https://www.instagram.com/{{$contacts->instagram}}" target="_blank" class=" col-inline icon-text trans-slow">&#xf16d;</a>
                    @endif
                    @if (!empty($contacts->youtube))
                        <a style="color:#f58220;" href="https://www.youtube.com/{{$contacts->youtube}}" target="_blank" class=" col-inline icon-text trans-slow">&#xf16a;</a>
                    @endif
                    @if (!empty($contacts->twitter))
                        <a style="color:#f58220;" href="https://www.youtube.com/{{$contacts->twitter}}" target="_blank" class=" col-inline icon-text trans-slow">&#xeae2;</a>
                    @endif
                </div>
			</div>

		</div>

		</div>



	</div>

</div>
<div class="engloba-flutuante">
    @if (!empty($contacts->whatsapp))
    <div class="btn-whatsapp btn-rede">
        <a href="https://api.whatsapp.com/send?phone=55{{$contacts->whatsapp}}&text=Ol%C3%A1%2C%20" target="_blank">
            <div class="image">
                <div class="container">
                    <div class="central">
                        <img src="{{asset('site/assets/images/whatsapp.png')}}" alt="">
                    </div>
                </div>
            </div>
            <span>Falar pelo Whatsapp</span>
        </a>
    </div>
    @endif

</div>
<div class="engloba-flutuante direita">
    @if (!empty($contacts->whatsapp))
    <div class="btn-whatsapp btn-rede">
        <a href="https://api.whatsapp.com/send?phone=55{{$contacts->whatsapp}}&text=Ol%C3%A1%2C%20" target="_blank">
            <div class="image">
                <div class="container">
                    <div class="central">
                        <img src="{{asset('site/assets/images/whatsapp.png')}}" alt="">
                    </div>
                </div>
            </div>
            <span>Falar pelo Whatsapp</span>
        </a>
    </div>
    @endif

</div>
@yield('content')



    <section id="rede_social" class="secao">
        <div class="wrap">
            <div class="globa-rede">
                @if (!empty($contacts->whatsapp))
                    <div class="box-rede-social col-inline col-x3">
                        <div class="content">
                            <a href="https://api.whatsapp.com/send?phone=55{{ $contacts->whatsapp }}" target="_blank" class="link-full"></a>
                            <div class="image">
                                <img src="{{asset('site/assets/images/wpp1.png')}}" alt="">
                            </div>
                            <div class="descricao">
                                <h3 class="titulo">Compre pelo Whatsapp</h3>
                                <a href="javascript:void(0)">{{$contacts->whatsapp}}</a>
                            </div>
                        </div>
                    </div>
                @endif

                @if (!empty($contacts->facebook))
                    <div class="box-rede-social col-inline col-x3">
                        <div class="content">
                            <a href="https://www.facebook.com/{{$contacts->facebook}}" target="_blank" class="link-full"></a>
                            <div class="image">
                                <img src="{{asset('site/assets/images/face1.png')}}" alt="Facebook">
                            </div>
                            <div class="descricao">
                                <h3 class="titulo">Curtiu nosso site ?</h3>
                                <a href="javascript:void(0)">fb.com/{{$contacts->facebook}}</a>
                            </div>
                        </div>
                    </div>
                @endif

                @if (!empty($contacts->instagram))
                    <div class="box-rede-social col-inline col-x3">
                        <div class="content">
                            <a href="https://www.instagram.com/{{$contacts->instagram}}" target="_blank" class="link-full"></a>
                            <div class="image">
                                <img src="{{asset('site/assets/images/insta1.png')}}" alt="Instagram">
                            </div>
                            <div class="descricao">
                                <h3 class="titulo">Siga a gente no Insta!</h3>
                                <a href="javascript:void(0)">{{'@'.$contacts->instagram}}</a>
                            </div>
                        </div>
                    </div>
                @endif

                @if (!empty($contacts->youtube))
                    <div class="box-rede-social col-inline col-x3">
                        <div class="content">
                            <a href="https://www.youtube.com/{{$contacts->youtube}}" target="_blank" class="link-full"></a>
                            <div class="image">
                                <img src="{{asset('site/assets/images/youtube.png')}}" alt="Youtube">
                            </div>
                            <div class="descricao">
                                <h3 class="titulo">Inscreva em nosso canal!</h3>
                                <a href="javascript:void(0)">{{$contacts->youtube}}</a>
                            </div>
                        </div>
                    </div>
                @endif

                @if (!empty($contacts->twitter))
                    <div class="box-rede-social col-inline col-x3">
                        <div class="content">
                            <a href="https://twitter.com/{{$contacts->twitter}}" target="_blank" class="link-full"></a>
                            <div class="image">
                                <img src="{{asset('site/assets/images/twitter.png')}}" alt="Twitter">
                            </div>
                            <div class="descricao">
                                <h3 class="titulo">Siga a gente no Twitter!</h3>
                                <a href="javascript:void(0)">{{$contacts->twitter}}</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <img src="{{asset('site/assets/images/firula-social.png')}}" alt="firula" class="firula">

    </section>
    @if ($discountClub->active == 1)
        <section id="newsllatter" class="secao" style="background-image: url({{asset('site/assets/images/new.png')}});">
            <img src="{{asset('site/assets/images/form-home.png')}}" alt="imagem formulário">

            <div class="wrap">
                <div class="engloba-nwes">
                    <h4 class="titulo">{{$discountClub->title}}</h4>
                    <p>{{$discountClub->description}}</p>

                    <form action="{{route('site.newsletter.store')}}" method="post">
                        @csrf
                        <label for="nome" class="col-inline col-x2">
                            <input type="text" name="name" id="nome" placeholder="Digite seu nome">
                        </label>
                        <label for="profissao" class="col-inline col-x2">
                            <input type="text" name="profession" id="profissao" placeholder="Profissão">
                        </label>
                        <label for="email" class="col-inline col-x2">
                            <input type="text" name="email" id="email" placeholder="Email">
                        </label>
                        <label for="telefone" class="col-inline col-x2">
                            <input type="text" name="phone" id="telefone" placeholder="Telefone (Whatsapp)" onkeyup="mascara( this, mtel );" maxlength="15">
                        </label>
                        <button type="submit" name="enviar" id="enviar" class="trans-slow col-inline">Participar</button>
                    </form>
                </div>
            </div>
        </section>
    @endif
    <!--  fim section id="rede_social" class="secao"> -->
            <!-- start footer-->
    <section id="footer" class="secao">
        <div class="wrap">
            <div class="engloba-footer">
                <ul class="logo col-inline">
                    <li>
                        <a href="{{route('site.home.index')}}">
                            <img src="{{asset('storage/admin/uploads/fotos/'.$integration->path_image_logo_footer)}}" alt="">
                        </a>
                    </li>
                </ul>

                <ul class="menu-footer col-inline">
                    @foreach ($productsMenu as $category)
                        <li><a href="{{route('site.product.category', ['category' => $category->slug])}}">{{$category->title}}</a></li>
                    @endforeach
                    <li><a href="{{route('site.product.promotion')}}">Promoções</a></li>

                </ul>

                <ul class="menu-footer col-inline">
                    <li class=><a href="{{route('site.home.index')}}">Home</a></li>
                    {{-- <li><a href="{{route('site.blog.index')}}">Blog</a></li> --}}
                    {{-- <li><a href="">Atendimento</a></li> --}}
                    <li><a href="{{route('site.product')}}">Produtos</a></li>
                    @foreach ($footerLinks as $footerLink)
                        @if ($footerLink->text=='')
                            <li><a href="{{asset('storage/admin/uploads/archive')}}/{{ $footerLink->path_archive}}" target="_blank">{{$footerLink->title_link}}</a></li>
                        @else
                            <li><a href="#ligthboxFooterLink{{$footerLink->id}}" data-fancybox="{{$footerLink->title_link}}">{{$footerLink->title_link}}</a></li>
                            <section id="ligthboxFooterLink{{$footerLink->id}}" class="ligthboxFooterLink" style="display: none;">
                                <div class="wrap">
                                    <h3 class="title">{{$footerLink->title_modal}}</h3>
                                    @if ($footerLink->path_archive <> '')
                                        <a href="{{asset('storage/admin/uploads/archive')}}/{{ $footerLink->path_archive}}" target="_blank">
                                            <span class="esq"><svg width="25px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 64 80" style="enable-background:new 0 0 64 64;" xml:space="preserve"><g><path d="M39.95,37.54c-5.06,0-9.18,4.12-9.18,9.18c0,5.06,4.12,9.17,9.18,9.17c5.06,0,9.18-4.11,9.18-9.17   C49.13,41.65,45.02,37.54,39.95,37.54z M43.65,47.98l-3.16,3.41c-0.08,0.08-0.15,0.13-0.26,0.17c-0.09,0.04-0.18,0.06-0.27,0.06   c-0.09,0-0.17-0.02-0.25-0.05c-0.01-0.01-0.02,0-0.04-0.01c-0.08-0.03-0.16-0.08-0.23-0.16l-3.17-3.41   c-0.13-0.15-0.2-0.33-0.2-0.53c0.01-0.19,0.09-0.36,0.23-0.49c0.13-0.12,0.3-0.19,0.48-0.19c0.2,0,0.38,0.08,0.52,0.23l1.93,2.07   v-6.56c0-0.39,0.32-0.72,0.72-0.72c0.39,0,0.72,0.32,0.72,0.72v6.56l1.93-2.07c0.14-0.15,0.32-0.23,0.52-0.23   c0.18,0,0.35,0.07,0.49,0.2c0.14,0.12,0.22,0.3,0.23,0.48C43.85,47.65,43.78,47.84,43.65,47.98z"/><path d="M54.48,26.98c-0.62,0-1.24,0.06-1.84,0.19c-0.05,0.01-0.09,0.01-0.14,0.01c-0.21,0-0.41-0.09-0.54-0.25   c-0.17-0.18-0.22-0.45-0.14-0.7c0.45-1.36,0.68-2.81,0.68-4.29c0-7.63-6.21-13.83-13.83-13.83c-6.25,0-11.74,4.2-13.35,10.23   c-0.08,0.3-0.39,0.52-0.72,0.52c-0.09,0-0.18-0.02-0.26-0.05c-1.12-0.46-2.3-0.7-3.52-0.7c-4.69,0-8.68,3.65-9.08,8.31   c-0.02,0.21-0.12,0.39-0.28,0.51c-0.12,0.1-0.26,0.15-0.5,0.15c-0.01,0-0.03,0-0.05,0c-0.52-0.07-0.98-0.1-1.41-0.1   C4.27,26.98,0,31.25,0,36.49C0,41.74,4.27,46,9.51,46h19.86l0.03-0.28c0.5-5.39,5.14-9.62,10.56-9.62c5.43,0,10.07,4.22,10.56,9.62   L50.54,46h3.94c5.25,0,9.52-4.26,9.52-9.51C64,31.25,59.73,26.98,54.48,26.98z"/></g></svg></span>
                                            Baixar PDF
                                        </a>
                                    @endif
                                    <div class="longText">{!! $footerLink->text !!}</div>
                                </div>
                            </section>
                        @endif
                    @endforeach
                    {{-- <li><a href="{{asset('storage/admin/uploads/archive')}}/{{ $contacts->path_archive}}" target="_blank">Política</a></li> --}}

                </ul>
                <ul class="contato col-inline">
                    <li>
                        <i class="tell"><a href="tel:+55{{ !empty($contacts->phone) ? $contacts->phone : ''}}">{{ !empty($contacts->phone) ? $contacts->phone : ''}}</a></i>
                        <!-- <p><a style="color: #FFF;text-decoration: underline;" href="mailto:{{ !empty($contacts->email) ? $contacts->email: ''}}">{{ !empty($contacts->email) ? $contacts->email: ''}}</a></p> -->
                        <div class="addressFooter">
                            {!! !empty($contacts->address) ? $contacts->address: ''!!}
                        </div>
                    </li>
                </ul>
                <ul class="rede-social col-inline">
                    <img src="{{asset('site/assets/images/form.png')}}" alt="">
                </ul>
            </div>
        </div>
    </section>
</section><!-- fim #pagina -->
<!-- end footer-->
<!-- start direitos altorais -->
<section id="credito" class="secao">
    <div class="wrap">
        <p class="esq">© 2021 - Loja Outlet da Construção. All Rights Reserved.</p>
        <a href="https://hoom.com.br/" target="_blank"><img src="{{asset('site/assets/images/hoom.png')}}" class="hoom dir" alt="Hoom Interativa"></a>
    </div>
</section>
<!-- end direitos altorais -->

@if(Session::has('success'))
    <script>
        $(document).ready(function(){
            $.NotificationApp.send("Sucesso!", "{{Session::get('success')}}", "top-center", "#5ba035", "success")
        });
    </script>
@endif
@if(Session::has('error'))

    <script>
        $(document).ready(function() {
            $.NotificationApp.send("Erro!", "{{Session::get('error')}}", "top-center", "#bf441d", "error");
        });
    </script>

@endif
@if(Session::has('info'))

    <script>
        $(document).ready(function(){
            $.NotificationApp.send("Atenção!", "{{Session::get('info')}}", "top-center", "#3b98b5", "info");
        });
    </script>

@endif

@if(count($errors)>0)
    <ul class="list-group">
        @foreach($errors->all() as $error)

            <script>
                $(document).ready(function(){
                    $.NotificationApp.send("Erro!", "{{$error}}", "top-center", "#bf441d", "error");
                    {{--demo.showNotification('top','center','{{$error}}','warning');--}}
                });
            </script>

        @endforeach
    </ul>
@endif

<!-- Links externos JS -->
<script type="text/javascript" src="{{url(mix('site/assets/funcoes/plugins/jquery.fancybox.min.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('site/assets/funcoes/plugins/jquery.zoom.min.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('site/assets/funcoes/plugins/owl.carousel.min.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('admin/assets/js/jquery.mask.min.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('admin/assets/libs/jquery-toast/jquery.toast.min.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('admin/assets/js/pages/toastr.init.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('site/assets/libs/sweetalert2/sweetalert2.min.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('site/assets/js/pages/sweet-alerts.init.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('site/assets/funcoes/plugins/instagramLite.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('site/assets/funcoes/plugins/jquery.menusidebar.js'))}}"></script>
{{-- <script type="text/javascript" src="{{url(mix('site/assets/funcoes/plugins/jquery.banner.js'))}}"></script> --}}
<script type="text/javascript" src="{{url(mix('site/assets/funcoes/pagseguro_error.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('site/assets/funcoes/default.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('site/assets/funcoes/paymentPagseguro.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('site/assets/funcoes/validates.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('site/assets/funcoes/main.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('site/assets/funcoes/theme.js'))}}"></script>

</body>
</html>
