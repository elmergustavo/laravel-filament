<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\FormProduct;
use App\Http\Livewire\ListProducts;
use App\Http\Livewire\ProductPreview;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', ListProducts::class)->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/dashboard/listProduct', )->middleware(['auth', 'verified'])->name('dashboard/listProduct');

// Route::get('/dashboard', [ProductController::class, 'home'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('email-test', function(){
    $details['email'] = 'your_email@gmail.com';
    dispatch(new App\Jobs\SendEmailJob($details));
    dd('done');
});

Route::get('/notification', NotificationController::class)->middleware(['auth', 'verified'])->name('notification');
Route::get('/product/{product}', [ProductPreview::class, 'index'])->middleware(['auth', 'verified'])->name('product.index');

require __DIR__.'/auth.php';
