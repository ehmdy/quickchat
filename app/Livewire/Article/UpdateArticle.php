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
    public $body = '';
    public int $articleId;

    public function mount($articleId)
    {
        $this->articleId = $articleId;
        $this->article = Article::find($articleId);
        $this->title = $this->article->title;
        $this->body = $this->article->body;
    }

    public function edit(int $articleId): void
    {
        $this->article = Article::where('id', $articleId)->first();
        $this->articleId = $articleId;
        
        $this->title = $this->article->title;
        $this->body = $this->article->body;
    }

    public function save():void
    {
        $this->article->update([
            'title' => $this->title,
            'body' => $this->body,
        ]);

        // Optional: Display a success message
        session()->flash('status', 'Article updated successfully.');
     
    }

    public function render()
    {
    
        return view('livewire.article.update-article');
    }
}
