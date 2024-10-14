<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PemesananResource\Pages;
use App\Models\Pemesanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PemesananResource extends Resource
{
    protected static ?string $model = Pemesanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('mobil_id')
<<<<<<< Updated upstream
                    ->relationship('mobil', 'merk') // Display 'merk' instead of 'id'
=======
                    ->relationship('mobil', 'merk') // Gunakan merk untuk ditampilkan
                    ->getOptionLabelFromRecordUsing(fn($record) => "{$record->merk} - {$record->model}") // Gabungkan merk dan model
>>>>>>> Stashed changes
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_mulai')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_selesai')
                    ->required(),
                Forms\Components\TextInput::make('total_harga')
                    ->disabled(),
                Forms\Components\Select::make('status')
                    ->options([
                        'warning' => 'Pending',
                        'success' => 'Dibayar',
                        'selesai' => 'Selesai',
                        'danger' => 'Dibatalkan',
                    ])
                    ->required(),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('mobil.merk')
                    ->label('Merk Mobil')
                    ->sortable(),
                Tables\Columns\TextColumn::make('mobil.model')
                    ->label('Model Mobil')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_selesai')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_harga')
                    ->label('Total Harga')
                    ->getStateUsing(fn($record) => $record->calculateTotalHarga())
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'dibayar',
                        'danger' => 'dibatalkan',
                        'secondary' => 'selesai',
                    ])
                    ->sortable(),
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
                // Add any filters if needed
            ])
            ->actions([
<<<<<<< Updated upstream
                //add action bila dibutuhkan
            ])
            ->bulkActions([]);
=======
                //add when needed
            ])
            ->bulkActions([
                //add when needed
            ]);
>>>>>>> Stashed changes
    }

    public static function getRelations(): array
    {
        return [
            // Define any relations if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPemesanans::route('/'),
        ];
    }
}
