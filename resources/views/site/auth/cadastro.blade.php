@extends('site.layouts.app')
<style>
    #topo{
        position: fixed;
    }
    #topo #mega-menu{
        display: none;
    }
    #topo .categorias{
        display: none;
    }
    .eng-mega-menu{
    background: transparent !important;
    height: 0 !important;
    margin-top: inherit !important;
    }
    .eng-mega-menu:after{
    height: 8px !important;
    }
    #topo .engloba-super-menu .desconto{
        display: none;
    }
    .tracos span:nth-of-type(1){
        background: #0D295C !important;
    }
    #rede_social{
        display: none;
    }
    #newsllatter{
        display: none;
    }
    #footer{
        display: none;
    }
    #credito{
        display: none;
    }
    .engloba-flutuante{
        display: none;
    }
</style>
@section('content')
    <div id="eng-login-cadastro">
        <section id="login-cadastro" class="secao">                 
            <div class="container">
                <div class="central">
                    <div id="cadastro" class="col-inline col-6 cadastro">

                        <div class="eng-titulo">
                            <h5 class="titulo">Criar minha Conta</h5>
                        </div>

                        <form action="{{ route('customer.register') }}" method="post">
                            <div class="background">
                                @csrf
                                <div class="name">
                                    <i>Nome completo <span style="color:red;font-size: 18px;">*</span></i>
                                    <label for="name">
                                        <input type="text" class="validateNameComplete @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" required>
                                    </label>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="email">
                                    <i>Email <span style="color:red;font-size: 18px;">*</span></i>
                                    <label for="email">
                                        <input type="text" class="@error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required>
                                    </label>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="email">
                                    <i>Telefone <span style="color:red;font-size: 18px;">*</span></i>
                                    <label for="phone">
                                        <input type="text" class="@error('phone') is-invalid @enderror" name="phone" data-mask="(00) 000000000" placeholder="Ex.: (71)00000-0000" id="phone" value="{{ old('phone') }}" required>
                                    </label>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="email">
                                    <i>CPF <span style="color:red;font-size: 18px;">*</span></i>
                                    <label for="cpf">
                                        <input type="text" data-mask="00000000000" class="@error('cpf') is-invalid @enderror" name="cpf" id="cpf" value="{{ old('cpf') }}" required>
                                    </label>
                                    @error('cpf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="email">
                                    <i>Criar Senha <span style="color:red;font-size: 18px;">*</span></i>
                                    <label for="password">
                                        <input type="password" minlength="8" class="inputPassword @error('password') is-invalid @enderror" name="password" id="password" value="{{ old('password') }}" required>
                                    </label>
                                </div>
                                <div class="email">
                                    <i>Confirmar Senha <span style="color:red;font-size: 18px;">*</span></i>
                                    <label for="password">
                                        <input type="password" class="inputConfirmiedPassword" minlength="8" name="password_confirmation" id="password" value="{{ old('password') }}" required>
                                    </label>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="btn-cadastrar col-inline col-full">
                                <input type="submit" value="Criar conta" class="trans-slow btnSubmit col-6">
                            </div>
                        </form>
                    </div>

                </div>
            </div>                      
        </section>
    </div>
@endsection
