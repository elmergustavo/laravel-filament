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
       // Log::alert($product->user);
        
        //dd($product->user_id=auth()->product()->id);
        
            $details['email'] = $product->user->email;
            $details['name'] = $product->user->name;
            $details['product_id'] = $product->id;
            dispatch(new SendEmailJob($details));
            

        
        
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
