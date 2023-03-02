<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Product;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}   
