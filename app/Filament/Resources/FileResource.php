<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FileResource\Pages;
use App\Filament\Resources\FileResource\RelationManagers;
use App\Models\File;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Notifications\Notification;
use App\Models\Post;
use Filament\Tables\Columns;
use Filament\Tables\Actions\Action;

class FileResource extends Resource
{    
    protected static ?string $model = File::class;
    public static $icon = 'heroicon-o-document';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Form skema konfiguration
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('filename')
                    ->label('File name'),
            ])
            ->filters([
                // Filtering options
            ])
            ->actions([
                // Delete button
                Tables\Actions\DeleteAction::make()->successNotification(
                    Notification::make()
                        ->success()
                        ->title('☠️Files Deleted☠️')
                        ->body('The files have been deleted successfully.')
                ),
                // Download button
                Action::make('Download File')
                    ->url(fn ($record) => route('download.file', ['filename' => $record->filename]))
                    ->openUrlInNewTab(),                     
            ])
            // Bulk options
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Definition af eventuelle relationer
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFiles::route('/'),
            'create' => Pages\CreateFile::route('/create'),
            'edit' => Pages\EditFile::route('/{record}/edit'),
        ];
    }
}