<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="utf-8" />
    <title>Painel de Administração</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="base_url" content="{{route('site.home.index')}}" >
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.png')}}">

    <!-- Plugins css -->
    <link href="{{url(mix('admin/assets/libs/flatpickr/flatpickr.min.css'))}}" rel="stylesheet" type="text/css" />
    <link href="{{url(mix('admin/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css'))}}" rel="stylesheet" type="text/css" />
    <link href="{{url(mix('admin/assets/libs/clockpicker/bootstrap-clockpicker.min.css'))}}" rel="stylesheet" type="text/css" />

    <!-- Plugins css -->
    <link href="{{url(mix('admin/assets/libs/dropzone/dropzone.min.css'))}}" rel="stylesheet" type="text/css" />
    <link href="{{url(mix('admin/assets/libs/dropify/dropify.min.css'))}}" rel="stylesheet" type="text/css" />
    <link type="text/css" rel="stylesheet" href="{{url(mix('site/assets/css/plugins/jquery.fancybox.min.css'))}}">

    <!-- Cropper css -->
    <link href="{{url(mix('admin/assets/libs/cropper/cropper.min.css'))}}" rel="stylesheet" type="text/css" />

    <!-- third party css -->
    <link href="{{url(mix('admin/assets/libs/datatables/dataTables.bootstrap4.css'))}}" rel="stylesheet" type="text/css" />
    <link href="{{url(mix('admin/assets/libs/datatables/responsive.bootstrap4.css'))}}" rel="stylesheet" type="text/css" />
    <link href="{{url(mix('admin/assets/libs/datatables/buttons.bootstrap4.css'))}}" rel="stylesheet" type="text/css" />
    <link href="{{url(mix('admin/assets/libs/datatables/select.bootstrap4.css'))}}" rel="stylesheet" type="text/css" />
    <link href="{{url(mix('admin/assets/libs/sweetalert2/sweetalert2.min.css'))}}" rel="stylesheet" type="text/css" />
    <link href="{{url(mix('admin/assets/libs/jquery-toast/jquery.toast.min.css'))}}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- Plugins css-->
    <link href="{{url(mix('admin/assets/libs/select2/select2.min.css'))}}" rel="stylesheet" type="text/css" />
    <link href="{{url(mix('admin/assets/libs/summernote/summernote-bs4.css'))}}" rel="stylesheet" type="text/css" />

    <!-- Plugins css -->
    <link href="{{url(mix('admin/assets/libs/quill/quill.core.css'))}}" rel="stylesheet" type="text/css" />
    <link href="{{url(mix('admin/assets/libs/quill/quill.bubble.css'))}}" rel="stylesheet" type="text/css" />
    <link href="{{url(mix('admin/assets/libs/quill/quill.snow.css'))}}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{url(mix('admin/assets/css/bootstrap.min.css'))}}" rel="stylesheet" type="text/css" />
    <link href="{{url(mix('admin/assets/css/icons.min.css'))}}" rel="stylesheet" type="text/css" />
    <link href="{{url(mix('admin/assets/css/app.css'))}}" rel="stylesheet" type="text/css" />
    <link href="{{url(mix('admin/assets/css/main.css'))}}" rel="stylesheet" type="text/css" />

    <!-- Vendor js -->
    <script src="{{url(mix('admin/assets/js/vendor.min.js'))}}"></script>
    <script>
        $url = "{{url('')}}";
        $(document).ready(function(){
            $('body').addClass('enlarged');
        })
    </script>
</head>

<body>
<!-- Pre-loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner">Loading...</div>
    </div>
