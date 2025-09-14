<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Models\Message;
use App\Models\Group;

class GroupInvitationService
{
    /**
     * Generate a unique invitation link for a group
     *
     * @param string $groupId
     * @return string
     */
    public function generateInvitationLink($groupId)
    {
        // Generate a random token for the invitation
        $token = Str::random(40);
        
        // Create a unique invitation link
        return url("/groups/join/{$groupId}?token={$token}");
    }

    /**
     * Create a new group invitation
     *
     * @param string $groupId
     * @param string $invitedById
     * @return \App\Models\GroupMessage
     */
    public function createInvitation($groupId, $invitedById)
    {
        $invitationLink = $this->generateInvitationLink($groupId);
        $group = Group::findOrFail($groupId);
        
        // First create the message
        $message = Message::create([
            'user_id' => $invitedById,
            'group_id' => $groupId,
            'body' => "You've been invited to join the group: {$group->name}",
        ]);

        // Then create the group message reference
        return \App\Models\GroupMessage::create([
            'group_id' => $groupId,
            'message_id' => $message->id, // Use the actual message ID
            'type' => 'pending',
            'invitation_link' => $invitationLink,
            'invited_by' => $invitedById
        ]);
    }
}
