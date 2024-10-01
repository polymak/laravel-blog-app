@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <h1 class="mb-4">Accueil</h1>

    <div class="row">
        @foreach($articles->take(6) as $article)
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <img src="{{ $article->image ? asset('storage/' . $article->image) : 'https://via.placeholder.com/150' }}" class="card-img-top" alt="{{ $article->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ Str::limit($article->content, 100) }}</p>
                        <p class="card-text mb-1"><strong>Catégorie:</strong> <span class="badge bg-secondary">{{ $article->category->name }}</span></p>
                        <p class="card-text"><strong>Date de publication:</strong> <span class="text-muted">{{ $article->created_at->format('d M Y') }}</span></p>
                        <a href="{{ route('articles.show', $article) }}" class="btn btn-primary">Voir l'article</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
