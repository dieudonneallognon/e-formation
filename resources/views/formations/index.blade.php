@extends('layouts.admin.base')

@section('container')
    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mb-2 mb-lg-0">
                            @auth
                                @if (auth()->user()->isAdmin())
                                    <h3 class="mb-0 fw-bold text-white">Formations</h3>
                                @else
                                    <h3 class="mb-0 fw-bold text-white">Mes Formations</h3>
                                @endif
                            @endauth

                            @guest
                                    <h3 class="mb-0 fw-bold text-white">Formations</h3>
                            @endguest
                        </div>
                        @auth
                            <div>
                                <a href="{{ route('user.formations.create') }}" class="btn btn-white">Ajouter une
                                    formation</a>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
            @auth
                <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
                    <!-- card -->
                    <div class="card rounded-3">
                        <!-- card body -->
                        <div class="card-body">
                            <!-- heading -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="mb-0">Formations</h4>
                                </div>
                                <div class="icon-shape icon-md bg-light-primary text-primary rounded-1">
                                    <i class="bi bi-briefcase fs-4"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div>
                                @isset($formations)
                                    <h1 class="fw-bold">{{ $formations->count() }}</h1>
                                @endisset
                                @isset($category)
                                    <h1 class="fw-bold">{{ $formations->count() }}</h1>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
                    <!-- card -->
                    <div class="card rounded-3">
                        <!-- card body -->
                        <div class="card-body">
                            <!-- heading -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="mb-0">Categories</h4>
                                </div>
                                <div class="icon-shape icon-md bg-light-primary text-primary rounded-1">
                                    <i class="bi bi-list-task fs-4"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div>
                                <h1 class="fw-bold">{{ $categories->count() }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
        <!-- row  -->
        <div class="row mt-6">
            <!-- table  -->
            <div class="card-body">
                <div class="row">
                    @isset($formations)
                        @forelse ($formations as $formation)
                            <div class="col-xl-4 col-lg-6 col-md-12 col-12 mt-6 my-5">
                                <div class="card position-relative">
                                    <img src="{{
                                    Str::contains($formation->image, 'http')
                                    ? asset("$formation->image")
                                    : asset("storage/$formation->image") }}"
                                    height="400px" class="card-img-top"
                                        alt="{{ $formation->designation }}">

                                    <span class="badge rounded-pill bg-primary position-absolute fs-5 shadow"
                                        style="top: 5px; right: 5px;">{{ $formation->price }} €</span>
                                    <div class="card-body text-center">
                                        <h5 style="min-height: 45px;" class="card-title fw-bolder fs-4 my-2">{{ $formation->designation }}</h5>
                                        <a href="{{ route('formations.show', ['formation' => $formation->id]) }}" class="btn btn-primary">
                                            <i class="bi bi-eye-fill"></i>&nbsp;Suivre
                                        </a>
                                        @auth
                                            @if ($formation->user()->is(auth()->user()))
                                                <a href="{{ route('user.formations.edit', ['formation' => $formation->id]) }}"
                                                    class="btn btn-primary">
                                                    <span class="bi bi-pen-fill"></span> Editer</a>
                                                <a id="formation-delete"
                                                    href="{{ route('user.formations.destroy', ['formation' => $formation->id]) }}"
                                                    class="btn btn-primary">
                                                    <span class="bi bi-trash-fill"></span> Retirer</a>
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        @empty
                                <h1 class="text-muted my-4 text-center">Aucune formation n'est disponible ou ne correspond à votre recherche !</h1>
                        @endforelse
                    @endisset

                </div>

                {{-- <p href="#">{{ $formations->links() }}</p> --}}
            </div>
            <!-- card footer  -->


        </div>
    </div>
    {{-- @if ($formations->links())
    <div class="row">
        <div class="col-12">
            {{ $formations->links() }}
        </div>
    </div>
    @endif --}}
@endsection
