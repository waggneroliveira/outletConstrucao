
<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
        $arrPagina = explode('/', Request::path());
    @endphp
    @if ($arrPagina[0] == 'produto')
        <title>Outlet da Construção - {{$product->title}}</title>
    @else
        <title>Outlet da Construção</title>
    @endif



    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('site/assets/images/favicon.png')}}" />
    <!-- Links externos CSS -->
    <link type="text/css" rel="stylesheet" href="{{url(mix('site/assets/css/padrao/default.css'))}}" />
    <!-- estrutura padrao -->
    <link type="text/css" rel="stylesheet" href="{{url(mix('site/assets/css/plugins/jquery.fancybox.min.css'))}}">
    <!-- padrao fancybox 3 -->
    <link type="text/css" rel="stylesheet" href="{{url(mix('site/assets/css/plugins/owl.carousel.css'))}}">
    <!-- padrao owl.carousel -->
    <link type="text/css" rel="stylesheet" href="{{url(mix('site/assets/css/padrao/linkFontes.css'))}}">
    <!-- padrao linkFontes -->
    <link type="text/css" rel="stylesheet" href="{{url(mix('site/assets/css/main.css'))}}" />

    <!-- padrao linkFontes -->
    <link type="text/css" rel="stylesheet" href="{{url(mix('site/assets/libs/sweetalert2/sweetalert2.min.css'))}}">

    <link rel="stylesheet" type="text/css"  href="{{url(mix('admin/assets/libs/jquery-toast/jquery.toast.min.css'))}}" />
    <!-- tema padrao -->
    <!-- Links externos JS -->
    <script type="text/javascript" src="{{url(mix('site/assets/funcoes/biblioteca/jquery-3.3.1.min.js'))}}"></script>

    <script type="text/javascript" src="{{ PagSeguro::getUrl()['javascript'] }}"></script>

    <script>
        PagSeguroDirectPayment.setSessionId('{{PagSeguro::startSession()}}');
    </script>
    <script type="text/javascript" async src="https://d335luupugsy2.cloudfront.net/js/loader-scripts/2b7baf6c-dfc0-42e7-adfa-7c681a98416b-loader.js" ></script>
</head>
<body>
<section id="pagina">

