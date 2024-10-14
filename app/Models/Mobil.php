<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage; // Pastikan ini ada

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = [
        'gambar',
        'merk',
        'model',
        'tahun',
        'harga_per_hari',
        'status',
        'warna',
        'nomor_polisi',
        'deskripsi',
    ];

    protected $casts = [
        'id' => 'integer',
    ];

    public function pemesanans(): HasMany
    {
        return $this->hasMany(Pemesanan::class);
    }

    // Menghapus file saat update dan delete
    protected static function boot()
    {
        parent::boot();

        // Hook saat updating
        static::updating(function ($mobils) {
            if ($mobils->isDirty('gambar')) {
                // Menghapus file lama hanya jika ada perubahan pada gambar
                if (Storage::disk('public')->exists($mobils->getOriginal('gambar'))) {
                    Storage::disk('public')->delete($mobils->getOriginal('gambar'));
                }
            }
        });

        // Hook saat deleting
        static::deleting(function ($mobils) {
            // Menghapus file gambar saat record dihapus
            if (Storage::disk('public')->exists($mobils->gambar)) {
                Storage::disk('public')->delete($mobils->gambar);
            }
        });
    }
}
