<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductPreview extends Component
{
    
    public function index (Product $product){

        return view('livewire.product-preview', [
            'product' => $product
        ]);
    }
}
