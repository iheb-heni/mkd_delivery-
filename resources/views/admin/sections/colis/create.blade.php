@extends('admin.dashboard')

@section('content')
<div class="container">
    <h1>Ajouter un nouveau Colis</h1>

    <form action="{{ route('colis.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="contenus" class="form-label">Contenus</label>
            <input type="text" class="form-control" id="contenus" name="contenus" required>
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="number" class="form-control" id="prix" name="prix" required>
        </div>
        <div class="mb-3">
            <label for="quantité" class="form-label">Quantité</label>
            <input type="text" class="form-control" id="quantité" name="quantité" required>
        </div>
        <div class="mb-3">
            <label for="nom_client" class="form-label">Nom du Client</label>
            <input type="text" class="form-control" id="nom_client" name="nom_client" required>
        </div>
        <div class="mb-3">
            <label for="tel_client" class="form-label">Téléphone</label>
            <input type="number" class="form-control" id="tel_client" name="tel_client" required>
        </div>
        <div class="mb-3">
            <label for="email_client" class="form-label">Email</label>
            <input type="email" class="form-control" id="email_client" name="email_client" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control" id="status" name="status" required>
        </div>
        <button type="submit" class="btn btn-success">Ajouter Colis</button>
    </form>
</div>
@endsection
