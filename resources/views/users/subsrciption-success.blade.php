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
                    <h1 class="display-4 fw-bold">Accès formateur accordé !</h1>
                    <p class="mb-4">Une demande d'accès pour un compte a été faite et viens d'être validée par
                        vous.<br> Vous pouvez fermer cette pade ou accéder à votre tableau de bord.</p>
                    <!-- button -->
                    <a href="{{ route('admin.formations.index') }}" class="btn btn-primary">
                        <i class="bi bi-house"></i>
                        Tableau de bord
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
