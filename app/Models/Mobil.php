<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mobil extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'merk',
        'model',
        'tahun',
        'harga_per_hari',
        'status',
        'warna',
        'nomor_polisi',
        'deskripsi',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function pemesanans(): HasMany
    {
        return $this->hasMany(Pemesanan::class);
    }
}
