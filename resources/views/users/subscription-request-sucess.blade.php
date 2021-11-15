@extends('layouts.base')

@section('body')
    <div class="container min-vh-100 d-flex justify-content-center
      align-items-center">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-12">
                <!-- content -->
                <div class="text-center">
                    <!-- text -->
                    <h1 class="display-4 fw-bold">Demande de compte Formateur envoyée !</h1>
                    <p class="mb-4">Votre demande d'accès pour un compte a été faite et sera traitée.
                        <br> Vous pouvez fermer cette pade ou accéder à la liste des formations.
                    </p>
                    <!-- button -->
                    <a href="{{ route('formations.index') }}" class="btn btn-primary">
                        <i class="bi bi-arrow-left-short"></i>
                        Consulter les formations
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
