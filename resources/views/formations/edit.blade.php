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
                                        <input type="text" id="textInput"
                                            class="form-control @error('designation') is-invalid @enderror"
                                            name="designation" placeholder="Désingation"
                                            value="{{ $formation->designation }}">
                                        @error('designation')
                                        <x-form-feedback type="invalid" :message="$message" />
                                        @enderror
                                    </div>
                                    <!-- Input -->
                                    <div class="mb-3">
                                        <label class="form-label" for="textInput">Image</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                            name="image" accept="image/png image/jpg image/jpeg">
                                        @error('image')
                                        <x-form-feedback type="invalid" :message="$message" />
                                        @enderror
                                    </div>
                                    <!-- Text Area -->
                                    <div class="mb-3">
                                        <label class="form-label" for="textareaInput">Description</label>
                                        <textarea name="description" id="description"
                                            class="form-control @error('description') is-invalid @enderror"
                                            placeholder="Détail de la formation ici..."
                                            rows="4">{!! $formation->description !!}</textarea>
                                        @error('description')
                                        <x-form-feedback type="invalid" :message="$message" />
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Prix(€)</label>
                                        <input class="form-control @error('price') is-invalid @enderror" type="number"
                                            min="0" step="0.10" value="0" name="price"
                                            value="{{ $formation->price }}" />
                                        @error('price')
                                        <x-form-feedback type="invalid" :message="$message" />
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nombre de
                                            chapitre</label>
                                        <input id="chapter-nb"
                                            class="form-control @error('chapters') is-invalid @enderror" type="number"
                                            min="1" step="1" value="{{ $formation->chapters->count() }}" />

                                        @error('chapters')
                                        <x-form-feedback type="invalid" :message="$message" />
                                        @enderror
                                    </div>
                                    <div id="chapter-zone">
                                        <!-- Input -->
                                        @foreach ($formation->chapters as $chapter)
                                        <div class="mb-3">
                                            <label class="form-label" for="textInput">Chapitre
                                                {{ $loop->index + 1 }}</label>
                                            <input type="text" id="textInput" class="form-control" name="chapters[]"
                                                value="{{ $chapter->title }}" placeholder="Titre du chapitre...">
                                        </div>
                                        @endforeach
                                    </div>
                                    <p><label>Catégories</label></p>
                                    <!-- Select Option -->
                                    @error('categories')
                                    <p class="invalid-feedback d-block">{{ $message }}</p>
                                    @enderror
                                    @foreach ($categories as $category)
                                    <div class="form-check form-check-inline">
                                        <input name="categories[]" class="form-check-input" type="checkbox"
                                            id="inlineCheckbox1" value="{{ $category->id }}">
                                        <label class="form-check-label" for="inlineCheckbox1">{{ $category->name
                                            }}</label>
                                    </div>
                                    @endforeach
                                    <div class="col-12 my-3 text-center">
                                        <button id='submit-form' class="btn btn-primary" type="submit">Modifier la
                                            formation</button>
                                    </div>
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


@section('scripts')
<script src="https://cdn.tiny.cloud/1/4741oc33ybtlzv6rsed459tfil3q25ivwfmvcieq3g5wocus/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
<script>
    window.addEventListener('load', (event) => {
        tinymce.init({
            selector: '#description'
        });
    });
</script>

<script>
    document.getElementById('chapter-nb').addEventListener('change', (event) => {
        const chapterNb = event.currentTarget.value;
        const chapterZone = document.getElementById('chapter-zone');

        chapterZone.innerHTML = '';

        for (let i = 1; i <= chapterNb; i++) {
            chapterZone.innerHTML += `<div class="mb-3">
                                                <label class="form-label" for="textInput">Chapitre ${i}</label>
                                                <input type="text" id="textInput" class="form-control" name="chapters[]"
                                                    placeholder="Titre du chapitre...">
                                            </div>`;
        }
    });
</script>
@endsection
