<?php

namespace App\Livewire\Group;

use Livewire\Component;
use App\Models\Group;

class ViewGroupInfo extends Component
{
    public $groupId;
    public $group;
 
    public function mount($groupId) 
    {
        $this->groupId = $groupId;
        $this->loadGroup();
    }

    protected function loadGroup()
    {
        $this->group = Group::findOrFail($this->groupId);
    }

    public function render()
    {
        return view('livewire.group.view-group-info');
    }
}
