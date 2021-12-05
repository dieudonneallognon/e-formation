@extends('layouts.error')

@section('content')
    <div class="row">
        <!-- col -->
        <div class="col-12">
            <!-- content -->
            <div class="text-center">
                <div class="mb-3">
                    <!-- img -->
{{--                    <img src="{{ asset('assets/images/error/404-error-img.png') }}" alt=""--}}
{{--                         class="img-fluid">--}}
                </div>
                <!-- text -->
                <h1 class="display-4 fw-bold">Oops! Accès non authorisé.</h1>
                <p class="mb-4">Vous n'avez pas les droits nécéssaires pour accéder à la ressource.</p>
                <!-- button -->
                <a href="{{ url()->previous() }}" class="btn btn-primary">Retour</a>
            </div>
        </div>
    </div>
@endsection
