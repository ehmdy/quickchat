<?php

namespace App\Livewire\Article;

use Livewire\Component;
use App\Models\Article;
use Livewire\Attributes\Validate;

class UpdateArticle extends Component
{

    public Article $article;
    #[Validate('required')]
    public $title = '';
 
    #[Validate('required')]
    public $description = '';
    public int $articleId;

    public function mount($articleId)
    {
        $this->articleId = $articleId;
        $this->article = Article::find($articleId);
        $this->title = $this->article->title;
        $this->description = $this->article->description;
    }

    public function edit(int $articleId): void
    {
        $this->article = Article::where('id', $articleId)->first();
        $this->articleId = $articleId;
        
        $this->title = $this->article->title;
        $this->description = $this->article->description;
    }

    public function save():void
    {
        $this->article->update([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        // Optional: Display a success message
        session()->flash('status', 'Article updated successfully.');
     
    }

    public function render()
    {
    
        return view('livewire.article.update-article');
    }
}
