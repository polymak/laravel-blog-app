@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <div class="container mt-5">
        <h1 class="text-left mb-4" style="font-weight: 900;">{{ $article->title }}</h1>
        @if($article->image)
            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="img-fluid mb-4">
        @endif
        <div class="content">
            <p style="font-size: 21px;">{{ $article->content }}</p>
        </div>
        <div class="mt-4">
            <p><strong>Catégorie:</strong> {{ $article->category->name }}</p>
            <p><strong>Date de publication:</strong> {{ $article->created_at->format('d M Y') }}</p>
        </div>
    </div>
@endsection
