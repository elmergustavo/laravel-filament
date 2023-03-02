<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use App\Models\User;
use App\Notifications\SendNotifiEmail;
use Illuminate\Support\Facades\Notification;

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
        // $producto = Product::find($this->details['product_id']);
        // Log::alert($producto);
        // $email = new SendEmailTest($producto);
        // Mail::to($this->details['email'])->send($email);
        


        $user = User::find($this->details['email_id']); 
        $product = Product::find($this->details['product_id']);  

       
        Log::alert($user);
        Log::alert($product);
        Notification::send($user, new SendNotifiEmail($product));

    }
}
