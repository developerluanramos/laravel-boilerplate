@component('mail::message')
    # Convite para Cadastro

    Você está sendo convidado(a) para se cadastrar no Sistema de Frequência.

    @component('mail::button', ['url' => $registerUrl])
        Aceitar Convite
    @endcomponent

    O link expira em: {{ $expiresIn }}

    Caso não tenha solicitado este convite, ignore este email.
@endcomponent
