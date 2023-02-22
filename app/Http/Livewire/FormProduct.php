<?php

namespace App\Http\Livewire;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class FormProduct extends Component implements HasForms
{
    use InteractsWithForms;

    public $name;
    public $price;
    public $description;
    public $stock;


    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')->required()->helperText("nombre del product"),
            TextInput::make('price'),
            TextInput::make('description'),
            TextInput::make('stock'),
        ];
    }

    public function register(): void
    {
       dd($this->form->getState());
    }

    public function render()
    {
        return view('livewire.form-product');
    }
}
