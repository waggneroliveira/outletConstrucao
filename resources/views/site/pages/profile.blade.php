@extends('site.layouts.app')
@section('content')
    <section id="meus_dados" class="secao">
        <div class="wrap">
            <div id="menu-dado" class="col-inline col-3">
                <h4 class="titulo"><b>Olá,</b>{{explode(' ', auth('customer')->user()->name)[0]}}</h4>
                <nav>
                    <ul>
                        <li class="trans-slow click-dado active">
                            <div class="image col-inline">
                                <img src="{{asset('site/assets/images/user.png')}}" alt="">
                            </div>
                            <a href="{{route('customer.profile.show')}}" class="col-inline"> Meus dados</a>
                        </li>
                        <li class="trans-slow click-dado">
                            <div class="image col-inline">
                                <img src="{{asset('site/assets/images/marker.png')}}" alt="">
                            </div>
                            <a href="{{route('site.address.index')}}" class="col-inline click-ajax">Meus endereços</a>
                        </li>
                        <li class="trans-slow click-dado">
                            <div class="image col-inline">
                                <img src="{{asset('site/assets/images/pedidoo.png')}}" alt="">
                            </div>
                            <a href="{{route('customer.login')}}" class="col-inline">Meus Pedidos</a>
                        </li>
                        <li class="trans-slow click-dado">
                            <div class="image col-inline">
                                <img src="{{asset('site/assets/images/coracao.png')}}" alt="">
                            </div>
                            <a href="{{route('site.customer.favorites')}}" class="col-inline">Favoritos</a>
                        </li>
                        <li class="trans-slow click-dado">
                            <div class="image col-inline">
                                <img src="{{asset('site/assets/images/aju.png')}}" alt="">
                            </div>
                            <a href="{{route('site.help')}}" class="col-inline">Ajuda</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <section id="find-compra" class="secao col-inline col-9">
                <div class="header-title">
                    <h4 class="titulo">Meus Dados</h4>
                </div>
                <div id="add_adress">
                    <form action="{{route('customer.profile.update',['customer' => $customer->id])}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="label-input col-inline col-x2">
                            <i class="row">Nome</i>
                            <label for="cep">
                                <input type="text" name="name" id="name" value="{{$customer->name}}">
                            </label>
                        </div>
                        <div class="label-input col-inline col-x2">
                            <i class="row">Email</i>
                            <label for="email">
                                <input type="text" readonly name="email" id="email" value="{{$customer->email}}">
                            </label>
                        </div>
                        <div class="label-input col-inline col-x2">
                            <i class="row">CPF</i>
                            <label for="cpf">
                                <input type="text" readonly name="cpf" id="cpf" value="{{substr($customer->cpf,0, 3)}}******{{substr($customer->cpf,-2)}}">
                            </label>
                        </div>
                        <div class="label-input col-inline col-x2">
                            <i class="row">Telefone</i>
                            <label for="phone">
                                <input type="text" name="phone" data-mask="(00) 000000000" placeholder="Ex.: (71) 000000000" id="phone" value="{{$customer->phone}}">
                            </label>
                        </div>
                        <input type="submit" value="Salvar Alterações" class="trans-slow">
                    </form>
                </div>
                <div class="header-title">
                    <h4 class="titulo">Alterar senha</h4>
                </div>
                <div id="add_adress">
                    <form action="{{route('customer.profile.updatePassword',['customer' => $customer->id])}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="label-input col-inline col-x3">
                            <i class="row">Senha atual</i>
                            <label for="password_current">
                                <input type="password" name="password_current" id="password_current">
                            </label>
                        </div>
                        <div class="label-input col-inline col-x3">
                            <i class="row">Nova Senha</i>
                            <label for="password">
                                <input type="password" name="password" id="password">
                            </label>
                        </div>
                        <div class="label-input col-inline col-x3">
                            <i class="row">Confirmar senha</i>
                            <label for="password_verified">
                                <input type="password" name="password_verified" id="password_verified">
                            </label>
                        </div>
                        <input type="submit" value="Confirmar" class="trans-slow">
                    </form>
                </div>
            </section>
        </div>
    </section>
@endsection
