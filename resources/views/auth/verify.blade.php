@extends('layouts.app')

@section('content')
<div class="container pb-5 pt-5">
    <div class="row justify-content-center pb-5 pt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu correo!') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Hemos enviado un enlace a tu correo electronico.') }}
                        </div>
                    @endif

                    {{ __('Antes de proceder, por favor verifica tu cuenta de correo.') }}
                    {{ __('¿No has recibido el correo de confirmacion?') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Haz click aqui para reenviar el correo') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
