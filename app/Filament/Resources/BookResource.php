<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Book;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BookResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BookResource\RelationManagers;
use Filament\Forms\Components\TextInput;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('title')->required()->maxLength(255),
                    TextInput::make('author')->required()->rules([
                        'string',
                        'regex:/^[A-Za-z ]+$/',
                    ])->maxLength(255),
                    TextInput::make('publication_year')->required()->length(4)->integer(),
                    TextInput::make('publisher')->required()->rules([
                        'string',
                        'regex:/^[A-Za-z0-9\s\.,\-\'&()]+$/',
                    ])->maxLength(255),
                    TextInput::make('isbn')->required()->rules([
                        'string',
                        'regex:/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/',
                    ])->maxLength(100),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->searchable(),
                TextColumn::make('title')->sortable()->searchable()->limit(10),
                TextColumn::make('author')->sortable()->searchable(),
                TextColumn::make('publication_year')->sortable()->searchable(),
                TextColumn::make('publisher')->sortable()->searchable(),
                TextColumn::make('isbn')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
