@extends('layouts.auth')

@section('form')
    @if ($errors->any())
        <x-alert type="danger" message="Veillez à bien remplir le formulaire" />
    @endif
    <!-- Card -->
    <div class="card smooth-shadow-md">
        <!-- Card body -->
        <div class="card-body p-6">
            <div class="mb-4">
                <h3 class="logo-text mb-2">{{ env('APP_NAME') }}</h3>
                <p class="mb-6">Nous vous enverronsun mail pour changer votre mot de passe.
                </p>
            </div>
            <!-- Form -->
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        placeholder="ex: john.doe@mail.comm" required>
                    @error('email')
                        <x-form-feedback type="invalid" :message="$message" />
                    @enderror
                </div>
                <!-- Button -->
                <div class="my-5 d-grid">
                    <button type="submit" class="btn btn-lg rounded-pill btn-primary">
                        Réinitialiser le mot
                    </button>
                </div>
                <span>Pas de compte ?&nbsp;<a href="{{ route('register') }}">Je deviens formateur</a></span>
            </form>
        </div>
    </div>
@endsection
