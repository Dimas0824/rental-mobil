<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MobilResource\Pages;
use App\Filament\Resources\MobilResource\RelationManagers;
use App\Models\Mobil;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MobilResource extends Resource
{
    protected static ?string $model = Mobil::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('merk')
                    ->required()
                    ->maxLength(200),
                Forms\Components\TextInput::make('model')
                    ->required()
                    ->maxLength(200),
                Forms\Components\TextInput::make('tahun')
                    ->required(),
                Forms\Components\TextInput::make('harga_per_hari')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    ->required(),
                Forms\Components\TextInput::make('warna')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('nomor_polisi')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('merk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('model')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tahun'),
                Tables\Columns\TextColumn::make('harga_per_hari')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('warna')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_polisi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListMobils::route('/'),
            'create' => Pages\CreateMobil::route('/create'),
            'edit' => Pages\EditMobil::route('/{record}/edit'),
        ];
    }
}