@yield('content')

    <section id="rede_social" class="secao">
        <div class="wrap">
            <div class="globa-rede">
                @if (!empty($contacts->whatsapp))
                    <div class="box-rede-social col-inline col-x3">
                        <div class="content">
                            <a href="https://api.whatsapp.com/send?phone=55{{ $contacts->whatsapp }}" target="_blank" class="link-full"></a>
                            <div class="image">
                                <img src="{{asset('site/assets/images/wpp.png')}}" alt="">
                            </div>
                            <div class="descricao">
                                <h3 class="titulo">Duvidas ou Informações</h3>
                                <a href="javascript:void(0)">Atendimento das 08h as 18h</a>
                            </div>
                        </div>
                    </div>
                @endif

                @if (!empty($contacts->facebook))
                    <div class="box-rede-social col-inline col-x3">
                        <div class="content">
                            <a href="https://www.facebook.com/{{$contacts->facebook}}" target="_blank" class="link-full"></a>
                            <div class="image">
                                <img src="{{asset('site/assets/images/face.png')}}" alt="Facebook">
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
                                <img src="{{asset('site/assets/images/insta.png')}}" alt="Instagram">
                            </div>
                            <div class="descricao">
                                <h3 class="titulo">Siga a gente no Insta!</h3>
                                <a href="javascript:void(0)">#{{$contacts->instagram}}</a>
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
    </section>
    <section id="newsllatter" class="secao" style="background-image: url({{asset('site/assets/images/new.png')}});">
        <div class="wrap">
            <div class="engloba-nwes dir">
                <h4 class="titulo">Newsletter</h4>
                <form action="" method="post">
                    <label for="nome" class="row">
                        <input type="text" name="nome" id="nome" placeholder="Nome">
                    </label>
                    <label for="email" class="row">
                        <input type="text" name="email" id="email" placeholder="Email">
                    </label>
                    <input type="submit" name="enviar" id="enviar" value="enviar" class="trans-slow">
                </form>
            </div>
        </div>
    </section>
    <!--  fim section id="rede_social" class="secao"> -->
            <!-- start footer-->
    <section id="footer" class="secao">
        <div class="wrap">
            <div class="engloba-footer">
                <ul class="logo col-inline">
                    <li>
                        <a href="home">
                            <img src="{{asset('site/assets/images/loog-footer.png')}}" alt="">
                        </a>
                    </li>
                </ul>
                <ul class="menu-footer col-inline">
                    <li class="col-inline"><a href="home.blade.php">Home</a></li>
                    <li class="col-inline"><a href="sobre.blade.php">Quem Somos</a></li>
                    <li class="col-inline"><a href="Artigos">Artigos</a></li>
                    <li class="col-inline"><a href="produtos">Produtos</a></li>
                    <li class="col-inline"><a href="Contato">Contato</a></li>

                </ul>
                <ul class="contato col-inline">
                    <li>
                        <i class="tell">{{ !empty($contacts->phone) ? $contacts->phone : ''}}</i>
                        <p>{{ !empty($contacts->email) ? $contacts->email: ''}}</p>
                    </li>
                </ul>
                <ul class="rede-social col-inline">
                    @if (!empty($contacts->whatsapp))
                        <li class="col-  inline">
                            <a href="https://api.whatsapp.com/send?phone=55{{$contacts->whatsapp}}" target="_blank" title="WhatsApp" alt="WhatsApp" class="icon-text">&#xf232;</a>
                        </li>
                    @endif
                    @if (!empty($contacts->facebook ))
                        <li class="col-  inline">
                            <a href="https://www.facebook.com/{{$contacts->facebook}}" target="_blank" title="Facebook" alt="Facebook" class="icon-text">&#xebd2;</a>
                        </li>
                    @endif
                    @if (!empty($contacts->instagram))
                        <li class="col-  inline">
                            <a href="https://www.instagram.com/{{$contacts->instagram}}" target="_blank" title="Instagram" alt="Instagram" class="icon-text">&#xf16d;</a>
                        </li>
                    @endif
                    @if (!empty($contacts->youtube))
                        <li class="col-  inline">
                            <a href="https://www.youtube.com/{{$contacts->youtube}}" target="_blank" title="Youtube" alt="Youtube" class="icon-text">&#xf16a;</a>
                        </li>
                    @endif
                    @if (!empty($contacts->twitter))
                        <li class="col-  inline">
                            <a href="https://twitter.com/{{$contacts->twitter}}" target="_blank" title="Youtube" alt="Youtube" class="icon-text">&#xeae2;</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </section>
</section><!-- fim #pagina -->
<!-- end footer-->
<!-- start direitos altorais -->
<section id="credito" class="secao">
    <div class="wrap">
        <p class="esq">2020 © Todos os direitos reservados.</p>
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
            $.NotificationApp.send("Heads up!", "{{Session::get('info')}}", "top-center", "#3b98b5", "info");
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
<script type="text/javascript" src="{{url(mix('site/assets/funcoes/plugins/owl.carousel.min.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('admin/assets/js/jquery.mask.min.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('admin/assets/libs/jquery-toast/jquery.toast.min.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('admin/assets/js/pages/toastr.init.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('site/assets/libs/sweetalert2/sweetalert2.min.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('site/assets/js/pages/sweet-alerts.init.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('site/assets/funcoes/plugins/instagramLite.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('site/assets/funcoes/plugins/jquery.menusidebar.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('site/assets/funcoes/plugins/jquery.banner.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('site/assets/funcoes/default.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('site/assets/funcoes/paymentPagseguro.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('site/assets/funcoes/main.js'))}}"></script>
<script type="text/javascript" src="{{url(mix('site/assets/funcoes/theme.js'))}}"></script>
</body>
</html>
