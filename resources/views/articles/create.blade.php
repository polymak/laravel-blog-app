@extends('layouts.app')

@section('title', 'Publier un Article')

@section('content')
    <h1 class="mb-4 text-center">Publier un Nouvel Article</h1>
    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data" class="container">
        @csrf
        <div class="mb-4">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-4">
            <label for="content" class="form-label">Contenu</label>
            <textarea name="content" id="content" class="form-control" required></textarea>
        </div>
        <div class="mb-4">
            <label for="image" class="form-label">Image (JPEG, JPG, GIF, WEBP)</label>
            <input type="file" name="image" id="image" class="form-control" accept=".jpeg,.jpg,.gif,.webp">
        </div>
        <div class="mb-4">
            <label for="category_id" class="form-label">Catégorie</label>
            <select name="category_id" id="category_id" class="form-select" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Publier</button>
    </form>
@endsection
