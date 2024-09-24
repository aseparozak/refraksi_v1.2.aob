<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'date_of_birth',
        'gender',
        'occupation'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    public function ukurans()
    {
        return $this->hasMany(Ukuran::class);
    }

    public function getGenderLabelAttribute()
    {
        return [
            'male' => 'Laki-laki',
            'female' => 'Perempuan',
            'other' => 'Lainnya',
        ][$this->gender] ?? 'Tidak Diketahui';
    }

    public function getAgeAttribute()
    {
        return $this->date_of_birth ? $this->date_of_birth->age : null;
    }
}
