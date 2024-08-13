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
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('painel') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Configurações Gerais</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Configurações Gerais</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="ml-auto col-lg-4">
                                    <div class="text-lg-right">
                                        <button type="button" onclick="submitForm('#formCategoria')" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Salvar</button>
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <form id="formCategoria" action="{{ route('admin.integration.update', ['integration' => $integration->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="col-12">
                                            <h3 class="mb-3">Compras</h3>
                                            <div class="form-group mb-3">
                                                <label for="min_price_freight_free">Valor mínimo pra frete Grátis</label>
                                                <input type="text" id="min_price_freight_free" data-mask="0000.00" data-mask-reverse="true" name="min_price_freight_free" class="form-control" value="{{ $integration->min_price_freight_free }}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="max_installment_nointerest">Máximo de parcelas sem Juros</label>
                                                <input type="text" id="max_installment_nointerest" data-mask="00000" name="max_installment_nointerest" class="form-control" value="{{ $integration->max_installment_nointerest }}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="limit_alert_stock">Alerta mínimo de estoque</label>
                                                <input type="text" id="limit_alert_stock" data-mask="00000" name="limit_alert_stock" class="form-control" value="{{ $integration->limit_alert_stock }}">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-12">
                                            <h3 class="mb-3">Logotipo</h3>
                                            <div class="row">
                                                <div class="form-group mb-3 col-12 col-md-6">
                                                    <label for="path_image_logo_header">Topo</label>
                                                    <input type="file" class="dropify" name="path_image_logo_header" data-default-file="{{$integration->path_image_logo_header<>''?asset('storage/admin/uploads/fotos/'.$integration->path_image_logo_header):''}}" data-height="150" />
                                                </div>
                                                <div class="form-group mb-3 col-12 col-md-6">
                                                    <label for="path_image_logo_footer">Rodapé</label>
                                                    <input type="file" class="dropify" name="path_image_logo_footer" data-default-file="{{$integration->path_image_logo_footer<>''?asset('storage/admin/uploads/fotos/'.$integration->path_image_logo_footer):''}}" data-height="150" />
                                                </div>
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-12">
                                            <h3 class="mb-3">Pagseguro</h3>
                                            <div class="form-group mb-3">
                                                <label for="email_pagseguro">E-mail</label>
                                                <input type="text" id="email_pagseguro" name="email_pagseguro" class="form-control" value="{{ $integration->email_pagseguro }}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="token_pagseguro">Token</label>
                                                <input type="text" id="token_pagseguro" name="token_pagseguro" class="form-control" value="{{ $integration->token_pagseguro }}">
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="col-12">
                                            <h3 class="mb-3">SMTP</h3>
                                            <div class="form-group mb-3">
                                                <label for="mail_host">Host</label>
                                                <input type="text" id="mail_host" name="mail_host" class="form-control" value="{{ $integration->mail_host }}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="mail_port">Porta</label>
                                                <input type="text" id="mail_port" data-mask="000" name="mail_port" class="form-control" value="{{ $integration->mail_port }}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="mail_username">Usuário</label>
                                                <input type="text" id="mail_username" name="mail_username" class="form-control" value="{{ $integration->mail_username }}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="mail_password">Senha</label>
                                                <input type="text" id="mail_password" name="mail_password" class="form-control" value="{{ $integration->mail_password }}">
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-12">
                                            <h3 class="mb-2">Melhor Envio</h3>
                                            <p>
                                                Antes de gerar o token um aplicativo deverá ser criado no <a href="https://melhorenvio.com.br/painel/gerenciar/tokens" target="_blank"><b>Melhor Envio</b></a> e os campos de Client ID e Cliente Secret preenchidos.<br><br>
                                                <b>IMPORTANTE</b> Na criação do seu aplicativo, no campo onde solicita a url de redirecionamento inserir o link <i>{{url('')}}/tokenME</i>
                                            </p>
                                        </div>
                                        @if ($integration->client_id_me <> '' && $integration->client_secret_me <> '')
                                            <a href="#generateTokenME" data-fancybox class="btn btn-secondary waves-effect waves-light mb-4 mr-2">Gerar Token</a>
                                        @endif
                                        <div class="form-group mb-3">
                                            <label for="client_id_me">Cliente ID</label>
                                            <input type="text" id="client_id_me" name="client_id_me" class="form-control" value="{{ $integration->client_id_me }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="client_secret_me">Cliente Secret</label>
                                            <input type="text" id="client_secret_me" name="client_secret_me" class="form-control" value="{{ $integration->client_secret_me }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="updated_at">Ultima Atualização do Token</label>
                                            <input type="text" id="updated_at" disabled name="updated_at" class="form-control" value="{{ $integration->updated_at }}">
                                        </div>
                                    </div><!-- end col -->
                                </div>
                                <!-- end row -->
                                <!-- end row -->
                            </form>
                            <section id="generateTokenME" class="generateTokenME" style="display: none;">
                                <div class="card-body">
                                    <h3>Lista de permissões</h3>
                                    <p>Solicitar apenas as permissões necessárias para sua integração</p>
                                    @if (env('ENVIRONMENT_SANDBOX', false))
                                        <form id="formGenerateTokenME" action="https://sandbox.melhorenvio.com.br/oauth/authorize?client_id={{ $integration->client_id_me }}&redirect_uri={{url('')}}/tokenME&response_type=code&scope=" method="POST">
                                    @else
                                        <form id="formGenerateTokenME" action="https://melhorenvio.com.br/oauth/authorize?client_id={{ $integration->client_id_me }}&redirect_uri={{url('')}}/tokenME&response_type=code&scope=" method="POST">
                                    @endif
                                        <ul class="pl-2">
                                            <li class="row align-items-center">
                                                <input type="checkbox" name="permission[]" value="shipping-calculate" id="shipping-calculate">
                                                <label class="ml-1 mt-1" for="shipping-calculate">Cotação de fretes</label>
                                            </li>
                                            {{-- <li class="row align-items-center">
                                                <input type="checkbox" name="permission[]" value="shipping-cancel" id="shipping-cancel">
                                                <label class="ml-1 mt-1" for="shipping-cancel">Cancelamento de etiquetas</label>
                                            </li>
                                            <li class="row align-items-center">
                                                <input type="checkbox" name="permission[]" value="shipping-checkout" id="shipping-checkout">
                                                <label class="ml-1 mt-1" for="shipping-checkout">Checkout para compra de fretes, utiliza saldo da carteira</label>
                                            </li>
                                            <li class="row align-items-center">
                                                <input type="checkbox" name="permission[]" value="shipping-companies" id="shipping-companies">
                                                <label class="ml-1 mt-1" for="shipping-companies">Consulta de transaportadoras</label>
                                            </li>
                                            <li class="row align-items-center">
                                                <input type="checkbox" name="permission[]" value="shipping-generate" id="shipping-generate">
                                                <label class="ml-1 mt-1" for="shipping-generate">Geração de novas etiquetas</label>
                                            </li>
                                            <li class="row align-items-center">
                                                <input type="checkbox" name="permission[]" value="shipping-preview" id="shipping-preview">
                                                <label class="ml-1 mt-1" for="shipping-preview">Pré-visualização de etiquetas</label>
                                            </li>
                                            <li class="row align-items-center">
                                                <input type="checkbox" name="permission[]" value="shipping-print" id="shipping-print">
                                                <label class="ml-1 mt-1" for="shipping-print">Impressão de etiquetas</label>
                                            </li>
                                            <li class="row align-items-center">
                                                <input type="checkbox" name="permission[]" value="shipping-share" id="shipping-share">
                                                <label class="ml-1 mt-1" for="shipping-share">Compartilhamento de etiquetas</label>
                                            </li>
                                            <li class="row align-items-center">
                                                <input type="checkbox" name="permission[]" value="shipping-tracking" id="shipping-tracking">
                                                <label class="ml-1 mt-1" for="shipping-tracking">Rastreio de fretes</label>
                                            </li>
                                            <li class="row align-items-center">
                                                <input type="checkbox" name="permission[]" value="ecommerce-shipping" id="ecommerce-shipping">
                                                <label class="ml-1 mt-1" for="ecommerce-shipping">Cotação e compra de fretes para sua loja</label>
                                            </li> --}}
                                        </ul>
                                        <button type="button" id="solicitationPermissionaToken" class="btn btn-primary waves-effect waves-light mt-3 mb-2 float-right">Solicitar</button>
                                    </form>
                                </div>
                            </section>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->


@endsection