</div>
<!-- End Preloader-->
<!-- Begin page -->
<div id="wrapper">

    <!-- Topbar Start -->
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-bell noti-icon"></i>
                    @if ($notificationQuantity)
                    <span class="badge badge-danger rounded-circle noti-icon-badge">{{$notificationQuantity}}</span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                            Notificações
                        </h5>
                    </div>

                    <div class="slimscroll noti-scroll">
                        @foreach ($notifications as $notification)
                            <a href="{{route('admin.order.index')}}" class="dropdown-item notify-item {{$notification->status==0?'unread':'read'}}">
                                @switch($notification->type)
                                    @case(1)
                                        <div class="notify-icon bg-secondary">
                                            <i class="mdi mdi-timer-sand"></i>
                                        </div>
                                    @break
                                    @case(2)
                                        <div class="notify-icon bg-secondary">
                                            <i class="mdi mdi-feature-search"></i>
                                        </div>
                                    @break
                                    @case(3)
                                        <div class="notify-icon bg-success">
                                            <i class="mdi mdi-cash-multiple"></i>
                                        </div>
                                    @break
                                    @case(4)
                                        <div class="notify-icon bg-success">
                                            <i class="mdi mdi-check"></i>
                                        </div>
                                    @break
                                    @case(5)
                                        <div class="notify-icon bg-secondary">
                                            <i class="mdi mdi-minus-circle"></i>
                                        </div>
                                    @break
                                    @case(6)
                                        <div class="notify-icon bg-primary">
                                            <i class="mdi mdi-account-switch"></i>
                                        </div>
                                    @break
                                    @case(7)
                                        <div class="notify-icon bg-danger">
                                            <i class="mdi mdi-close-circle"></i>
                                        </div>
                                    @break
                                    @case(8)
                                        <div class="notify-icon bg-secondary">
                                            <i class="mdi mdi-cash-usd"></i>
                                        </div>
                                    @break
                                    @case(9)
                                        <div class="notify-icon bg-secondary">
                                            <i class="mdi mdi-minus"></i>
                                        </div>
                                    @break
                                    @case(10)
                                        <div class="notify-icon bg-success">
                                            <i class="mdi mdi-cart-plus"></i>
                                        </div>
                                    @break
                                @endswitch
                                <div class="d-table">
                                    <h5>{{$notification->title}}</h5>
                                    <p class="text-muted">{!!$notification->menssage!!}</p>
                                    <small class="text-muted">{{date("d/m/Y H:i:s", strtotime($notification->created_at))}}</small>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </li>
            <li class="dropdown notification-list">
                <a class="nav-link nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="pro-user-name ml-1">
                      {{ Auth::user()->name}}
                    </span>
                </a>
            </li>

            <li class="dropdown notification-list">
                <form action="{{route('admin.logout')}}" method="POST">
                    @csrf
                    <button type="submit" style="background-color: transparent; border: none;">
                        <div class="nav-link waves-effect waves-light">
                            <i class="fe-log-out noti-icon"></i>
                        </div>
                    </button>
                </form>
            </li>

        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="{{route('painel')}}" class="logo text-center">
                <span class="logo-lg">
                    {{--<img class="img-fluid" src="{{asset('admin/assets/images/logo-dark.png')}}" alt="" height="">--}}
                    <span class="logo-lg-text-light">Painel ADM</span>
                </span>
                <span class="logo-sm">
                    <span class="logo-lg-text-light">PA</span>
                    {{--<img src="{{asset('admin/assets/images/logo-light.png')}}" alt="" height="40">--}}
                </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light text-dark">
                    <i class="fe-menu"></i>
                </button>
            </li>
        </ul>
    </div>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <div class="slimscroll-menu">

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <li class="menu-title">Navegação</li>

                    <li>
                        <a href="{{route('painel')}}">
                            <i class="fe-airplay"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="dripicons-web"></i>
                            <span> site </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.slide.index') }}">Banner</a>
                            </li>
                            {{-- <li>
                                <a href="{{ route('admin.bannerInstitutional.index') }}">Banner Institucionais</a>
                            </li> --}}
                            <li>
                                <a href="{{ route('admin.post.index') }}">Postagens</a>
                            </li>
                            {{-- <li>
                                <a href="{{ route('admin.categoryBlog.index') }}">Categoria Blog</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.blog.index') }}">Blog</a>
                            </li> --}}
                            <li>
                                <a href="{{ route('admin.topic.index') }}">Topicos Informativo</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.contact.index') }}">Informações de Contato</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fe-shopping-cart"></i>
                            <span> eCommerce </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="{{route('admin.category.index')}}">Categorias</a>
                            </li>
                            <li>
                                <a href="{{route('admin.subcategory.index')}}">Subcategorias</a>
                            </li>
                            <li>
                                <a href="{{route('admin.sizeChart.index')}}">Tabela de Tamanhos</a>
                            </li>
                            <li>
                                <a href="{{route('admin.productSize.index')}}">Tamanhos</a>
                            </li>
                            <li>
                                <a href="{{route('admin.product.index')}}">Produtos</a>
                            </li>
                            <li>
                                <a href="{{route('admin.extra.index')}}">Extras</a>
                            </li>
                            <li>
                                <a href="{{route('admin.coupon.index')}}">Cupom</a>
                            </li>
                            <li>
                                <a href="{{route('admin.customer.index')}}">Clientes</a>
                            </li>
                            <li>
                                <a href="{{route('admin.integration.edit',['integration' => 1])}}">Informações Gerais</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-calendar-text"></i>
                            <span> Vendas </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="{{route('admin.order.index')}}">Pedidos</a>
                            </li>
                            <li>
                                <a href="{{route('admin.orderReport.index')}}">Relatórios</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fe-settings"></i>
                            <span> Configuração </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href=" {{ route('admin.user.index') }} ">Usuários</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    @if(Session::has('success'))
        <script>
            $(document).ready(function(){
                $.NotificationApp.send("Sucesso!", "{{Session::get('success')}}", "top-right", "#5ba035", "success")
            });
        </script>
    @endif
    @if(Session::has('error'))

        <script>
            $(document).ready(function() {
                $.NotificationApp.send("Erro!", "{{Session::get('error')}}", "top-right", "#bf441d", "error");
            });
        </script>

    @endif
    @if(Session::has('info'))

        <script>
            $(document).ready(function(){
                $.NotificationApp.send("Heads up!", "{{Session::get('info')}}", "top-right", "#3b98b5", "info");
            });
        </script>

    @endif

    @if(count($errors)>0)
        <ul class="list-group">
            @foreach($errors->all() as $error)

                <script>
                    $(document).ready(function(){
                        $.NotificationApp.send("Erro!", "{{$error}}", "top-right", "#bf441d", "error");
                        {{--demo.showNotification('top','center','{{$error}}','warning');--}}
                    });
                </script>

            @endforeach
        </ul>
