🎓 Sistem Pendataan Mahasiswa
Sistem CRUD (Create, Read, Update, Delete) data Mahasiswa berbasis Laravel dan Filament.

🚀 Setup Cepat (Quick Start)
Ikuti langkah-langkah ini untuk menjalankan proyek setelah mengkloning dari GitHub.

1. Persiapan Dependencies
Instal paket PHP dan siapkan file konfigurasi lingkungan:

Bash

composer install
cp .env.example .env
php artisan key:generate
💡 Wajib: Edit file .env untuk mengatur koneksi database Anda (DB_DATABASE, DB_USERNAME, dll.).

2. Database dan Seeder
Buat semua tabel (users, program_studis, mahasiswas) dan isi data awal (dummy) secara bersamaan:

Bash

php artisan migrate:fresh --seed
3. Setup Administrator
Buat akun admin untuk bisa login ke Admin Panel Filament:

Bash

php artisan filament:user
4. Kompilasi Asset Frontend
Instal Node Dependencies dan kompilasi asset Filament:

Bash

npm install
npm run dev
🌐 Akses Aplikasi
Jalankan Server:

Bash

php artisan serve
Akses Admin Panel: Buka browser dan navigasi ke http://127.0.0.1:8000/admin.

🛠️ Catatan Penting
Jika Anda menemukan error terkait kolom database ("Unknown column..." atau "Failed to open referenced table..."), jalankan perintah di bawah untuk memastikan database Anda sinkron dengan kode:

Bash

php artisan cache:clear
php artisan migrate:fresh --seed




