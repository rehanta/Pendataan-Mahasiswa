<?php

namespace App\Filament\Resources\ProgramStudis\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class ProgramStudiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Input Nama Program Studi
            TextInput::make('nama_prodi')
                ->required() // Wajib diisi
                ->maxLength(100), // Batas panjang karakter

            // Input Kode Program Studi
            TextInput::make('kode_prodi')
                ->required()
                ->unique(ignoreRecord: true) // Harus unik (tidak boleh ada kode ganda)
                ->maxLength(10),
            ]);
    }
}
