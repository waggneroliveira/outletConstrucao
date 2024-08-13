@extends('admin.layouts.login')

@section('content')

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-pattern">

                        <div class="card-body p-4">
                            <div class="logo" id="logo">
                                <a href="{{route('site.home.index')}}" class="link-full"></a>
                                <img src="{{asset('site/assets/images/logo.png')}}" alt="">
                            </div>
                            <div class="text-center w-75 m-auto">
                                <p class="text-muted mb-4 mt-3">Digite seu endereço de e-mail e senha para acessar o painel de administração.</p>
                            </div>

                            <form method="POST" action="{{ route('admin.login') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" required="">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Senha</label>
                                    <input class="form-control" type="password" required="" id="password" name="password">
                                </div>

                                <div class="form-group mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                        <label class="custom-control-label" for="checkbox-signin">Lembre de min</label>
                                    </div>
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-secondary btn-block" type="submit">{{ __('Entrar') }}</button>

                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

@endsection
