@extends('layouts.app-auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifikujte svoju E-mailovú adresu') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Verifikačný link bol zaslaný na vašu E-mailovú adresu.') }}
                        </div>
                    @endif

                    {{ __('Pred tým ako odídete, pozrite svoju E-mailovú schránku') }}
                    {{ __('Ak ste nedostali mail') }}, <a href="{{ route('verification.resend') }}">{{ __('Zaslať verifikačný link znova') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
