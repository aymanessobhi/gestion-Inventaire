@extends('layouts.app')

@section('content')
<!-- BEGIN: En-tête -->
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="fa-solid fa-folder"></i></div>
                        Ajouter une unité
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END: En-tête -->
<!-- BEGIN: Contenu principal de la page -->
<div class="container-xl px-2 mt-n10">
    <form action="{{ route('units.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xl-12">
                <!-- BEGIN: Détails de l'unité -->
                <div class="card mb-4">
                    <div class="card-header">
                        Détails de l'unité
                    </div>
                    <div class="card-body">
                        <!-- Groupe de formulaire (name) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="name">Nom de l'unité <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="" value="{{ old('name') }}" autocomplete="off" />
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Groupe de formulaire (slug) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="slug">Slug de l'unité (non modifiable).</label>
                            <input class="form-control form-control-solid @error('slug') is-invalid @enderror" id="slug" name="slug" type="text" placeholder="" value="{{ old('slug') }}" readonly />
                            @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
    
                        <!-- Bouton de soumission -->
                        <button class="btn btn-primary" type="submit">Ajouter</button>
                        <a class="btn btn-danger" href="{{ route('units.index') }}">Annuler</a>
                    </div>
                </div>
                <!-- END: Détails de l'unité -->
            </div>
        </div>
    </form>
</div>
<!-- END: Contenu principal de la page -->
<script>
    // Générateur de slug
    const title = document.querySelector("#name");
    const slug = document.querySelector("#slug");
    title.addEventListener("keyup", function() {
        let preslug = title.value;
        preslug = preslug.replace(/ /g,"-");
        slug.value = preslug.toLowerCase();
});
</script>
@endsection