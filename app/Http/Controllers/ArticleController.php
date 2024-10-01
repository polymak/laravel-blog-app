<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function home()
    {
        $articles = Article::with('category')->paginate(3);
        return view('home', compact('articles'));
    }

    public function liste_article()
    {
        $articles = Article::paginate(3); // Remplacez 3 par le nombre d'articles par page
        return view('articles.liste', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,gif,webp|max:2048', // Acceptation des formats spécifiques
            'category_id' => 'required|exists:categories,id',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('images', 'public') : null;

        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('articles.liste')->with('success', 'Article créé avec succès.');
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,gif,webp|max:2048', // Acceptation des formats spécifiques
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->file('image')) {
            Storage::disk('public')->delete($article->image); // Suppression de l'ancienne image
            $imagePath = $request->file('image')->store('images', 'public');
            $article->image = $imagePath;
        }

        $article->title = $request->title;
        $article->content = $request->content;
        $article->category_id = $request->category_id;
        $article->save();

        return redirect()->route('articles.liste')->with('success', 'Article mis à jour avec succès.');
    }

    public function destroy(Article $article)
    {
        Storage::disk('public')->delete($article->image); // Suppression de l'image
        $article->delete();
        return redirect()->route('articles.liste')->with('success', 'Article supprimé avec succès.');
    }

    public function show($id)
    {
        $article = Article::with('category')->findOrFail($id);
        return view('articles.show', compact('article'));
    }

}
