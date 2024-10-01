@extends('layouts.app')

@section('title', 'Liste des Articles')

@section('content')
    <h1 class="mb-4">Liste des Articles</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($articles as $article)
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <img src="{{ $article->image ? asset('storage/' . $article->image) : 'https://via.placeholder.com/150' }}" class="card-img-top" alt="{{ $article->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ Str::limit($article->content, 100) }}</p>
                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $articles->links() }}
@endsection
