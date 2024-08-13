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
                        <li class="trans-slow click-dado active">
                            <div class="image col-inline">
                                <img src="{{asset('site/assets/images/aju.png')}}" alt="">
                            </div>
                            <a href="{{route('site.help')}}" class="col-inline">Ajuda</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div id="ajuda" class="col-inline col-9">
                <h4 class="titulo">Ajuda</h4>
                <div class="engloba-box-contato">
                    <div class="box-contato col-inline">
                        <div class="content">
                            <p><a href="tel:+55{{ !empty($contacts->phone) ? $contacts->phone : ''}}" rel="noopener noreferrer"><i class="icon-text">&#xf232;</i>{{ !empty($contacts->phone) ? $contacts->phone : ''}}</a></p>
                        </div>
                    </div>
                    {{-- <div class="box-contato col-inline">
                        <div class="content">
                            <p><i class="icon-text">&#xe861;</i>71 9000-0000</p>
                        </div>
                    </div> --}}
                    <div class="box-contato col-inline">
                        <div class="content">
                            <p><a href="mailto:{{ !empty($contacts->email) ? $contacts->email: ''}}"><i class="icon-text">&#xec9f;</i>{{ !empty($contacts->email) ? $contacts->email: ''}}</a></p>
                        </div>
                    </div>
                </div>
                <div class="form">
                    <form action="{{route('site.mail.ContactUs')}}" method="post">
                        @csrf
                        <div class="label-input col-inline col-x2">
                            <label for="name">
                            <input type="text" name="name" id="name" placeholder="Nome">
                            </label>
                        </div>
                        <div class="label-input col-inline col-x2">
                            <label for="email">
                            <input type="text" name="email" id="email" placeholder="Email">
                            </label>
                        </div>
                        <div class="label-input col-inline col-x2">
                            <label for="telefone">
                            <input type="text" data-mask="(00) 000000000" name="phone" id="telefone" placeholder="Telefone">
                            </label>
                        </div>
                        <div class="label-input col-inline col-x2">
                            <select name="subject" id="assunto">
                                <option value="0" disable>Escolha o Assunto</option>
                                <option value="frete">Frete</option>
                                <option value="develucao">Devolução</option>
                                <option value="tempo">Tempo</option>
                                <option value="outro">Outros</option>
                            </select>
                        </div>
                        <textarea name="mesage" id="mesage" cols="30" rows="10" value="Mensagem" placeholder="Assunto"></textarea>
                        <input type="submit" value="Enviar" class="trans-slow envia">
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
