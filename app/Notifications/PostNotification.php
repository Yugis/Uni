<?php

namespace App\Notifications;

use App\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PostNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $post;

    public function __construct(Post $post)
    {
      $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail', 'broadcast'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Instructor ' . $this->post->instructor->full_name . ' has posted a new post!')
                    ->action('View the new post.', route('instructor.profile', ['id' => $this->post->instructor->id, 'slug' => $this->post->instructor->slug ]))
                    ->line('Thank you for using our website.');
    }

    // public function toDatabase()
    // {
    //   return [
    //         // 'id' => $this->post->id,
    //         // 'body' => $this->post->body,
    //         // 'instructor' => $this->post->instructor->full_name,
    //         // 'date' => $this->post->created_at
    //
    //         'message' => 'Instructor' . $this->post->instructor->full_name . ' has posted a new post!',
    //         'date' => $this->post->created_at
    //       ];
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
          'route' => route('instructor.profile', ['id' => $this->post->instructor->id, 'slug' => $this->post->instructor->slug ]),
          'message' => 'Instructor ' . $this->post->instructor->full_name . ' has posted a new post!',
          'date' => $this->post->created_at
        ];
    }
}
