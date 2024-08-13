@extends('site.layouts.login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifique seu e-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Um novo link de verificação foi enviado ao seu e-mail') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, por favor confira seu e-mail.') }}
                    {{ __('Se você não recebeu o e-mail de confirmação') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Clique aqui para receber outro') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
