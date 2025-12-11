<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mahasiswa extends Model
{
    protected $guarded = []; // Agar semua field bisa diisi massal

    // Definisikan Relasi ke ProgramStudi
    public function programStudi(): BelongsTo
    {
        // Hubungkan foreign key 'program_studi_id' ke model ProgramStudi
        return $this->belongsTo(ProgramStudi::class);
    }
}