@endif
<div class="content-page">

    @yield('content')

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    {{ date('Y') }} &copy; Hoom Delivery
                </div>
                <div class="col-md-6">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        <a href="https://hoom.com.br" target="_blank">Hoom Interativa</a>
                        <a href="https://api.whatsapp.com/send?phone=5571991342218&text=Ol%C3%A1%2C%20Me%20chamo%20*NOME*%20da%20empresa%20*NOME%20EMPRESA*" target="_blank">Ajuda</a>
                        <a href="https://hoom.com.br" target="_blank">Contato</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
<script>
    $(function(){
        $('.btnProductCover').on('change', function(){
            var action = $(this).attr('data-route');
            var product_id = $(this).attr('data-product-id');
            var product_cover = $(this).val();
            $.ajax({
                url:action,
                type:'PUT',
                data:{_token: "{{ csrf_token() }}", product_cover: product_cover, product_id: product_id},
                success:function(data){
                    if(data.response == 'success'){
                        $.NotificationApp.send("Sucesso!", data.mensagem, "top-right", "#5ba035", "success");
                    }else{
                        $.NotificationApp.send("Erro!", data.mensagem, "top-right", "#bf441d", "error");
                    }
                }
            });
        });

        $('.filterSelect').on('change', function(){
            var action = $(this).attr('data-route');
            var category_id = $(this).val();
            $.ajax({
                url:action,
                type:'GET',
                data:{_token: "{{ csrf_token() }}", category_id: category_id},
                beforeSend: function(){
                    $('#subcategory_id').attr('disabled', 'disabled').addClass('loading');
                },
                success:function(data){
                    $('#subcategory_id option').remove()
                    if(data.length){
                        var options = '<option selected value="0"></option>';
                        for(var i=0; i < data.length; i++){
                            options += '<option value="'+data[i]['id']+'">'+data[i]['title']+'</option>';

                        }
                    }else{
                        var options = '<option selected value="0"></option>';
                    }
                    $('#subcategory_id').append(options).removeAttr('disabled').removeClass('loading');
                }
            });
        });

        $('.btnGalleryDestroy').on('click', function(e){
            e.preventDefault();
            var $this = $(this);
            var action = $(this).attr('href');

            $.ajax({
                url:action,
                type:'DELETE',
                data:{_token: "{{ csrf_token() }}"},
                success:function(data){
                    // console.log(data);
                    if(data.response == 'success'){
                        $this.parents('.thumbPrev').fadeOut('fast', function(){
                            $(this).remove();
                        });
                        $.NotificationApp.send("Sucesso!", data.mensagem, "top-right", "#5ba035", "success");
                    }else{
                        $.NotificationApp.send("Erro!", data.mensagem, "top-right", "#bf441d", "error");
                    }
                }
            });
        });
    });
</script>

