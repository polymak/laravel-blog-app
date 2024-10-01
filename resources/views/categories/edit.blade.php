@extends('layouts.app')

@section('title', 'Modifier la Catégorie')

@section('content')
    <h1 class="mb-4">Modifier la Catégorie</h1>
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom de la Catégorie</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required>
        </div>
        <button type="submit" class="btn btn-warning">Mettre à Jour</button>
    </form>
@endsection
