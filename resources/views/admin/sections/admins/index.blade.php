@extends('admin.dashboard')

@section('content')
    <h1>Liste des administrateurs</h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Button on the left -->
        <a href="{{ route('admins.create') }}" class="btn btn-primary">Ajouter un nouvel administrateur</a>

        <!-- Search form on the right -->
        <form method="GET" action="{{ route('admins.index') }}" class="d-flex">
            <input class="form-control me-2" type="search" name="search" placeholder="Rechercher par nom ou email" value="{{ $search ?? '' }}">
            <button class="btn btn-outline-success" type="submit">Rechercher</button>
        </form>
    </div>

    <!-- Tableau des administrateurs -->
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
            @foreach($admins as $admin)
                <tr>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->role }}</td>
                    <td>
                        <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                        <form action="{{ route('admins.destroy', $admin->id) }}" method="POST" style="display:inline-block;">
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
