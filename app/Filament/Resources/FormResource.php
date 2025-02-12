<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FormResource\Pages;
use App\Filament\Resources\FormResource\RelationManagers;
use App\Models\Form as FormModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FormResource extends Resource
{
    protected static ?string $model = FormModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('title')
                ->label('Judul Form')
                ->required(),

            Repeater::make('fields')
                ->label('Field Form')
                ->schema([
                    TextInput::make('label')
                        ->label('Label Field')
                        ->required(),

                    Select::make('type')
                        ->label('Tipe Input')
                        ->options([
                            'text' => 'Text',
                            'email' => 'Email',
                            'textarea' => 'Textarea',
                            'select' => 'Select',
                            'file' => 'File Upload', // Tambahkan opsi file upload
                        ])
                        ->required(),
                        Repeater::make('options')
                        ->label('Opsi Select')
                        ->schema([
                            TextInput::make('value')
                            ->label('Opsi')
                            ->required(),
                        ])
                        ->hidden(fn ($get) => $get('type') !== 'select') // Hanya muncul jika 'select'
                        ->columns(2),
                        
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                ->label('Judul Form')
                ->sortable()
                ->searchable(),
                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y H:i'),
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListForms::route('/'),
            'create' => Pages\CreateForm::route('/create'),
            'edit' => Pages\EditForm::route('/{record}/edit'),
        ];
    }
}
