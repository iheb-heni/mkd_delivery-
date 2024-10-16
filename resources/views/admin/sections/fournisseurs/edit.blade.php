@extends('admin.dashboard')

@section('content')
<div class="container">
    <h1>Modifier le fournisseurs</h1>

    <form action="{{ route('fournisseurs.update', $fournisseur->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $fournisseur->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $fournisseur->email }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe (Haché)</label>
            <input type="text" class="form-control" id="hashed_password" value="{{ $fournisseur->password }}" readonly>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Nouveau mot de passe (optionnel)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmer le nouveau mot de passe</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-success">Mettre à jour l'fournisseurr</button>
    </form>
</div>
@endsection
