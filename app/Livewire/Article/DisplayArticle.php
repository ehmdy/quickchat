<?php

namespace App\Livewire\Article;

use Livewire\Component;
use App\Models\Article;

class DisplayArticle extends Component
{

    public $title;
    public $description;

    public function render()
    {
        return view('livewire.article.display-article',[
            'articles' => Article::latest()->get()
        ]);
      
    }
}
