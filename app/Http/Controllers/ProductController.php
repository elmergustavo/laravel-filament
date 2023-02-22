<?php

namespace App\Http\Controllers;
use App\Http\Livewire\FormProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home ()
    {
        return view('form-product');
    }
}
