<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Contracts\View\View;

class AllUser extends Component
{

    public function render(): View
    {
        return view('livewire.users.all-user', [
            'users' => User::latest()->get()
        ]);
    }
}
