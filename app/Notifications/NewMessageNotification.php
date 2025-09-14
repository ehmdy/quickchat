<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMessageNotification extends Notification
{
    use Queueable;

    protected $message;
    protected $sender;
    protected $group;
    
    /**
     * Create a new notification instance.
     */
    public function __construct($message, $sender, $group = null)
    {
        $this->message = $message;
        $this->sender = $sender;
        $this->group = $group;
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
            'title'   => 'New Message',
            'message' => "New message from " . ($this->group ? "Group: {$this->group->name}" : $this->sender->name),
            'body'    => $this->message->body,
            'sender_id' => $this->sender->id,
            'group_id'  => $this->group ? $this->group->id : null,
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
            'title'   => 'New Message',
            'message' => "New message from " . ($this->group ? "Group: {$this->group->name}" : $this->sender->name),
            'body'    => $this->message->body,
            'sender_id' => $this->sender->id,
            'group_id'  => $this->group ? $this->group->id : null,
        ];
    }
}
