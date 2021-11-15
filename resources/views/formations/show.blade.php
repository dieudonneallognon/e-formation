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
                    <img src="@if (Str::contains($formation->image, 'https')){{ asset($formation->image) }}@else{{ asset('storage/' . $formation->image) }}@endif"
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
                                        <input readonly type="text" id="textInput" class="form-control disabled"
                                            name="designation" placeholder="Désingation"
                                            value="{{ $formation->designation }}">
                                    </div>
                                    <!-- Text Area -->
                                    <div class="mb-3">
                                        <label class="form-label" for="textareaInput">Description</label>
                                        <textarea readonly name="description" id="description"
                                            class="form-control disabled @error('description') is-invalid @enderror"
                                            placeholder="Détail de la formation ici..."
                                            rows="4">{!! $formation->description !!}</textarea>

                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Prix(€)</label>
                                        <input readonly class="form-control disabled" type="number" min="0" step="0.10"
                                            value="0" name="price" value="{{ $formation->price }}" />

                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nombre de
                                            chapitre</label>
                                    </div>
                                    <div id="chapter-zone">
                                        <!-- Input -->
                                        @foreach ($formation->chapters as $chapter)
                                        <div class="mb-3">
                                            <label class="form-label" for="textInput">Chapitre
                                                {{ $loop->index + 1 }}</label>
                                            <input type="text" id="textInput" class="form-control disabled"
                                                name="chapters[]" value="{{ $chapter->title }}"
                                                placeholder="Titre du chapitre...">
                                        </div>
                                        @endforeach
                                    </div>
                                    <p><label>Catégories</label></p>
                                    <!-- Select Option -->
                                    @foreach ($categories as $category)
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineCheckbox1">{{ $category->name
                                            }}</label>
                                    </div>
                                    @endforeach
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
