@extends('admin.layouts.app')
@section('content')

            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">

                                </div>
                                <h4 class="page-title">Dashboard</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    @if ($stocks->count())
                        <div class="alert alert-warning" role="alert">
                            <i class="mdi mdi-block-helper mr-2"></i>
                            Cuidado, alguns estoques estão com a quantidade próxima ou abaixo do limite mínimo cadastrado
                            <strong><a href="{{route('admin.stock.index')}}">Clique e confira</a></strong>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6 col-xl-4">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                            <i class="mdi mdi-chart-line font-22 avatar-title text-success"></i>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="text-right">
                                            <h3 class="text-dark mt-1">R$ <span data-plugin="counterup">{{ $totalRevenueToday }}</span></h3>
                                            <p class="text-muted mb-1">Receita total de hoje</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->

                        <div class="col-md-6 col-xl-4">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                            <i class="mdi mdi-cash-usd font-22 avatar-title text-info"></i>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="text-right">
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $todaysSales }}</span></h3>
                                            <p class="text-muted mb-1">Total de vendas hoje</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->

                        <div class="col-md-6 col-xl-4">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="avatar-lg rounded-circle bg-soft-secondary border-secondary border">
                                            <i class="fe-shopping-cart font-22 avatar-title text-info"></i>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="text-right">
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $waitingTotal }}</span></h3>
                                            <p class="mb-1">Aguardando Confirmação</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row-->

                    <div class="row">
                        <div class="col-xl-12 row align-items-start">
                            <h4 class="header-title mb-2 col-12">Navegação</h4>
                            <div class="col-md-6 col-xl-3 box-dashboard">
                                <a href="{{ route('admin.slide.index') }}">
                                    <div class="p-2 card-box">
                                        <div class="mr-auto ml-auto avatar-md rounded-circle bg-soft-info border-info border">
                                            <i class="fe-airplay font-24 avatar-title text-info"></i>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-dark mt-1">Banner</h5>
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </a>
                            </div> <!-- end col-->
                            {{-- <div class="col-md-6 col-xl-3 box-dashboard">
                                <a href="{{ route('admin.bannerInstitutional.index') }}">
                                    <div class="p-2 card-box">
                                        <div class="mr-auto ml-auto avatar-md rounded-circle bg-soft-info border-info border">
                                            <i class="mdi mdi-desktop-mac-dashboard font-24 avatar-title text-info"></i>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-dark mt-1">Banners Intitucionais</h5>
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </a>
                            </div> <!-- end col--> --}}
                            <div class="col-md-6 col-xl-3 box-dashboard">
                                <a href="{{ route('admin.sizeChart.index') }}">
                                    <div class="p-2 card-box">
                                        <div class="mr-auto ml-auto avatar-md rounded-circle bg-soft-info border-info border">
                                            <i class="mdi mdi-move-resize font-24 avatar-title text-info"></i>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-dark mt-1">Tabela de Tamanhos</h5>
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </a>
                            </div> <!-- end col-->
                            <div class="col-md-6 col-xl-3 box-dashboard">
                                <a href="{{ route('admin.topic.index') }}">
                                    <div class="p-2 card-box">
                                        <div class="mr-auto ml-auto avatar-md rounded-circle bg-soft-info border-info border">
                                            <i class="mdi mdi-alert-box font-24 avatar-title text-info"></i>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-dark mt-1">Tópicos Info.</h5>
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </a>
                            </div> <!-- end col-->
                            <div class="col-md-6 col-xl-3 box-dashboard">
                                <a href="{{ route('admin.post.index') }}">
                                    <div class="p-2 card-box">
                                        <div class="mr-auto ml-auto avatar-md rounded-circle bg-soft-info border-info border">
                                            <i class="mdi mdi-alert-box font-24 avatar-title text-info"></i>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-dark mt-1">Postagens</h5>
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </a>
                            </div> <!-- end col-->
                            {{-- <div class="col-md-6 col-xl-3 box-dashboard">
                                <a href="{{ route('admin.categoryBlog.index') }}">
                                    <div class="p-2 card-box">
                                        <div class="mr-auto ml-auto avatar-md rounded-circle bg-soft-info border-info border">
                                            <i class="mdi mdi-alert-box font-24 avatar-title text-info"></i>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-dark mt-1">Categoria Blog</h5>
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </a>
                            </div> <!-- end col--> --}}
                            {{-- <div class="col-md-6 col-xl-3 box-dashboard">
                                <a href="{{ route('admin.blog.index') }}">
                                    <div class="p-2 card-box">
                                        <div class="mr-auto ml-auto avatar-md rounded-circle bg-soft-info border-info border">
                                            <i class="mdi mdi-alert-box font-24 avatar-title text-info"></i>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-dark mt-1">Blogs</h5>
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </a>
                            </div> <!-- end col--> --}}
                            <div class="col-md-6 col-xl-3 box-dashboard">
                                <a href="{{ route('admin.discountClub.index') }}">
                                    <div class="p-2 card-box">
                                        <div class="mr-auto ml-auto avatar-md rounded-circle bg-soft-info border-info border">
                                            <i class="mdi mdi-alert-box font-24 avatar-title text-info"></i>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-dark mt-1">Clube de Disconto</h5>
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </a>
                            </div> <!-- end col-->
                            <div class="col-md-6 col-xl-3 box-dashboard">
                                <a href="{{ route('admin.category.index') }}">
                                    <div class="p-2 card-box">
                                        <div class="mr-auto ml-auto avatar-md rounded-circle bg-soft-info border-info border">
                                            <i class="mdi mdi-file-tree font-24 avatar-title text-info"></i>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-dark mt-1">Categoria Produto</h5>
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </a>
                            </div> <!-- end col-->
                            <div class="col-md-6 col-xl-3 box-dashboard">
                                <a href="{{ route('admin.subcategory.index') }}">
                                    <div class="p-2 card-box">
                                        <div class="mr-auto ml-auto avatar-md rounded-circle bg-soft-info border-info border">
                                            <i class="mdi mdi-file-tree font-24 avatar-title text-info"></i>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-dark mt-1">Subcategoria Produto</h5>
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </a>
                            </div> <!-- end col-->
                            <div class="col-md-6 col-xl-3 box-dashboard">
                                <a href="{{ route('admin.brand.index') }}">
                                    <div class="p-2 card-box">
                                        <div class="mr-auto ml-auto avatar-md rounded-circle bg-soft-info border-info border">
                                            <i class="mdi mdi-file-tree font-24 avatar-title text-info"></i>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-dark mt-1">Marcas</h5>
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </a>
                            </div> <!-- end col-->
                            <div class="col-md-6 col-xl-3 box-dashboard">
                                <a href="{{ route('admin.productSize.index') }}">
                                    <div class="p-2 card-box">
                                        <div class="mr-auto ml-auto avatar-md rounded-circle bg-soft-info border-info border">
                                            <i class="mdi mdi-move-resize font-24 avatar-title text-info"></i>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-dark mt-1">Tamanhos do Produto</h5>
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </a>
                            </div> <!-- end col-->
                            <div class="col-md-6 col-xl-3 box-dashboard">
                                <a href="{{ route('admin.productColor.index') }}">
                                    <div class="p-2 card-box">
                                        <div class="mr-auto ml-auto avatar-md rounded-circle bg-soft-info border-info border">
                                            <i class="mdi mdi-format-color-fill font-24 avatar-title text-info"></i>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-dark mt-1">Cores do Produto</h5>
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </a>
                            </div> <!-- end col-->
                            <div class="col-md-6 col-xl-3 box-dashboard">
                                <a href="{{ route('admin.product.index') }}">
                                    <div class="p-2 card-box">
                                        <div class="mr-auto ml-auto avatar-md rounded-circle bg-soft-info border-info border">
                                            <i class="mdi mdi-cart font-24 avatar-title text-info"></i>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-dark mt-1">Produtos</h5>
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </a>
                            </div> <!-- end col-->
                            <div class="col-md-6 col-xl-3 box-dashboard">
                                <a href="{{ route('admin.coupon.index') }}">
                                    <div class="p-2 card-box">
                                        <div class="mr-auto ml-auto avatar-md rounded-circle bg-soft-info border-info border">
                                            <i class="mdi mdi-cash-multiple font-24 avatar-title text-info"></i>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-dark mt-1">Cupons</h5>
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </a>
                            </div> <!-- end col-->
                            <div class="col-md-6 col-xl-3 box-dashboard">
                                <a href="{{ route('admin.customer.index') }}">
                                    <div class="p-2 card-box">
                                        <div class="mr-auto ml-auto avatar-md rounded-circle bg-soft-info border-info border">
                                            <i class="mdi mdi-account-multiple font-24 avatar-title text-info"></i>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-dark mt-1">Clientes</h5>
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </a>
                            </div> <!-- end col-->
                            <div class="col-md-6 col-xl-3 box-dashboard">
                                <a href="{{ route('admin.order.index') }}">
                                    <div class="p-2 card-box">
                                        <div class="mr-auto ml-auto avatar-md rounded-circle bg-soft-info border-info border">
                                            <i class="mdi mdi-cart-plus font-24 avatar-title text-info"></i>
                                        </div>
                                        <div class="text-center">
                                            <h5 class=" mt-1 text-secondary">Pedidos</h5>
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </a>
                            </div> <!-- end col-->
                            <div class="col-md-6 col-xl-3 box-dashboard">
                                <a href="{{ route('admin.newsletter.index') }}">
                                    <div class="p-2 card-box">
                                        <div class="mr-auto ml-auto avatar-md rounded-circle bg-soft-info border-info border">
                                            <i class="mdi mdi-cart-plus font-24 avatar-title text-info"></i>
                                        </div>
                                        <div class="text-center">
                                            <h5 class=" mt-1 text-secondary">Cadastro Clube</h5>
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </a>
                            </div> <!-- end col-->
                            <div class="col-md-6 col-xl-3 box-dashboard">
                                <a href="{{ route('admin.integration.edit',['integration' => 1]) }}">
                                    <div class="p-2 card-box">
                                        <div class="mr-auto ml-auto avatar-md rounded-circle bg-soft-info border-info border">
                                            <i class="mdi mdi-alert-box font-24 avatar-title text-info"></i>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-dark mt-1">Info. Gerais</h5>
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </a>
                            </div> <!-- end col-->
                            <div class="col-md-6 col-xl-3 box-dashboard">
                                <a href="{{ route('admin.user.index') }}">
                                    <div class="p-2 card-box">
                                        <div class="mr-auto ml-auto avatar-md rounded-circle bg-soft-info border-info border">
                                            <i class="mdi mdi-account-edit font-24 avatar-title text-info"></i>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-dark mt-1">Usuários</h5>
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </a>
                            </div> <!-- end col-->
                            <div class="col-md-6 col-xl-3 box-dashboard">
                                <a href="{{ route('admin.contact.index') }}">
                                    <div class="p-2 card-box">
                                        <div class="mr-auto ml-auto avatar-md rounded-circle bg-soft-info border-info border">
                                            <i class="mdi mdi-alert-box font-24 avatar-title text-info"></i>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-dark mt-1">Info. Contato</h5>
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </a>
                            </div> <!-- end col-->

                        </div> <!-- end col-->


                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <h4 class="header-title mb-3">Pedidos aguardando Confirmação</h4>

                                <div class="table-responsive">
                                    <table class="table table-borderless table-hover table-centered m-0">

                                        <thead class="thead-light">
                                            <tr>
                                                <th>Nº Pedido</th>
                                                <th class="text-center">Cliente</th>
                                                <th class="text-center">Data</th>
                                                <th class="text-center">Total</th>
                                                <th class="text-center">Tipo Pagamento</th>
                                                <th class="text-center">Status Pedido</th>
                                                <th width="100px" class="text-center">Tipo Frete</th>
                                                <th width="100px" class="text-center">Detalhes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td class="text-center"><a href="javascript: void(0);" class="text-body font-weight-bold">#OS{{ str_pad($order->id, 4, "0", STR_PAD_LEFT) }}</a> </td>
                                                    <td class="text-center">
                                                        {{$order->name}}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ date('d/m/Y', strtotime($order->created_at)) }} <small class="text-muted">{{ date('H:i', strtotime($order->created_at)) }}</small>
                                                    </td>
                                                    <td class="text-center">
                                                        <b class="text-secondary">R$ {{  str_replace('.', ',', $order->amount)  }}</b>
                                                    </td>
                                                    <td class="text-center">
                                                        @switch($order->payment_method)
                                                            @case(1) Cartão de Crédito @break
                                                            @case(2) Boleto @break
                                                            @case(3) Débito online @break
                                                            @case(4) Saldo PagSeguro @break
                                                        @endswitch
                                                    </td>
                                                    <td class="text-center">
                                                        <h5>
                                                            @switch($order->status)
                                                                @case(0)
                                                                    <span class="badge badge-secondary">Aguardando Confirmação</span>
                                                                @break
                                                                @case(1)
                                                                    <span class="badge badge-info">Preparando</span>
                                                                @break
                                                                @case(2)
                                                                    <span class="badge badge-secondary">Enviado</span>
                                                                @break
                                                                @case(3)
                                                                    <span class="badge badge-success">Entregue</span>
                                                                @break
                                                            @endswitch

                                                        </h5>
                                                    </td>
                                                    <td class="text-center">
                                                        @switch($order->freight_type)
                                                            @case('FP') - @break;
                                                            @case('FG') Grátis @break;
                                                            @case('RL') Loja @break;
                                                            @default - @break;
                                                        @endswitch
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="flex">
                                                            <a href="{{ route('admin.order.edit', ['order' => $order->id]) }}" class="action-icon" title="Detalhes do Pedido"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="{{ route('admin.order.show', ['order' => $order->id]) }}" target="_blank" class="action-icon" title="Gerar PDF"> <i class=" mdi mdi-file-pdf-box"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> <!-- end .table-responsive-->
                            </div> <!-- end card-box-->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->

@endsection
