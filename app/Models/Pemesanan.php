<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pemesanan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mobil_id',
        'penyewa_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'total_harga',
        'status',
        'mobil_penyewa_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'mobil_id' => 'integer',
        'penyewa_id' => 'integer',
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'mobil_penyewa_id' => 'integer',
    ];

    public function mobilPenyewa(): BelongsTo
    {
        return $this->belongsTo(MobilPenyewa::class);
    }

    public function mobil(): BelongsTo
    {
        return $this->belongsTo(Mobil::class);
    }

    public function penyewa(): BelongsTo
    {
        return $this->belongsTo(Penyewa::class);
    }

    public function pembayarans(): HasMany
    {
        return $this->hasMany(Pembayaran::class);
    }
}
