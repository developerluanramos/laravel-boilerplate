@component('mail::message')
    # Convite para Cadastro

    Você está sendo convidado(a) para se cadastrar no Sistema de Frequência.

    {{$token}}

    O link expira em: {{ $expiresIn }}

    Caso não tenha solicitado este convite, ignore este email.

    @component('mail::button', ['url' => $registerUrl.'?token='.$token])
        Aceitar Convite
    @endcomponent
@endcomponent
