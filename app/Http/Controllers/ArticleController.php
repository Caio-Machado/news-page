<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;

class ArticleController extends Controller
{
    public function show(string $id)
    {
        $article = Article::findOrFail($id);

        if ($article) 
        {
            return view('article', compact('article'));
        }

        return redirect()->route('home');
    }

    public function edit(Request $request, string $id)
    {
        if (!$article = Article::findOrFail($id))
        {
            return back();
        }

        $newData = $request->only(['title', 'description']);
        $imageName = null;
        if ($request->file('image'))
        {
            $request->file('image')->store('images', 'public');
            $imageName = $request->file('image')->hashName();
        }

        if ($imageName)
        {
            $newData['image'] = "images/".$imageName;
        }

        $article->update($newData);

        return back();
    }

    public function editPage(string $id)
    {
        $article = Article::findOrFail($id);

        if ($article) {
            if (Auth::user()->id == $article->user_id) {
                return view('edit-article', compact('article'));
            }
            return redirect()->route('home');
        }
        return redirect()->route('home');
    }

    public function delete(string $id)
    {
        $article = Article::find($id);

        if ($article) {
            $article->delete();
        }

        return redirect('/');
    }

    public function create(Request $request) 
    {
        $userId = Auth::id();

        $request->file('image')->store('images', 'public');
        $imageName = $request->file('image')->hashName();

        $article = Article::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => "images/".$imageName,
            'user_id' => $userId,
        ]);

        if ($article) {
            // Redirecionar para a rota do artigo recém-criado
            return redirect()->route('article.show', ['id' => $article->id])->with('success', 'Artigo criado com sucesso!');
        } else {
            return redirect()->route('create-article')->with('error', 'Erro ao criar o artigo.');
        }
    }
}
