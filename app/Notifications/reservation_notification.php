<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class reservation_notification extends Notification
{
    use Queueable;
   
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
  
    
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

  
      public function toSlack($notifiable)
{
    return (new SlackMessage)->content('Reservation effectuée !');
}
   
}
