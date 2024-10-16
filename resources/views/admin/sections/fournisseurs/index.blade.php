@extends('admin.dashboard')

@section('content')
    <h1>Liste des fournisseurs</h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Button on the left -->
        <a href="{{ route('fournisseurs.create') }}" class="btn btn-primary">Ajouter un nouvel administrateur</a>

        <!-- Search form on the right -->
        <form method="GET" action="{{ route('fournisseurs.index') }}" class="d-flex">
            <input class="form-control me-2" type="search" name="search" placeholder="Rechercher par nom ou email" value="{{ $search ?? '' }}">
            <button class="btn btn-outline-success" type="submit">Rechercher</button>
        </form>
    </div>


    <!-- Tableau des fournisseurs -->
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fournisseurs as $fournisseur)
                <tr>
                    <td>{{ $fournisseur->name }}</td>
                    <td>{{ $fournisseur->email }}</td>
                    <td>{{ $fournisseur->role }}</td>
                    <td>
                        <a href="{{ route('fournisseurs.edit', $fournisseur->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                        <form action="{{ route('fournisseurs.destroy', $fournisseur->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
