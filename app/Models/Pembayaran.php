<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pembayaran extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pemesanan_id',
        'metode_pembayaran',
        'jumlah_pembayaran',
        'tanggal_pembayaran',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'pemesanan_id' => 'integer',
        'tanggal_pembayaran' => 'datetime',
    ];

    public function pemesanan(): BelongsTo
    {
        return $this->belongsTo(Pemesanan::class);
    }
}
