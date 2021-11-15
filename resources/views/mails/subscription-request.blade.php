@extends('layouts.email')

@section('greeting')
    <h2>Bonjour,</h2>
@endsection

@section('content')
    Une demande d'accès pour un compte en tant que formateur vient d'être envoyée par
    &nbsp;{{ $lastName }}&nbsp;{{ $firstName }}
@endsection


@section('btn-link')
    <a target='_blank' href='{{ $link }}' class='link2' style='color:#ffffff; background:#5340d9'>
        Ajouter en tant que formateur
    </a>
@endsection

@section('link')
    Cliquer sur le lien si le bouton ne fonctionne pas :
    <a target='_blank' href='{{ $link }}' class='link2' style='color:#5340d9'>
        {{ $link }}
    </a>
@endsection
