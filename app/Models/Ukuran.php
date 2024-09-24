<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log; // Pastikan baris ini ada

class Ukuran extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_number',
        'patient_id',
        'keluhan',
        'riwayat_penyakit',
        'ukuran_kacamata_lama',
        'righto_sph',
        'righto_cyl',
        'righto_axis',
        'lefto_sph',
        'lefto_cyl',
        'lefto_axis',
        'right_sph',
        'right_cyl',
        'right_axis',
        'right_add',
        'right_mpd',
        'right_prisma',
        'right_visus',
        'left_sph',
        'left_cyl',
        'left_axis',
        'left_add',
        'left_mpd',
        'left_prisma',
        'left_visus',
        'keseimbangan_binokuler',
        'titikakhir_binokuler',
        'diagnosa',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    protected static function booted()
    {
        static::creating(function ($ukuran) {
            Log::info('Attempting to create Ukuran:', $ukuran->toArray());
        });
    }
}
