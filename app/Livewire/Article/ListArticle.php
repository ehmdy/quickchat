<?php

namespace App\Livewire\Article;

use Livewire\Component;
use App\Models\Article;

class ListArticle extends Component
{
    public function render()
    {
        
        return view('livewire.article.list-article',[
            'articles' => Article::latest()->get()
        ]);
    }
}
 