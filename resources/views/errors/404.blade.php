@extends('layouts.error')

@section('content')
    <div class="row">
        <!-- col -->
        <div class="col-12">
            <!-- content -->
            <div class="text-center">
                <div class="mb-3">
                    <!-- img -->
                    <img src="{{ asset('assets/images/error/404-error-img.png') }}" alt=""
                         class="img-fluid">
                </div>
                <!-- text -->
                <h1 class="display-4 fw-bold">Oops! Ressource non disponible.</h1>
                <p class="mb-4">La ressource que vous recherchée n'est pas disponible.</p>
                <!-- button -->
                <a href="{{ url()->previous() }}" class="btn btn-primary">Retour</a>
            </div>
        </div>
    </div>
@endsection
