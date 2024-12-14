<?php

namespace App\Livewire\Article;

use Livewire\Component;
use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;

class CreateArticle extends Component
{

    public string $title = '';
    public string $description = '';

    public int $articleId;
    public ?Article $article;

    protected function rules() 
    {
        return [
            'title' => Rule::exists('posts', 'title'),
            'title' => 'required',
            'description' => 'required',
        ];
    }

    public function save(): void
    {
        $this->validate();

        if (empty($this->article)) {
            Article::create([
                'title' => $this->title,
                'description' => $this->description,
            ]);
        } else {
            $this->article->update([
                'title' => $this->title,
                'description' => $this->description,
            ]);
        }

        session()->flash('status', 'Post successfully.');
        
        $this->reset('article', 'title', 'description');
    }

    public function render()
    {
        return view('livewire.article.create-article');
    }
}
