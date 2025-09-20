<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Contracts\View\View;
use App\Models\Group;
use App\Models\Message;
use App\Models\User;
use Illuminate\Validation\Rule;
use App\Notifications\NewMessageNotification;
use App\Events\MessageSent;

class Chat extends Component
{
    public int $userId;
    public $selectedUser = null;
    public $selectedGroup = null;
    public string $body = '';
    public int $refreshCounter = 0;

    protected $listeners = ['messageReceived' => 'handleMessageReceived', 'userSelected' => 'handleUserSelected', 'groupSelected' => 'handleGroupSelected', 'clearSelection' => 'handleClearSelection'];

    protected function rules(): array
    {
        return [
            'body' => ['required', 'string', 'max:2000'],
        ];
    }

    public function render(): View
    {
        $query = Message::with('user');
        
        // Filter messages based on selected context
        if ($this->selectedGroup) {
            // Show messages for the selected group
            $query->where('group_id', $this->selectedGroup->id);
        } elseif ($this->selectedUser) {
            // Show messages between current user and selected user
            $query->where(function($q) {
                $q->where(function($subQ) {
                    $subQ->where('user_id', auth()->id())
                         ->where('group_id', null);
                })->orWhere(function($subQ) {
                    $subQ->where('user_id', $this->selectedUser->id)
                         ->where('group_id', null);
                });
            });
        } else {
            // Show general messages (no specific user or group selected)
            $query->where('group_id', null);
        }
        
        $messages = $query->latest()
            ->take(50)
            ->get()
            ->sortBy('id');

        return view('livewire.chat', compact('messages'));
    }

    public function sendMessage(): void
    {
        $this->validate();

        $messageData = [
            'user_id' => auth()->id(),
            'body' => $this->body,
        ];

        // Assign message to correct context
        if ($this->selectedGroup) {
            $messageData['group_id'] = $this->selectedGroup->id;
        } else {
            $messageData['group_id'] = null; // Direct message
        }

        $message = Message::create($messageData);

        // Broadcast the message to all connected clients
        broadcast(new MessageSent($message));

        // Send notification to other users
        if ($this->selectedUser && $this->selectedUser->id !== auth()->id()) {
            $this->selectedUser->notify(new NewMessageNotification($message, auth()->user(), null));
        }

        $this->reset('body');
        
        // Dispatch browser event to scroll to bottom
        $this->dispatch('scroll-to-bottom');
    }

    public function handleMessageReceived($data): void
    {
        // This method will be called when a new message is received via WebSocket
        // The message will be automatically added to the messages collection
        // and the view will re-render
    }

    public function handleUserSelected($userId)
    {
        $this->selectedUser = User::find($userId);
        $this->selectedGroup = null;
    }

    public function handleGroupSelected($groupId)
    {
        $this->selectedGroup = Group::find($groupId);
        $this->selectedUser = null;
    }

    public function handleClearSelection()
    {
        $this->selectedGroup = null;
        $this->selectedUser = null;
        
        // Force refresh the component to update the messages
        $this->refreshCounter++;
    }

    public function getListeners()
    {
        return [
            'messageReceived' => 'handleMessageReceived',
            'echo:chat,message.sent' => 'handleMessageReceived',
            'userSelected' => 'handleUserSelected',
            'groupSelected' => 'handleGroupSelected',
            'clearSelection' => 'handleClearSelection',
        ];
    }
}
