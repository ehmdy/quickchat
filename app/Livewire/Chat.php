<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Contracts\View\View;
use App\Models\Group;
use App\Models\Message;
use App\Models\User;
use Illuminate\Validation\Rule;
use App\Notifications\NewMessageNotification;

class Chat extends Component
{
    public int $userId;
    public string $body = '';

    protected function rules(): array
    {
        return [
            'body' => ['required'],
        ];
    }

    public function render(): View
    {
        $messages = Message::with('user')
            ->latest()
            ->take(10)
            ->get()
            ->sortBy('id');

        return view('livewire.chat', compact('messages'));
    }

    public function sendMessage(): void
    {
        $this->validate();

        Message::create([
            'user_id' => $this->userId,
            'body' => $this->body,
        ]);

        $receiver = User::find($this->userId);

        if ($receiver && $receiver->id !== auth()->id()) {
            $receiver->notify(new NewMessageNotification($message, auth()->user(), null));
        }


        $this->reset('body');
    }
}
