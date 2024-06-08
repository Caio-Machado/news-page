<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class ShowNews extends Component
{
    public $paginationLinks = [];
    public $articles;
    protected $searchResult;
    public $searchString = "";

    public function mount() 
    {
        $this->searchArticles();
    }

    public function searchArticles()
    {
        $query = Article::query();

        if (Route::current()->uri() == 'dashboard') {
            $query->where('user_id', Auth::id());
        }

        if ($this->searchString != "") {
            $query->where(function ($subQuery) {
                $subQuery->where('title', 'like', '%' . $this->searchString . '%')
                         ->orWhere('content', 'like', '%' . $this->searchString . '%');
            });
        }

        $this->searchResult = $query->orderBy('created_at', 'desc')->paginate(6);
        $this->paginationLinks = $this->searchResult->linkCollection();
        $this->articles = $this->searchResult->items();
        // dd($this->articles);
    }

    public function deleteArticle($articleId)
    {
        Http::delete("/article/delete/{$articleId}");
        $this->searchArticles();
    }

    public function editArticle($articleId)
    {
        return redirect()->to("/article/edit/{$articleId}");
    }

    public function render()
    {
        return view('livewire.show-news', [
            'articles' => $this->articles,
            'searchString' => $this->searchString
        ]);
    }
}
