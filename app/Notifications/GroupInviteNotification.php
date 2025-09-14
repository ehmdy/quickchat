<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GroupInviteNotification extends Notification
{
    use Queueable;

    protected $group;
    protected $inviter;
    
    /**
     * Create a new notification instance.
     */
    public function __construct($group, $inviter)
    {
        $this->group = $group;
        $this->inviter = $inviter;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'title'   => 'Group Invitation',
            'message' => "{$this->inviter->name} invited you to join group: {$this->group->name}",
            'link'    => $this->group->link,
            'inviter' => $this->inviter->id,
            'group_id'=> $this->group->id,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title'   => 'Group Invitation',
            'message' => "{$this->inviter->name} invited you to join group: {$this->group->name}",
            'link'    => $this->group->link,
            'inviter' => $this->inviter->id,
            'group_id'=> $this->group->id,
        ];
    }
}
