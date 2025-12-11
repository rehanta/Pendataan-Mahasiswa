<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $mahasiswas = [];
        $status = ['Aktif', 'Cuti', 'Lulus', 'DO'];

        for ($i = 1; $i <= 10; $i++) {
            $tahun = rand(2018, 2023);
            $mahasiswas[] = [
                // Membuat NIM unik dan random
                'nim' => 'D' . Str::random(2) . $tahun . '0' . $i, 
                'nama_lengkap' => 'Mahasiswa ' . $i . ' Random',
                'tanggal_lahir' => now()->subYears(rand(18, 25))->subDays(rand(1, 365))->format('Y-m-d'),
                'alamat' => 'Jl. Random No. ' . rand(1, 100) . ', Kota Contoh',
                'email_kontak' => 'mahasiswa' . $i . '@kampus.ac.id',
                
                // FOREIGN KEY (ID Program Studi)
                'program_studi_id' => rand(1, 5), 
                
                'angkatan' => $tahun,
                'status_mahasiswa' => $status[array_rand($status)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('mahasiswas')->insert($mahasiswas);
    }
}
