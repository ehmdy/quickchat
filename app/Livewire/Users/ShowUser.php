<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Contracts\View\View;
class ShowUser extends Component
{
    public int $userId;
    public ?User $user = null;
 

    public function mount(int $userId)
    {
     
        $this->userId = $userId;
        $this->user = User::find($userId);
      
    }
 
    public function render():view
    {
        return view('livewire.users.show-user',['user' => $this->user]);
    }
}
