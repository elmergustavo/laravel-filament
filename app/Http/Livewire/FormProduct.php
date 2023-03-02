<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use LivewireUI\Modal\ModalComponent;

class FormProduct extends ModalComponent implements HasForms
{
    use InteractsWithForms;

    public Product $product;


    public $name='';
    public $price='';
    public $description='';
    public $stock='';


    protected function getFormSchema(): array
    {
        return [
            //TextInput::make('name')->required()->helperText("nombre del product")->maxLength(15),
            TextInput::make('name')->required()->maxLength(15)->helperText("name of product"),
            TextInput::make('description')->required()->helperText("description of product"),
            TextInput::make('price')->required()->helperText("price of product")->numeric(),
            TextInput::make('stock')->required()->helperText("stock of product")->numeric(),
            // TextInput::make('user_id')->default(auth()->user()->id),
           
      
        ];
        
    }
   
    protected function getActions(): array
    {
        return [ ];
    }


    public function create(): void 
    {

        $datos =  $this->validate();

        Product::create([
            'name' => $datos['name'],
            'description' => $datos['description'],
            'price' => $datos['price'],
            'stock' => $datos['stock'],
            'user_id' => auth()->user()->id,
        ]);

        Notification::make() 
        ->title('Saved successfully')
        ->success()
        ->send(); 

        $this->closeModal();
    
    } 

    public function render()
    {
        return view('livewire.form-product');
    }
}
