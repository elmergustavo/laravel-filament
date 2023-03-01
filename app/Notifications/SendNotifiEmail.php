<?php

namespace App\Notifications;

use App\Models\Product;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessag;
use Illuminate\Support\Facades\Log;

class SendNotifiEmail extends Notification implements ShouldQueue
{
    use Queueable;

    public $product;
   
    public function __construct($productos)
    {
         $this->product = $productos;
    }

    public function via()
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(): MailMessage {

        $url = url('/product/'. $this->product->id);


        return (new MailMessage)
            ->greeting('Hello!')
            ->line('Nombre del Producto: '.  $this->product->name)
            ->line('descripcion del Producto: '.  $this->product->description)
            ->line('Stock del Producto: '.  $this->product->stock)
            ->line('Precio del Producto: '.  $this->product->price)
            ->action('View Invoice', $url)
            ->line('Producto creado exitosamente');
    }

    public function toArray(): array
    {
        return [
            'id' => $this->product->id,
            'user_id' => $this->product->user_id,
            'name' => $this->product->name,
            'description' => $this->product->description,
            'price' => $this->product->price,
            'stock' => $this->product->stock,
        ];
    }
}
