@extends('layouts.base')

@section('body')
    <div class="container-fluid px-6 py-4">
        <!-- row -->

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 my-5">
                <!-- Bg -->
                <div class="pt-20 rounded-top"
                    style="background: url(../assets/images/background/profile-cover.jpg) no-repeat;background-size: cover;">
                </div>
                <div class="bg-white rounded-bottom smooth-shadow-sm ">
                    <div class="d-flex align-items-center justify-content-between
                      pt-4 pb-6 px-4">
                        <div class="d-flex align-items-center">
                            <!-- avatar -->
                            <div
                                class="avatar-xxl avatar-indicators avatar-online me-2
                          position-relative d-flex justify-content-end
                          align-items-end mt-n10">
                                <img src="../assets/images/avatar/avatar-1.jpg"
                                    class="avatar-xxl
                            rounded-circle border border-4 border-white-color-40"
                                    alt="">
                                <a href="#!" class="position-absolute top-0 right-0 me-2" data-bs-toggle="tooltip"
                                    data-placement="top" title="" data-original-title="Verified" data-bs-original-title="">
                                    <img src="../assets/images/svg/checked-mark.svg" alt="" width="30" height="30">
                                </a>
                            </div>
                            <!-- text -->
                            <div class="lh-1">
                                <h2 class="mb-0">
                                    <span
                                        style="font-weight: bold">{{ auth()->user()->lastName }}</span>&nbsp;{{ auth()->user()->firstName }}
                                    <a href="#!" class="text-decoration-none" data-bs-toggle="tooltip" data-placement="top"
                                        title="" data-original-title="Beginner" data-bs-original-title="">

                                    </a>
                                </h2>
                                <p class="mb-0 d-block">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('user.formations.index') }}"
                                class="btn btn-outline-primary d-none d-md-block">Tableau de bord</a>
                        </div>
                    </div>
                    <!-- nav -->
                </div>
            </div>
        </div>


        <!-- row -->
        <div class="row">

            @if (session()->has('success'))
                <div class="col-12">
                    <x-alert type="success" message="Votre profil a été mis à jour" />
                </div>
            @endif

            @if ($errors->any())
                <div class="col-12">
                    <x-alert type="danger" message="Veillez à bien remplir le formulaire" />
                </div>
            @endif

            <div class="col-12 mb-6">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="mb-6">
                            <h4 class="mb-1">Email</h4>
                        </div>
                        <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')



                            <!-- row -->
                            <div class="mb-3 row">
                                <!-- label -->
                                <label for="newEmailAddress" class="col-sm-4 col-form-label form-label">Nouvelle addresse
                                    Email</label>
                                <div class="col-md-8 col-12">
                                    <!-- input -->
                                    <input name="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" placeholder="Nouveau mail"
                                        id="newEmailAddress" required value="{{ old('email', auth()->user()->email) }}">
                                    @error('email')
                                        <x-form-feedback type="invalid" :message="$message" />
                                    @enderror
                                </div>
                                <!-- button -->
                                <div class="offset-md-4 col-md-8 col-12 mt-3">
                                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                </div>
                            </div>
                        </form>

                        <div class="mb-6 mt-6">
                            <h4 class="mb-1">Changement de mot de passe</h4>

                        </div>
                        <form action="{{ route('user.profile.password-update') }}" method="POST">
                            <!-- row -->
                            @csrf
                            @method('PUT')
                            <div class="mb-3 row">
                                <label for="currentPassword" class="col-sm-4 col-form-label form-label">Mot de passe
                                    actuel</label>

                                <div class="col-md-8 col-12">
                                    <input name="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Mot de passe" id="currentPassword" required>
                                    @error('password')
                                        <x-form-feedback type="invalid" :message="$message" />
                                    @enderror
                                </div>
                            </div>
                            <!-- row -->
                            <div class="mb-3 row">
                                <label for="currentNewPassword" class="col-sm-4 col-form-label form-label">Nouveau mot de
                                    passe</label>

                                <div class="col-md-8 col-12">
                                    <input name="new_password" type="password"
                                        class="form-control @error('new_password') is-invalid @enderror"
                                        placeholder="Nouveau mot de passe" id="currentNewPassword" required>
                                    @error('new_password')
                                        <x-form-feedback type="invalid" :message="$message" />
                                    @enderror
                                </div>
                            </div>
                            <!-- row -->
                            <div class="row align-items-center">
                                <label for="confirmNewpassword" class="col-sm-4 col-form-label form-label">Confirmation du
                                    mot
                                    de passe</label>
                                <div class="col-md-8 col-12 mb-2 mb-lg-0">
                                    <input name="new_password_confirmation" type="password"
                                        class="form-control @error('new_password') is-invalid @enderror"
                                        placeholder="Nouveau mot de passe" id="confirmNewpassword" required>
                                </div>
                                <!-- list -->
                                <div class="offset-md-4 col-md-8 col-12 mt-4">
                                    {{-- <h6 class="mb-1">Password requirements:</h6>
                                    <p>Ensure that these requirements are met:</p>
                                    <ul>
                                        <li> Minimum 8 characters long the more, the better</li>
                                        <li>At least one lowercase character</li>
                                        <li>At least one uppercase character</li>
                                        <li>At least one number, symbol, or whitespace character
                                        </li>
                                    </ul> --}}
                                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
