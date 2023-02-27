<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Filament\Pages\Actions\CreateAction as ActionsCreateAction;
use Filament\Tables\Actions\CreateAction as TablesActionsCreateAction;

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
            TextInput::make('name')->required()->maxLength(15),
            TextInput::make('description'),
            TextInput::make('price'),
            TextInput::make('stock'),
            // TextInput::make('user_id')->default(auth()->user()->id),
            //TextInput::make('user_name')->default(auth()->user()->name),
           
      
        ];
        
    }

    public function mount(): void 
    {
        $this->form->fill();
    } 

    // public function register(): void 
    // {
    //     dd($this->form->getState());
    // } 

    
    protected function getActions(): array
    {
        return [
            ActionsCreateAction::make()->form(function(\App\Http\Livewire\FormProduct $form){
                return [
                    TextInput::make('name')->required()->maxLength(15),
                    TextInput::make('description'),
                    TextInput::make('price'),
                    TextInput::make('stock'),
                    TextInput::make('user_id')->default(auth()->user()->id),
                   
              
                ];
            }   ),
        ];
    }


    public function create(): void 
    {

        $datos =  $this->validate();

        // dd($datos);
        // Product::create($this->form->getState());
        // // dd($this->form->getState());

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
