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

            //$details['email_id'] = $product->user->email;            
            $details['product_id'] = $product->id;
            dispatch(new SendEmailJob($details));//->delay(now()->addMinutes(1));;        
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
