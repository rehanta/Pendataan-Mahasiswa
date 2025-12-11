<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prodis = [
            ['nama_prodi' => 'Teknik Informatika', 'kode_prodi' => 'TI', 'id' => 1],
            ['nama_prodi' => 'Sistem Informasi', 'kode_prodi' => 'SI', 'id' => 2],
            ['nama_prodi' => 'Manajemen Bisnis', 'kode_prodi' => 'MB', 'id' => 3],
            ['nama_prodi' => 'Akuntansi', 'kode_prodi' => 'AKT', 'id' => 4],
            ['nama_prodi' => 'Ilmu Komunikasi', 'kode_prodi' => 'IK', 'id' => 5],
        ];

        DB::table('program_studis')->insert($prodis);
    }
}