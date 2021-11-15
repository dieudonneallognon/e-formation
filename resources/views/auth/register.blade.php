@extends('layouts.auth')

@section('form')
    @if ($errors->any())
        <x-alert type="danger" message="Veillez à bien remplir le formulaire" />
    @endif
    <!-- Card -->
    <div class="card smooth-shadow-md">
        <!-- Card body -->
        <div class="card-body p-5">
            <div class="mb-4">
                {{-- <a href="#"><img src="../assets/images/brand/logo/logo-primary.svg"
                    class="mb-2" alt=""></a> --}}
                <h3 class="logo-text mb-2">{{ env('APP_NAME') }}</h3>
                <p class="mb-6">Entrez vos identifiants utilisateurs.</p>
            </div>
            <!-- Form -->
            <form action="{{ route('register') }}" method="POST">
                @csrf

                <!-- LastName -->
                <div class="mb-3">
                    <label for="lastName" class="form-label">Nom</label>
                    <input type="text" id="lastName" class="form-control" name="lastName" placeholder="ex: DOE" required
                        value="{{ old('lastName') }}">
                    @error('lastName')
                        <x-form-feedback type="invalid" :message="$message" />
                    @enderror
                </div>

                <!-- FirstName -->
                <div class="mb-3">
                    <label for="firstName" class="form-label">Prénom</label>
                    <input type="text" id="firstName" class="form-control" name="firstName" placeholder="ex: John"
                        required value="{{ old('firstName') }}">
                    @error('firstName')
                        <x-form-feedback type="invalid" :message="$message" />
                    @enderror
                </div>

                <!-- Username -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" class="form-control" name="email" placeholder="ex: john@doe@mail.com"
                        required value="{{ old('email') }}">
                    @error('email')
                        <x-form-feedback type="invalid" :message="$message" />
                    @enderror
                </div>

                <div>
                    <!-- Button -->
                    <div class="d-grid my-5">
                        <button type="submit" class="btn btn-lg rounded-pill btn-primary">Demander un accès
                            Formateur</button>
                    </div>

                    <div class="d-md-flex justify-content-between mt-4">
                        <div class="mb-2 mb-md-0">
                            <a href="{{ route('login') }}" class="fs-5">J'ai un compte !</a>
                        </div>
                        <div>
                            <a href="{{ route('password.request') }}" class="text-inherit fs-5">Mot de passe oublié ?</a>
                        </div>
                    </div>

                    <div class="d-md-flex justify-content-center mt-4">
                        <div class="mb-2 mb-md-0">
                            <a href="{{ route('formations.index') }}" class="fs-5"> <i
                                    class="bi bi-arrow-left-short"></i>
                                Retourner aux formations</a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
