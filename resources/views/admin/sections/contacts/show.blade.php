@extends('admin.dashboard')

@section('content')
<div class="container">
    <h1>Détails du contact</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nom: {{ $contact->name }}</h5>
            <p class="card-text">Email: {{ $contact->email }}</p>
            <p class="card-text">Sujet: {{ $contact->subject }}</p>
            <p class="card-text">Message: {{ $contact->message }}</p>
            <a href="{{ route('contacts.index') }}" class="btn btn-primary">Retour à la liste</a>
            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
            </form>

        </div>
    </div>
</div>
@endsection
