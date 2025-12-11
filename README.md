🚀 Instalasi & Setup Wajib
Ikuti urutan langkah ini setelah mengkloning repositori:

1. Preparasi Proyek & Database
Bash

# 1. Instal dependencies PHP
composer install

# 2. Siapkan file environment (.env)
cp .env.example .env
php artisan key:generate

# 3. PASTIKAN EDIT .env (DB_DATABASE, DB_USERNAME, dll)

# 4. Migrasi & Isi data awal (Wajib dijalankan!)
php artisan migrate:fresh --seed
2. Akun & Frontend
Bash

# 5. Buat Akun Admin (Wajib untuk login)
php artisan filament:user

# 6. Instal dependencies frontend
npm install
npm run dev
🌐 Jalankan
Bash

php artisan serve
Akses Admin Panel di http://127.0.0.1:8000/admin









