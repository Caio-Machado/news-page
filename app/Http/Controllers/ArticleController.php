<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index_by_user()
    {
        $articles = Auth::user()::with('articles')->get();
        return view('dashboard', compact('articles'));
    }

    public function show(string $id)
    {
        $article = Article::findOrFail($id);
        return view('article', compact('article'));
    }

    public function edit(string $id)
    {
        $record = Article::find($id); // Replace $id with the ID of the record you want to delete

        if ($record) {
            // Delete the record
            return view('edit-article', compact('record'));
        }
    }

    public function delete(string $id)
    {
        $record = Article::find($id); // Replace $id with the ID of the record you want to delete

        if ($record) {
            // Delete the record
            $record->delete();
        }

        return back()->withInput();;
    }

    public function create(Request $request) 
    {
        // Obter o ID do usuário autenticado
        $userId = Auth::id();

        // Salvar a imagem no servidor
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        // Criar o artigo associado ao usuário autenticado
        $article = Article::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
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
