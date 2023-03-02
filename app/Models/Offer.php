<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Foundation\Auth\Product;
use Illuminate\Foundation\Auth\User;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','product_id'];

    public function offerproduct(): HasManyThrough
    {
        return $this->hasManyThrough(Offer::class, Product::class);
    }
}   