</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
    <div class="rightbar-title">
        <a href="javascript:void(0);" class="right-bar-toggle float-right">
            <i class="dripicons-cross noti-icon"></i>
        </a>
        <h5 class="m-0 text-white">Settings</h5>
    </div>
    <div class="slimscroll-menu">
        <!-- User box -->
        <div class="user-box">
            <div class="user-img">
                <img src="{{asset('admin/assets/images/users/user-1.jpg')}}" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                <a href="javascript:void(0);" class="user-edit"><i class="mdi mdi-pencil"></i></a>
            </div>

            <h5><a href="javascript: void(0);">Geneva Kennedy</a> </h5>
            <p class="text-muted mb-0"><small>Admin Head</small></p>
        </div>

        <!-- Settings -->
        <hr class="mt-0" />
        <h5 class="pl-3">Basic Settings</h5>
        <hr class="mb-0" />

        <div class="p-3">
            <div class="checkbox checkbox-primary mb-2">
                <input id="Rcheckbox1" type="checkbox" checked>
                <label for="Rcheckbox1">
                    Notifications
                </label>
            </div>
            <div class="checkbox checkbox-primary mb-2">
                <input id="Rcheckbox2" type="checkbox" checked>
                <label for="Rcheckbox2">
                    API Access
                </label>
            </div>
            <div class="checkbox checkbox-primary mb-2">
                <input id="Rcheckbox3" type="checkbox">
                <label for="Rcheckbox3">
                    Auto Updates
                </label>
            </div>
            <div class="checkbox checkbox-primary mb-2">
                <input id="Rcheckbox4" type="checkbox" checked>
                <label for="Rcheckbox4">
                    Online Status
                </label>
            </div>
            <div class="checkbox checkbox-primary mb-0">
                <input id="Rcheckbox5" type="checkbox" checked>
                <label for="Rcheckbox5">
                    Auto Payout
                </label>
            </div>
        </div>

        <!-- Timeline -->
        <hr class="mt-0" />
        <h5 class="pl-3 pr-3">Messages <span class="float-right badge badge-pill badge-danger">25</span></h5>
        <hr class="mb-0" />
        <div class="p-3">
            <div class="inbox-widget">
                <div class="inbox-item">
                    <div class="inbox-item-img"><img src="{{asset('admin/assets/images/users/user-2.jpg')}}" class="rounded-circle" alt=""></div>
                    <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Tomaslau</a></p>
                    <p class="inbox-item-text">I've finished it! See you so...</p>
                </div>
                <div class="inbox-item">
                    <div class="inbox-item-img"><img src="{{asset('admin/assets/images/users/user-3.jpg')}}" class="rounded-circle" alt=""></div>
                    <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Stillnotdavid</a></p>
                    <p class="inbox-item-text">This theme is awesome!</p>
                </div>
                <div class="inbox-item">
                    <div class="inbox-item-img"><img src="{{asset('admin/assets/images/users/user-4.jpg')}}" class="rounded-circle" alt=""></div>
                    <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Kurafire</a></p>
                    <p class="inbox-item-text">Nice to meet you</p>
                </div>

                <div class="inbox-item">
                    <div class="inbox-item-img"><img src="{{asset('admin/assets/images/users/user-5.jpg')}}" class="rounded-circle" alt=""></div>
                    <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Shahedk</a></p>
                    <p class="inbox-item-text">Hey! there I'm available...</p>
                </div>
                <div class="inbox-item">
                    <div class="inbox-item-img"><img src="{{asset('admin/assets/images/users/user-6.jpg')}}" class="rounded-circle" alt=""></div>
                    <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Adhamdannaway</a></p>
                    <p class="inbox-item-text">This theme is awesome!</p>
                </div>
            </div> <!-- end inbox-widget -->
        </div> <!-- end .p-3-->

    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>


<!-- Plugins js-->
<script src="{{url(mix('site/assets/funcoes/plugins/jquery.fancybox.min.js'))}}"></script>
<script src="{{url(mix('admin/assets/libs/flatpickr/flatpickr.min.js'))}}"></script>
<script src="{{url(mix('admin/assets/libs/jquery-knob/jquery.knob.min.js'))}}"></script>
<script src="{{url(mix('admin/assets/libs/jquery-sparkline/jquery.sparkline.min.js'))}}"></script>
<script src="{{url(mix('admin/assets/libs/flot-charts/jquery.flot.js'))}}"></script>
<script src="{{url(mix('admin/assets/libs/flot-charts/jquery.flot.time.js'))}}"></script>
<script src="{{url(mix('admin/assets/libs/flot-charts/jquery.flot.tooltip.min.js'))}}"></script>
<script src="{{url(mix('admin/assets/libs/flot-charts/jquery.flot.selection.js'))}}"></script>
<script src="{{url(mix('admin/assets/libs/flot-charts/jquery.flot.crosshair.js'))}}"></script>

<!-- Dashboar 1 init js-->
<script src="{{url(mix('admin/assets/js/pages/dashboard-1.init.js'))}}"></script>

