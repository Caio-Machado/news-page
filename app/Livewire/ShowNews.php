<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class ShowNews extends Component
{
    public $articles;

    public function mount() 
    {
        $this->articles = Article::get();
    }

    public function render()
    {
        return view('livewire.show-news', [
            'articles' => $this->articles
        ]);
    }
}
