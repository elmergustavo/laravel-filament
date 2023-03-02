<?php

namespace App\Observers;

use Illuminate\Support\Facades\Log;
use App\Models\Product;
use App\Jobs\SendEmailJob;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {             
            $details['email_id'] = $product->user_id;         
            $details['product_id'] = $product->id;
            dispatch(new SendEmailJob($details));    
            // dispatch(new SendEmailJob($details))->onQueue('queue1')->delay(now()->addMinutes(1));
            // dispatch(new SendEmailJob($details))->onQueue('queue2')->delay(now()->addMinutes(2));    
            // dispatch(new SendEmailJob($details))->delay(now()->addMinutes(3));
            
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
