@extends('layouts.email')

@section('greeting')
    <h2>Bonjour {{ $firstName }},</h2>
@endsection

@section('content')
    Votre demande d'accès pour un compte en tant que formateur vient d'être acceptée.
    <br>
    Vos identifiants:
    <br>
    Email: <span style="color: #5340d9">{{ $email }}</span>
    <br>
    Mot de passe: <span style="color: #5340d9">{{ $password }}</span>
@endsection


@section('btn-link')
    <a target='_blank' href='{{ route('user.formations.index') }}' class='link2'
        style='color:#ffffff; background:#5340d9'>
        Accéder à mon compte
    </a>
@endsection

@section('link')
    Cliquer sur le lien si le bouton ne fonctionne pas :
    <a target='_blank' href='{{ route('user.formations.index') }}' class='link2' style='color:#5340d9'>
        {{ route('user.formations.index') }}
    </a>
@endsection
