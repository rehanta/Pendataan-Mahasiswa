<?php

namespace App\Filament\Resources\Mahasiswas\Schemas;

use App\Models\ProgramStudi;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DatePicker;

class MahasiswaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // SECTION 1: Data Pribadi
            Section::make('Data Pribadi Mahasiswa')
                ->description('Informasi dasar dan kontak mahasiswa.')
                ->schema([
                    TextInput::make('nim')
                        ->label('NIM')
                        ->required()
                        ->unique(ignoreRecord: true) // Wajib unik
                        ->maxLength(20),

                    TextInput::make('nama_lengkap')
                        ->label('Nama Lengkap')
                        ->required()
                        ->maxLength(150),

                    DatePicker::make('tanggal_lahir')
                        ->label('Tanggal Lahir')
                        ->nullable(), // Boleh kosong

                    Textarea::make('alamat')
                        ->label('Alamat Lengkap')
                        ->nullable()
                        ->columnSpanFull(), // Membuat input ini mengambil lebar penuh kolom

                    TextInput::make('email_kontak')
                        ->label('Email Kontak')
                        ->email() // Validasi format email
                        ->nullable(),
                ])->columns(2), // Mengatur Section ini menjadi 2 kolom

            // SECTION 2: Data Akademik
            Section::make('Data Akademik')
                ->description('Informasi Program Studi dan Status Mahasiswa.')
                ->schema([
                    // Field untuk Kunci Tamu (Foreign Key)
                    Select::make('program_studi_id')
                        ->label('Program Studi')
                        ->options(ProgramStudi::all()->pluck('nama_prodi', 'id')) // Ambil data dari tabel ProgramStudi
                        ->required()
                        ->searchable(), // Fitur pencarian untuk dropdown

                    Select::make('angkatan')
                        ->label('Tahun Angkatan')
                        ->options(array_combine(range(date('Y'), 2000), range(date('Y'), 2000))) // Opsi tahun dari sekarang hingga 2000
                        ->required(),

                    Select::make('status_mahasiswa')
                        ->label('Status')
                        ->options([
                            'Aktif' => 'Aktif',
                            'Cuti' => 'Cuti',
                            'Lulus' => 'Lulus',
                            'DO' => 'Drop Out',
                        ])
                        ->required(),
                ])->columns(3), // Mengatur Section ini menjadi 3 kolom
            ]);
    }
}
