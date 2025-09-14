<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;

class UserGroups extends Component
{
    public $groups;
    
    public function mount()
    {
        $this->loadGroups();
    }
    
    public function loadGroups()
    {
        $this->groups = Group::whereHas('users', function($query) {
            $query->where('user_id', Auth::id());
        })->withCount('users')
          ->latest()
          ->get();
    }
    
    public function render()
    {
        return view('livewire.user-groups', [
            'groups' => $this->groups
        ]);
    }
}