<!-- third party js -->
<script src="{{url(mix('admin/assets/libs/datatables/jquery.dataTables.js'))}}"></script>
<script src="{{url(mix('admin/assets/libs/datatables/dataTables.bootstrap4.js'))}}"></script>
<script src="{{url(mix('admin/assets/libs/datatables/dataTables.responsive.min.js'))}}"></script>
<script src="{{url(mix('admin/assets/libs/datatables/responsive.bootstrap4.min.js'))}}"></script>
<script src="{{url(mix('admin/assets/libs/datatables/dataTables.buttons.min.js'))}}"></script>
<script src="{{url(mix('admin/assets/libs/datatables/buttons.bootstrap4.min.js'))}}"></script>
<script src="{{url(mix('admin/assets/libs/datatables/buttons.html5.min.js'))}}"></script>
<script src="{{url(mix('admin/assets/libs/datatables/buttons.flash.min.js'))}}"></script>
<script src="{{url(mix('admin/assets/libs/datatables/buttons.print.min.js'))}}"></script>
<script src="{{url(mix('admin/assets/libs/datatables/dataTables.keyTable.min.js'))}}"></script>
<script src="{{url(mix('admin/assets/libs/datatables/dataTables.select.min.js'))}}"></script>
<script src="{{url(mix('admin/assets/libs/pdfmake/pdfmake.min.js'))}}"></script>
<script src="{{url(mix('admin/assets/libs/pdfmake/vfs_fonts.js'))}}"></script>
<script src="{{url(mix('admin/assets/libs/sweetalert2/sweetalert2.min.js'))}}"></script>
<!-- third party js ends -->

<!-- Sweet alert init js-->
<script src="{{url(mix('admin/assets/js/pages/sweet-alerts.init.js'))}}"></script>

<!-- Datatables init -->
<script src="{{url(mix('admin/assets/js/pages/datatables.init.js'))}}"></script>

<!-- Bootstrap Tables js -->
<script src="{{ url(mix('admin/assets/libs/bootstrap-table/bootstrap-table.min.js')) }}"></script>

<!-- Init js -->
<script src="{{ url(mix('admin/assets/js/pages/bootstrap-tables.init.js')) }}"></script>

<!-- Plugins js -->
<script src="{{ url(mix('admin/assets/libs/dropzone/dropzone.min.js')) }}"></script>
<script src="{{ url(mix('admin/assets/libs/dropify/dropify.min.js')) }}"></script>

<!-- Init js-->
<script src="{{ url(mix('admin/assets/js/pages/form-fileuploads.init.js')) }}"></script>

<!-- Plugins js -->
<script src="{{ url(mix('admin/assets/libs/katex/katex.min.js')) }}"></script>
<script src="{{ url(mix('admin/assets/libs/quill/quill.min.js')) }}"></script>

<!-- Init js-->
<script src="{{ url(mix('admin/assets/js/pages/form-quilljs.init.js')) }}"></script>

<!-- Tost-->
<script src="{{url(mix('admin/assets/libs/jquery-toast/jquery.toast.min.js'))}}"></script>
<!-- toastr init js-->
<script src="{{url(mix('admin/assets/js/pages/toastr.init.js'))}}"></script>

<!-- Plugins js -->
<script src="{{url(mix('admin/assets/libs/cropper/cropper.min.js'))}}"></script>

<!-- Init js-->
<script src="{{url(mix('admin/assets/js/pages/form-imagecrop.init.js'))}}"></script>


<script src="{{url(mix('admin/assets/libs/flatpickr/flatpickr.min.js'))}}"></script>
<script src="{{url(mix('admin/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js'))}}"></script>
<script src="{{url(mix('admin/assets/libs/clockpicker/bootstrap-clockpicker.min.js'))}}"></script>
<script src="{{url(mix('admin/assets/js/pages/form-pickers.init.js'))}}"></script>

<!-- Summernote js -->
<script src="{{url(mix('admin/assets/libs/summernote/summernote-bs4.min.js'))}}"></script>
<!-- Select2 js-->
<script src="{{url(mix('admin/assets/libs/select2/select2.min.js'))}}"></script>
<!-- Init js -->
<script src="{{url(mix('admin/assets/js/pages/add-product.init.js'))}}"></script>

<!-- App js-->
<script src="{{url(mix('admin/assets/js/app.min.js'))}}"></script>

<!-- Mask js-->
<script src="{{ url(mix('admin/assets/js/jquery.mask.min.js'))}}"></script>

<script src="{{url(mix('admin/assets/js/main.js'))}}"></script>




</body>
</html>
