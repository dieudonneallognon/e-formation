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
                <h3 class="logo-text mb-2">{{ env('APP_NAME') }}</h3>
                <p class="mb-6">Entrez vos identifiants utilisateurs.</p>
            </div>
            <!-- Form -->
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <!-- Username -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" class="form-control text-black @error('email') is-invalid @enderror"
                        name="email" placeholder="ex: john.doe@mail.com" required value="{{ old('email') }}">
                    @error('email')
                        <x-form-feedback type="invalid" :message="$message" />
                    @enderror
                </div>
                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" placeholder="**************" required>
                    @error('password')
                        <x-form-feedback type="invalid" :message="$message" />
                    @enderror
                </div>
                <!-- Checkbox -->
                <div class="d-lg-flex justify-content-between align-items-center mb-4">
                    <div class="form-check custom-checkbox">
                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
                        <label class="form-check-label" for="remember_me">Se souvenir de moi</label>
                    </div>
                </div>
                <div>
                    <!-- Button -->
                    <div class="d-grid my-5">
                        <button type="submit" class="btn btn-lg rounded-pill
                        btn-primary">Se
                            connecter</button>
                    </div>

                    <div class="d-md-flex justify-content-between mt-4">
                        <div class="mb-2 mb-md-0">
                            <a href="{{ route('register') }}" class="fs-5">Devenir
                                formateur !</a>
                        </div>
                        <div>
                            <a href="{{ route('password.request') }}" target="_blank" class="text-inherit fs-5">Mot de
                                passe oublié
                                ?</a>
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
