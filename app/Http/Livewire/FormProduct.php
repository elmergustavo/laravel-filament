<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormProduct extends Component implements HasForms
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
            TextInput::make('name')->required()->helperText("nombre del product")->maxLength(15),
            TextInput::make('description'),
            TextInput::make('price'),
            TextInput::make('stock'),
            TextInput::make('user_id')->default(Auth::id()),
           
      
        ];
        
    }

    public function mount(): void 
    {
        $this->form->fill();
    } 

    public function register(): void 
    {
        dd($this->form->getState());
    } 


    public function create(): void 
    {
        Product::create($this->form->getState());
        dd($this->form->getState());

    
    } 

    public function render()
    {
        return view('livewire.form-product');
    }
}
