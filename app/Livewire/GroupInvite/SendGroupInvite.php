<?php

namespace App\Livewire\GroupInvite;

use Livewire\Component;
use App\Notifications\GroupInviteNotification;
use App\Models\Group;
use App\Models\User;

class SendGroupInvite extends Component
{

    public $group;
    public $receiver;


    public function sendGroupInvite($groupId, $inviteeEmail)
    {
        $group   = Group::findOrFail($groupId);
        $inviter = auth()->user();
        $invitee = User::where('email', $inviteeEmail)->first();

        if ($invitee) {
            $invitee->notify(new GroupInviteNotification($group, $inviter));
        }
    }

    public function render()
    {
        return view('livewire.group-invite.send-group-invite');
    }
}
