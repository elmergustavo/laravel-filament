<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Filament\Forms\Components\Builder;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Contracts\Database\Eloquent\Builder as EloquentBuilder;
use Livewire\Component;

class ListProducts extends Component implements HasTable
{

    use InteractsWithTable;

    public function getAllProjects() {
        $projects = Product::all();
        return $projects;
    }

    protected function getTableQuery(): EloquentBuilder
    {
        return Product::query();
    }

    protected function getTableColumns(): array 
    {
        return [
         
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('description')->sortable()->searchable(),
                TextColumn::make('price')->sortable()->searchable(),
                TextColumn::make('stock')->sortable()->searchable(),
            
        ];
    }
 
    // protected function getTableFilters(): array
    // {
    //     return [ ...
    // }
 
    protected function getTableActions(): array
    {
        return [
            EditAction::make(),
            DeleteAction::make(),
            // DeleteBulkAction::make(),
        ];
    }
 
    // protected function getTableBulkActions(): array
    // {
    //     return [ ...
    // } 


    public function render()
    {
        return view('livewire.list-products');
    }
}
