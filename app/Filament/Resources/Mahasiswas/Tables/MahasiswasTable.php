<?php

namespace App\Filament\Resources\Mahasiswas\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;

class MahasiswasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nim')
                ->searchable()
                ->sortable()
                ->label('NIM'),

            TextColumn::make('nama_lengkap')
                ->searchable()
                ->label('Nama Mahasiswa'),

            // MENAMPILKAN DATA RELASI!
            TextColumn::make('programStudi.nama_prodi') // Mengambil nama prodi dari relasi
                ->sortable()
                ->searchable()
                ->label('Program Studi'),

            TextColumn::make('angkatan')
                ->sortable()
                ->label('Angkatan'),

            // Badge/Label berwarna untuk status
            BadgeColumn::make('status_mahasiswa')
                ->label('Status')
                ->colors([
                    'success' => 'Aktif',
                    'warning' => 'Cuti',
                    'primary' => 'Lulus',
                    'danger' => 'DO',
                ]),

            TextColumn::make('created_at')
                ->dateTime()
                ->label('Tgl Ditambahkan'),
        ])
        ->filters([
            // Filter cepat untuk laporan
            SelectFilter::make('program_studi_id')
                ->relationship('programStudi', 'nama_prodi') // Filter berdasarkan relasi
                ->label('Filter Prodi'),

            SelectFilter::make('angkatan')
                ->options(array_combine(range(date('Y'), 2000), range(date('Y'), 2000)))
                ->label('Filter Angkatan'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
