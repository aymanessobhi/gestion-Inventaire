@extends('layouts.app')

@section('specificpagescripts')
<script src="{{ asset('assets/js/img-preview.js') }}"></script>
@endsection

@section('content')
<!-- BEGIN: Header -->
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="fa-solid fa-users"></i></div>
                        Modifier le client
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END: Header -->

<!-- BEGIN: Main Page Content -->
<div class="container-xl px-2 mt-n10">
    <form action="{{ route('customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Photo de profil</div>
                    <div class="card-body text-center">
                        <!-- Image de profil -->
                        <img class="img-account-profile mb-2" src="{{ $customer->photo ? asset('storage/customers/'.$customer->photo) : asset('assets/img/demo/user-placeholder.svg') }}" alt="" id="image-preview" />
                        <!-- Bloc d'aide pour la photo de profil -->
                        <div class="small font-italic text-muted mb-2">JPG ou PNG de taille maximale de 2 Mo</div>
                        <!-- Champ pour sélectionner une nouvelle photo de profil -->
                        <input class="form-control form-control-solid mb-2 @error('photo') is-invalid @enderror" type="file"  id="image" name="photo" accept="image/*" onchange="previewImage();">
                        @error('photo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <!-- BEGIN: Customer Details -->
                <div class="card mb-4">
                    <div class="card-header">
                        Détails du client
                    </div>
                    <div class="card-body">
                        <!-- Form Group (name) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="name">Nom <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="" value="{{ old('name', $customer->name) }}" />
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Form Group (email address) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="email">Adresse e-mail: <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('email') is-invalid @enderror" id="email" name="email" type="text" placeholder="" value="{{ old('email', $customer->email) }}" />
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Form Row -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="phone">Numéro de téléphone: <span class="text-danger">*</span></label>
                                <input class="form-control form-control-solid @error('phone') is-invalid @enderror" id="phone" name="phone" type="text" placeholder="" value="{{ old('phone', $customer->phone) }}" />
                                @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!-- Form Group (bank name) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="bank_name">Nom de la banque:</label>
                                <select class="form-select form-control-solid @error('bank_name') is-invalid @enderror" id="bank_name" name="bank_name">
                                    <option selected="" disabled="">Select a bank:</option>
                                    <option value="Attijari" @if(old('bank_name') == 'Attijari')selected="selected"@endif>Attijari</option>
                                    <option value="Barid Bank" @if(old('bank_name') == 'Barid Bank')selected="selected"@endif>Barid Bank</option>
                                    <option value="CIH" @if(old('bank_name') == 'CIH')selected="selected"@endif>CIH</option>
                                    <option value="BMCE" @if(old('bank_name') == 'BMCE')selected="selected"@endif>BMCE</option>
                                    <option value="CHAABI" @if(old('bank_name') == 'CHAABI')selected="selected"@endif>CHAABI</option>
                                </select>
                                @error('bank_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- Form Row -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (account holder) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="account_holder">Titulaire du compte:</label>
                                <input class="form-control form-control-solid @error('account_holder') is-invalid @enderror" id="account_holder" name="account_holder" type="text" placeholder="" value="{{ old('account_holder', $customer->account_holder) }}" />
                                @error('account_holder')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!-- Form Group (account_name) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="account_number">Numéro de compte:</label>
                                <input class="form-control form-control-solid @error('account_number') is-invalid @enderror" id="account_number" name="account_number" type="text" placeholder="" value="{{ old('account_number', $customer->account_number) }}" />
                                @error('account_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- Form Group (address) -->
                        <div class="mb-3">
                                <label for="address">Adresse: <span class="text-danger">*</span></label>
                                <textarea class="form-control form-control-solid @error('address') is-invalid @enderror" id="address" name="address" rows="3">{{ old('address', $customer->address) }}</textarea>
                                @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>

                        <!-- Submit button -->
                        <button class="btn btn-primary" type="submit">Mettre à jour</button>
                        <a class="btn btn-danger" href="{{ route('customers.index') }}">Annuler</a>
                    </div>
                </div>
                <!-- END: Customer Details -->
            </div>
        </div>
    </form>
</div>
<!-- END: Main Page Content -->
@endsection
