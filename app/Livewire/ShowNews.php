<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class ShowNews extends Component
{
    public $all_articles;
    public $articles;
    public $searchString = "";

    public function mount() 
    {
        $this->all_articles = Article::with('author')->orderBy('created_at', 'desc')->get();
        $this->articles = $this->all_articles;
    }

    public function searchArticles() 
    {
        if ($this->searchString != "")
        {
            $this->articles = Article::search($this->searchString)->get();
        }
        else 
        {
            $this->articles = $this->all_articles;
        }
    }

    public function render()
    {
        return view('livewire.show-news', [
            'articles' => $this->articles,
            'searchString' => $this->searchString
        ]);
    }
}
