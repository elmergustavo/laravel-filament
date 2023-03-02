<?php

namespace App\Http\Livewire;


use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Illuminate\Contracts\Database\Eloquent\Builder as EloquentBuilder;
use Livewire\Component;
use Filament\Forms;
use App\Models\Product;
use Filament\Tables\Actions\DeleteBulkAction;
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
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            SelectFilter::make('Filter Email')->relationship('user', 'email'),

        ];
    }

    protected function getActions(): array
    {
        return [];
    }

    protected function getTableActions(): array
    {
        return [

            EditAction::make()->mountUsing(function (Forms\ComponentContainer $form, \App\Models\Product $record) {
                $mount_data = $record->toArray();
                $mount_data['user_id'] = (auth()->user()->id);
                $form->fill($mount_data);
            })
                ->form(function () {

                    return [
                        TextInput::make('name')->required()->maxLength(15)->helperText("name of product"),
                        TextInput::make('description')->required()->helperText("description of product"),
                        TextInput::make('price')->required()->helperText("price of product")->numeric(),
                        TextInput::make('stock')->required()->helperText("stock of product")->numeric(),
                    ];
                }),

            DeleteAction::make(),

            // TablesActionsCreateAction::make()->form(function(\App\Http\Livewire\FormProduct $form){
            //     return [
            //         TextInput::make('name')->required()->maxLength(15),
            //         TextInput::make('description'),
            //         TextInput::make('price'),
            //         TextInput::make('stock'),
            //         TextInput::make('user_id')->default(auth()->user()->id),


            //     ];
            // }   ),

        ];
    }

    protected function getTableBulkActions(): array
    {
        return [
            DeleteBulkAction::make(),
        ];
    }

    public function render()
    {
        return view('livewire.list-products');
    }
}
