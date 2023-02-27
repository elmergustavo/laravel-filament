<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendEmailTest;
use Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use App\Models\Product;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $producto=Product::find($this->details['product_id']);
        Log::alert( $producto);
        $email = new SendEmailTest($producto);

      
         Mail::to($this->details['email'])->send($email);
        // return new Envelope(
        //     from: new Address('example@gmail.com', 'Jeffrey Way'),
        //     replyTo: [
        //         new Address($this->details['email'], $this->details['name']),
        //     ],
        //     subject: 'Producto creado',
        // );
    }
}