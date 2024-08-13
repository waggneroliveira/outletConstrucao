@extends('site.layouts.app')
<style>
    #topo{
      position:fixed;  
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
                <div id="login" class="col-inline col-6">
                    <h5 class="titulo">Acessar minha conta</h5>

                    <form action="{{ route('customer.login') }}" method="post">
                        @csrf
                        <div class="name">
                            <i>Email</i>
                            <label for="email"  {{ $errors->has('email') ? ' has-error' : '' }}>
                                <input type="text" name="email" id="email" value="{{ old('email') }}">
                            </label>
                        </div>
                        <div class="senha">
                            <i>Senha</i>
                            <label for="name" {{ $errors->has('password') ? ' has-error' : '' }}>
                                <input type="password" name="password" id="password">
                            </label>
                        </div>
                        <a href="{{route('customer.password.request')}}">Esqueci a senha</a>
                        @if ($errors->has('email'))
                            <div>
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            </div>
                        @endif
                        <input type="submit" value="{{ __('Acessar') }}" class="trans-slow">
                    </form>
                </div> 

                <div class="btn-cadastrar col-inline col-full">
                    <a href="{{route('site.cadastro')}}">Criar conta</a>
                </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
