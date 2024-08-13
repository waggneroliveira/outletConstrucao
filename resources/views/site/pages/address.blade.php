@extends('site.layouts.app')
@section('content')
    <section id="meus_dados" class="secao">
        <div class="wrap">
            <div id="menu-dado" class="col-inline col-3">
                <h4 class="titulo"><b>Olá,</b>{{explode(' ', auth('customer')->user()->name)[0]}}</h4>
                <nav>
                    <ul>
                        <li class="trans-slow click-dado">
                            <div class="image col-inline">
                                <img src="{{asset('site/assets/images/user.png')}}" alt="">
                            </div>
                            <a href="{{route('customer.profile.show')}}" class="col-inline"> Meus dados</a>
                        </li>
                        <li class="trans-slow click-dado active">
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
                    <h4 class="titulo">Meus Endereços</h4>
                </div>
                <div id="location-entrega">
                    <div class="engloba-box-location">
                        @foreach ($addresses as $address)
                            <div class="box-locarion col-inline col-x4 trans-slow {{$address->default==1?'active':''}}">
                                <div class="content">
                                    <div class="descricao">
                                        {{-- <h4 class="titulo">Casa</h4> --}}
                                        <a href="{{route('site.address.edit', ['address' => $address->id])}}#add_adress">
                                            <p>
                                                {{$address->public_place}}
                                                {{$address->number}},
                                                {{$address->region}},
                                                {{$address->city}}-{{$address->state}}
                                                CEP: {{$address->zip_code}}
                                                {{$address->complement}}
                                                ({{$address->reference}})
                                            </p>
                                        </a>
                                    </div>
                                    <div class="selected" >
                                        <form action="{{route('site.address.default', ['address' => $address->id])}}" class="defaultAdrress col-inline {{$address->default==1?'active':''}}" method="POST">
                                            @csrf
                                            <button type="submit"><i class="icon-text botao-link" title="Definir endereço como padrão, isso ajudará na hora de calcular o frete no ato da compra.">&#xe828;</i></button>
                                        </form>
                                        <form action="{{route('site.address.destroy', ['address' => $address->id])}}" class="deleteAddress col-inline" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"><i class="icon-text botao-link" title="Deletar endereço" style="color:red;">&#xec65;</i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="box-locarion col-inline col-x4 trans-slow add-new-adress">
                            <div class="content">
                                @if (isset($addressEdit))
                                    <a href="{{route('site.address.index')}}#add_adress" class="link-full"></a>
                                @else
                                    <a href="#add_adress" class="ancora link-full"></a>
                                @endif
                                Adicionar novo endereço
                                <i class="icon-text trans-slow">&#xe82e;</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="add_adress">
                    @if (isset($addressEdit))
                        <h4 class="titulo">Editar Endereço</h4>
                    @else
                        <h4 class="titulo">Novo Endereço</h4>
                    @endif
                    <form action="{{isset($addressEdit)?route('site.address.update', ['address' => $addressEdit->id]):route('site.address.store')}}" method="post">
                        @csrf
                        @if (isset($addressEdit))
                            @method('PUT')
                        @endif
                        <input type="hidden" name="field" value="customersArea">
                        <input type="hidden" name="customer_id" value="{{auth('customer')->user()->id}}">
                        <div class="label-input col-inline col-x2">
                            <i class="row">CEP <i style="color: red;">*</i></i>
                            <label for="zip_code">
                                <input type="text" data-mask="00000000" onchange="getCepContent(this, '#state', '#city', '#region', '#public_place')" name="zip_code" id="zip_code"  value="{{isset($addressEdit)?$addressEdit->zip_code:''}}">
                            </label>
                        </div>
                        <div class="label-input col-inline col-x2">
                            <i class="row">Logradouro <i style="color: red;">*</i></i>
                            <label for="public_place">
                                <input type="text" name="public_place" id="public_place" value="{{isset($addressEdit)?$addressEdit->public_place:''}}">
                            </label>
                        </div>
                        <div class="label-input col-inline col-x2">
                            <i class="row">Número <i style="color: red;">*</i></i>
                            <label for="number">
                                <input type="text" name="number" id="number" value="{{isset($addressEdit)?$addressEdit->number:''}}">
                            </label>
                        </div>
                        <div class="label-input col-inline col-x2">
                            <i class="row">Estado <i style="color: red;">*</i></i>
                            <label for="state">
                                @php
                                    $addressState = isset($addressEdit) ? $addressEdit->state : '';
                                @endphp
                                <select name="state" required id="state">
                                    <option value="0" disabeld selected >--</option>
                                    <option {{$addressState=='AC'?'selected':''}} value="AC">AC</option>
                                    <option {{$addressState=='AL'?'selected':''}} value="AL">AL</option>
                                    <option {{$addressState=='AP'?'selected':''}} value="AP">AP</option>
                                    <option {{$addressState=='AM'?'selected':''}} value="AM">AM</option>
                                    <option {{$addressState=='BA'?'selected':''}} value="BA">BA</option>
                                    <option {{$addressState=='CE'?'selected':''}} value="CE">CE</option>
                                    <option {{$addressState=='DF'?'selected':''}} value="DF">DF</option>
                                    <option {{$addressState=='ES'?'selected':''}} value="ES">ES</option>
                                    <option {{$addressState=='GO'?'selected':''}} value="GO">GO</option>
                                    <option {{$addressState=='MA'?'selected':''}} value="MA">MA</option>
                                    <option {{$addressState=='MT'?'selected':''}} value="MT">MT</option>
                                    <option {{$addressState=='MS'?'selected':''}} value="MS">MS</option>
                                    <option {{$addressState=='MG'?'selected':''}} value="MG">MG</option>
                                    <option {{$addressState=='PA'?'selected':''}} value="PA">PA</option>
                                    <option {{$addressState=='PB'?'selected':''}} value="PB">PB</option>
                                    <option {{$addressState=='PR'?'selected':''}} value="PR">PR</option>
                                    <option {{$addressState=='PE'?'selected':''}} value="PE">PE</option>
                                    <option {{$addressState=='PI'?'selected':''}} value="PI">PI</option>
                                    <option {{$addressState=='RJ'?'selected':''}} value="RJ">RJ</option>
                                    <option {{$addressState=='RN'?'selected':''}} value="RN">RN</option>
                                    <option {{$addressState=='RS'?'selected':''}} value="RS">RS</option>
                                    <option {{$addressState=='RO'?'selected':''}} value="RO">RO</option>
                                    <option {{$addressState=='RR'?'selected':''}} value="RR">RR</option>
                                    <option {{$addressState=='SC'?'selected':''}} value="SC">SC</option>
                                    <option {{$addressState=='SP'?'selected':''}} value="SP">SP</option>
                                    <option {{$addressState=='SE'?'selected':''}} value="SE">SE</option>
                                    <option {{$addressState=='TO'?'selected':''}} value="TO">TO</option>
                                </select>
                                {{-- <input type="text" name="state" data-mask="AA" id="state" value="{{isset($addressEdit)?$addressEdit->state:''}}"> --}}
                            </label>
                        </div>
                        <div class="label-input col-inline col-x2">
                            <i class="row">Cidade <i style="color: red;">*</i></i>
                            <label for="city">
                                <input type="text" name="city" id="city" value="{{isset($addressEdit)?$addressEdit->city:''}}">
                            </label>
                        </div>
                        <div class="label-input col-inline col-x2">
                            <i class="row">Bairro <i style="color: red;">*</i></i>
                            <label for="region">
                                <input type="text" name="region" id="region" value="{{isset($addressEdit)?$addressEdit->region:''}}">
                            </label>
                        </div>
                        <div class="label-input col-inline col-x2">
                            <i class="row">Complemento</i>
                            <label for="complement">
                                <input type="text" name="complement" id="complement" value="{{isset($addressEdit)?$addressEdit->complement:''}}">
                            </label>
                        </div>
                        <div class="label-input col-inline col-x2">
                            <i class="row">Ponto de Referência <i style="color: red;">*</i></i>
                            <label for="reference">
                                <input type="text" name="reference" id="reference" value="{{isset($addressEdit)?$addressEdit->reference:''}}">
                            </label>
                        </div>

                        <input type="submit" value="Cormfirmar" class="trans-slow">
                    </form>
                </div>
            </section>
        </div>
    </section>
@endsection
