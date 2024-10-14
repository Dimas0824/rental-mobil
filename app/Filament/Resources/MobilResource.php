<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MobilResource\Pages;
use App\Models\Mobil;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split as ComponentsSplit;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MobilResource extends Resource
{
    protected static ?string $model = Mobil::class;

    protected static ?string $navigationIcon = 'heroicon-o-printer';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Mobil')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\TextInput::make('merk')
                                    ->label('Merk')
                                    ->required()
                                    ->maxLength(200),
                                Forms\Components\TextInput::make('model')
                                    ->label('Model')
                                    ->required()
                                    ->maxLength(200),
                                Forms\Components\TextInput::make('tahun')
                                    ->label('Tahun')
                                    ->required(),
                                Forms\Components\TextInput::make('harga_per_hari')
                                    ->label('Harga per Hari')
                                    ->required()
                                    ->numeric()
                                    ->prefix('Rp ')
                                    ->helperText('Masukkan harga sewa per hari'),
                            ])
                            ->columnSpan(1), // Kolom kiri

                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\Select::make('status')
                                    ->label('Status')
                                    ->options([
                                        'tersedia' => 'Tersedia',
                                        'disewa' => 'Disewa',
                                    ])
                                    ->required(),
                                Forms\Components\TextInput::make('warna')
                                    ->label('Warna')
                                    ->required()
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('nomor_polisi')
                                    ->label('Nomor Polisi')
                                    ->required()
                                    ->maxLength(100),
                            ])
                            ->columnSpan(1), // Kolom kanan
                    ]),
                section::make('Upload Gambar dan Deskripsi')
                    ->schema([
                        Forms\Components\FileUpload::make('gambar')
                            ->label('Gambar Mobil')
                            ->image()
                            ->directory('mobil-images')
                            ->nullable()
                            ->columnSpanFull(), // Mengambil satu baris penuh
                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->required()
                            ->columnSpanFull(), // Mengambil satu baris penuh
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                grid::make()
                    ->columns(1)
                    ->schema([
                        Tables\Columns\ImageColumn::make('gambar')
                            ->label('Gambar')
                            ->height(170)
                            ->width(230)
                            ->extraAttributes(['class' => 'rounded-lg'])
                            ->extraAttributes(['style' => 'margin-left: 8px; margin-top: 20px; margin-bottom: 20px;']),

                        // Mengelompokkan merk dan model dalam satu baris
                        Tables\Columns\Layout\Grid::make()
                            ->columns(3) // Mengatur merk dan model dalam satu baris
                            ->schema([
                                Tables\Columns\TextColumn::make('merk')
                                    ->label('Merk')
                                    ->searchable()
                                    ->sortable()
                                    ->weight(FontWeight::ExtraBold)
                                    ->extraAttributes(['class' => 'text-left']),

                                Tables\Columns\TextColumn::make('model')
                                    ->label('Model')
                                    ->searchable()
                                    ->sortable()
                                    ->weight(FontWeight::Bold)
                                    ->extraAttributes(['class' => 'text-left']),

                            ])
                            ->extraAttributes(['class' => 'flex justify-left items-center space-x-2']),


                        Tables\Columns\TextColumn::make('harga_per_hari')
                            ->label('Harga per Hari')
                            ->formatStateUsing(fn($state) => 'Rp ' . number_format($state, 2))
                            ->sortable(),
                        Tables\Columns\TextColumn::make('nomor_polisi')
                            ->label('Nomor Polisi')
                            ->searchable(),
                        Tables\Columns\TextColumn::make('status')
                            ->label('Status')
                            ->badge()
                            ->colors([
                                'success' => 'tersedia',
                                'danger' => 'disewa',
                            ])
                            ->sortable(),
                    ])
            ])
            ->contentGrid(['md' => 2, 'xl' => 3])

            ->filters([
                // Tambahkan filter jika diperlukan
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
