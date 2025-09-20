<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Group;
use Illuminate\Contracts\View\View;

class ChatDashboard extends Component
{
    public string $searchUsers = '';
    public string $searchGroups = '';
    public $selectedUser = null;
    public $selectedGroup = null;

    public function render(): View
    {
        // Get users based on context
        if ($this->selectedGroup) {
            // Show only group members when a group is selected
            $users = $this->selectedGroup->users()
                ->where('users.id', '!=', auth()->id())
                ->when($this->searchUsers, function ($query) {
                    $query->where(function ($q) {
                        $q->where('users.name', 'like', '%' . $this->searchUsers . '%')
                          ->orWhere('users.email', 'like', '%' . $this->searchUsers . '%');
                    });
                })
                ->get();
        } else {
            // Show all users when no group is selected
            $users = User::where('id', '!=', auth()->id())
                ->when($this->searchUsers, function ($query) {
                    $query->where(function ($q) {
                        $q->where('name', 'like', '%' . $this->searchUsers . '%')
                          ->orWhere('email', 'like', '%' . $this->searchUsers . '%');
                    });
                })
                ->get();
        }

        $groups = auth()->user()->groups()
            ->when($this->searchGroups, function ($query) {
                $query->where('name', 'like', '%' . $this->searchGroups . '%');
            })
            ->withCount('users')
            ->with(['latestMessage.user'])
            ->get();

        return view('livewire.chat-dashboard', compact('users', 'groups'));
    }

    public function selectUser($userId)
    {
        $this->selectedUser = User::find($userId);
        $this->selectedGroup = null;
        $this->dispatch('userSelected', $userId);
    }

    public function selectGroup($groupId)
    {
        $this->selectedGroup = Group::find($groupId);
        $this->selectedUser = null;
        $this->dispatch('groupSelected', $groupId);
    }

    public function updatedSearchUsers()
    {
        // Clear selection when searching
        if ($this->searchUsers && ($this->selectedUser || $this->selectedGroup)) {
            $this->selectedUser = null;
            $this->selectedGroup = null;
            $this->dispatch('clearSelection');
        }
    }

    public function updatedSearchGroups()
    {
        // Clear selection when searching
        if ($this->searchGroups && ($this->selectedUser || $this->selectedGroup)) {
            $this->selectedUser = null;
            $this->selectedGroup = null;
            $this->dispatch('clearSelection');
        }
    }

    public function clearSelection()
    {
        $this->selectedGroup = null;
        $this->selectedUser = null;
        $this->dispatch('clearSelection');
        
        // Force refresh to ensure the Chat component updates
        $this->dispatch('$refresh');
    }
}

