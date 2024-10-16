@extends('admin.dashboard')

@section('content')
<div class="container">
    <h1>Liste des Colis</h1>
   

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Contenus</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Nom du Client</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($colis as $coli)
            <tr>
                <td>{{ $coli->contenus }}</td>
                <td>{{ $coli->prix }}</td>
                <td>{{ $coli->quantité }}</td>
                <td>{{ $coli->nom_client }}</td>
                <td>{{ $coli->tel_client }}</td>
                <td>{{ $coli->email_client }}</td>
                <td>{{ $coli->status }}</td>
                <td>
                    <a href="{{ route('colis.edit', $coli->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                    <form action="{{ route('colis.destroy', $coli->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
