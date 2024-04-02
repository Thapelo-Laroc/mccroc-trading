<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PostCreatedNotification extends Notification
{
    use Queueable;

    private $post;

    public function __construct($post)
    {
        $this->post = $post;
    }

    public function via($notifiable)
    {
        return ['database']; // or any other channels you want to use
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'A new post has been created!',
            'post_id' => $this->post->id
        ];
    }
}
