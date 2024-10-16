@extends('admin.dashboard')

@section('content')
<div class="container">
    <h1>Modifier le Colis</h1>

    <!-- Success or error message -->

    <form action="{{ route('colis.update', $coli->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="contenus" class="form-label">Contenus</label>
            <input type="text" class="form-control" id="contenus" name="contenus" value="{{ $coli->contenus }}" required>
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="number" class="form-control" id="prix" name="prix" value="{{ $coli->prix }}" required>
        </div>

        <div class="mb-3">
            <label for="quantite" class="form-label">Quantité</label>
            <input type="text" class="form-control" id="quantite" name="quantité" value="{{ $coli->quantité }}" required>
        </div>

        <div class="mb-3">
            <label for="nom_client" class="form-label">Nom du Client</label>
            <input type="text" class="form-control" id="nom_client" name="nom_client" value="{{ $coli->nom_client }}" required>
        </div>

        <div class="mb-3">
            <label for="tel_client" class="form-label">Téléphone du Client</label>
            <input type="number" class="form-control" id="tel_client" name="tel_client" value="{{ $coli->tel_client }}" required>
        </div>

        <div class="mb-3">
            <label for="email_client" class="form-label">Email du Client</label>
            <input type="email" class="form-control" id="email_client" name="email_client" value="{{ $coli->email_client }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Statut</label>
            <input type="text" class="form-control" id="status" name="status" value="{{ $coli->status }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('colis.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
