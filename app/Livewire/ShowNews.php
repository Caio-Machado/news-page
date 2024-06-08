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
        $this->searchResult = Article::search($this->searchString)->paginate(6);
        $this->paginationLinks = $this->searchResult->linkCollection();
        $this->articles = $this->searchResult->items();
    }

    public function render()
    {
        return view('livewire.show-news', [
            'articles' => $this->articles,
            'searchString' => $this->searchString
        ]);
    }
}
