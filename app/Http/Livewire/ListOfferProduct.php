<?php

namespace App\Http\Livewire;

use App\Models\Offer;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class ListOfferProduct extends Component implements Tables\Contracts\HasTable
{

    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder 
    {
        // return Offer::with('product');
        return Offer::query();
    }   

    protected function getTableColumns(): array 
    {
        return [
            TextColumn::make('name')->sortable()->searchable(),
            TextColumn::make('price')->sortable()->searchable(),
            TextColumn::make('')->sortable()->searchable(),
        ];
    }
 
    protected function getTableFilters(): array
    {
        return [];
    }
 
    protected function getTableActions(): array
    {
        return [];
    }
 
    protected function getTableBulkActions(): array
    {
        return [];
    } 

    public function render()
    {
        return view('livewire.list-offer-product');
    }
}
