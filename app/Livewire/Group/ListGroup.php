<?php

namespace App\Livewire\Group;

use Livewire\Component;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;

class ListGroup extends Component
{
    public function render()
    {
        $created_by = Auth::user()->id;
     
        return view('livewire.group.list-group', [
            'groups' => Group::where('created_by', $created_by)->get()
        ]);
    }
}
