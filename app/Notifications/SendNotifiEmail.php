<?php

namespace App\Notifications;

use App\Models\Product;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessag;

class SendNotifiEmail extends Notification implements ShouldQueue
{
    use Queueable;
   
    public function __construct(Product $product)
    {
        
    }

    public function via()
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(): MailMessage {

        return (new MailMessage)
            ->greeting('Hello!')
            ->line('One of your invoices has been paid!')
            ->line('Producto creado exitosamente!: ');
    }

    public function toArray(): array
    {
        return [
            //
        ];
    }
}
