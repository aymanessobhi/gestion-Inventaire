@extends('layouts.app')

@section('content')
<!-- BEGIN: Header -->
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                        Rapport d'achat
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END: Header -->

<!-- BEGIN: Contenu principal de la page -->
<div class="container-xl px-2 mt-n10">
    <form action="{{ route('purchases.getPurchaseReport') }}" method="POST">
        @csrf
        <div class="row">

            <div class="col-xl-12">
                <!-- BEGIN: Détails du rapport d'achat -->
                <div class="card mb-4">
                    <div class="card-header">
                        Détails du rapport d'achat
                    </div>
                    <div class="card-body">
                        <!-- Ligne du formulaire -->
                        <div class="row gx-3 mb-3">
                            <!-- Groupe de formulaire (date de début) -->
                            <div class="col-md-6">
                                <label class="small my-1" for="start_date">Date de début <span class="text-danger">*</span></label>
                                <input class="form-control form-control-solid example-date-input @error('start_date') is-invalid @enderror" name="start_date" id="date" type="date" value="{{ old('start_date') }}">
                                @error('purchase_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!-- Groupe de formulaire (date de fin) -->
                            <div class="col-md-6">
                                <label class="small my-1" for="end_date">Date de fin <span class="text-danger">*</span></label>
                                <input class="form-control form-control-solid example-date-input @error('end_date') is-invalid @enderror" name="end_date" id="date" type="date" value="{{ old('end_date') }}">
                                @error('end_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Bouton de soumission -->
                        <button class="btn btn-primary" type="submit">Enregistrer</button>
                        <a class="btn btn-danger" href="{{ URL::previous() }}">Annuler</a>
                    </div>
                </div>
                <!-- END: Détails du rapport d'achat -->
            </div>
        </div>
    </form>
</div>
<!-- END: Contenu principal de la page -->
@endsection
