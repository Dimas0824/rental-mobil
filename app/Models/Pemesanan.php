<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'mobil_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'total_harga',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'mobil_id' => 'integer',
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function mobil(): BelongsTo
    {
        return $this->belongsTo(Mobil::class);
    }

    public function pembayarans(): HasMany
    {
        return $this->hasMany(Pembayaran::class);
    }

    // Hitung lama sewa
    public function getLamaSewaAttribute()
    {
        // Pastikan tanggal mulai dan selesai valid
        return $this->tanggal_mulai && $this->tanggal_selesai
            ? max(0, $this->tanggal_selesai->diffInDays($this->tanggal_mulai))
            : 0;
    }

    // Hitung total harga
    public function getTotalHargaAttribute()
    {
        // Jika status dibatalkan, total_harga = 0
        if ($this->status === 'dibatalkan') {
            return 0;
        }

        // Pastikan harga per hari tersedia dari mobil
        if (!isset($this->mobil->harga_per_hari)) {
            return 0; // Jika tidak ada harga, total jadi 0
        }

        // Hitung total harga: lama sewa * harga per hari
        $hargaPerHari = $this->mobil->harga_per_hari;
        $lamaSewa = $this->lama_sewa;
        return $lamaSewa * $hargaPerHari;
    }

    // Event saving untuk menyimpan total_harga secara otomatis
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($pemesanan) {
            // Jika status dibatalkan, set total_harga = 0
            if ($pemesanan->status === 'dibatalkan') {
                $pemesanan->total_harga = 0;
            } else {
                // Hitung total harga untuk status lain
                $pemesanan->total_harga = $pemesanan->getTotalHargaAttribute();
            }
        });
    }
}
