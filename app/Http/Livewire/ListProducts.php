<?php

namespace App\Http\Livewire;


use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Contracts\Database\Eloquent\Builder as EloquentBuilder;
use Livewire\Component;
use App\Models\Product;
use Filament\Tables\Filters\SelectFilter;


class ListProducts extends Component implements HasTable
{

    use InteractsWithTable;

    protected function getTableQuery(): EloquentBuilder
    {
        //return Product::where('user_id',Auth::id());
        //return Product::where('user_id','=', Auth::id());
        return Product::with('user');
        //dd(Product::with('user'));
        //return Product::query();
    }

    protected function getTableColumns(): array
    {
        return [

            TextColumn::make('name')->sortable()->searchable(),
            TextColumn::make('description')->sortable()->searchable(),
            TextColumn::make('price')->sortable()->searchable(),
            TextColumn::make('stock')->sortable()->searchable(),
            TextColumn::make('user.name')->sortable()->searchable(),
            //TextColumn::make('User Name')->sortable()->searchable(),
            //TextColumn::make('user->name')->sortable()->searchable(),

        ];
    }

    protected function getTableFilters(): array
    {
        return [
            SelectFilter::make('Aaa')->relationship('user', 'email'),

        ];
    }

    protected function getTableActions(): array
    {
        return [
            EditAction::make(),
            DeleteAction::make(),
            // DeleteBulkAction::make(),
        ];
    }

    protected function getTableBulkActions(): array
    {
        return [];
    }

    public function render()
    {
        return view('livewire.list-products');
    }
}
