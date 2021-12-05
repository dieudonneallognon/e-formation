@extends('layouts.admin.base')

@section('container')
<div class="container">
    <div class="row my-5">
        @if ($errors->any())
        <div class="col-12 my-2">
            <x-alert type="danger" message="Veillez à bien remplir le formulaire" />
        </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="card mb-3">
                    <img src="{{ asset($formation->image) }}"
                        height="800px" class="card-img-bottom" alt="...">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form id="edit-formation" method="POST" action="{{ route('user.formations.update',
                                    ['formation' => $formation->id, 'id' => $formation->id]) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <!-- Input -->
                                    <div class="mb-3">
                                        <label class="form-label" for="textInput">Désignation</label>
                                        <div>
                                            <p>{{ $formation->designation }}</p>
                                        </div>
                                    </div>
                                    <!-- Text Area -->
                                    <div class="mb-3">
                                        <label class="form-label" for="textareaInput">Description</label>
                                        <div>{!! $formation->description !!}</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Prix: <strong>{{ $formation->price }} €</strong></label>
                                    </div>

                                    <div id="chapter-zone">
                                        <!-- Input -->
                                        <div class="mb-3">
                                            <label class="form-label">Chapitres</label>
                                        </div>
                                        <div class="mb-3">
                                            <ol>
                                                @foreach ($formation->chapters as $chapter)
                                                        <li>{{ $chapter->title }}</li>
                                                @endforeach
                                            </ol>
                                        </div>

                                    </div>
                                    <p><label>Catégories</label></p>
                                    <!-- Select Option -->
                                    <ul>
                                        @foreach ($categories as $category)
                                            <li>{{ $category->name }}</li>
                                        @endforeach
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
