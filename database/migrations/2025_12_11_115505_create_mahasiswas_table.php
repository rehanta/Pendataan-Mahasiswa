<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nim',20)->unique();
            $table->string('nama_lengkap',150);
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->string('email_kontak')->nullable();
            $table->timestamps();

            // Data Akademik
            $table->year('angkatan');
            $table->enum('status_mahasiswa', ['Aktif', 'Cuti', 'Lulus', 'DO'])->default('aktif');
            // Kunci Tamu (Foreign Key) untuk menghubungkan ke Program Studi
            // unsignedBigInteger adalah tipe yang cocok dengan $table->id()
            $table->foreignId('program_studi_id') 
            ->constrained('program_studis') // Menjamin ID ini merujuk ke tabel program_studis
            ->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
