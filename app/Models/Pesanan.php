<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'titik_ambil',
        'tujuan',
        'tanggal_pengambilan',
        'deskripsi',
        'ongkos_kirim',
        'biaya_tambahan',
        'total',
        'status',
        'user_id',
    ];

    function user() : BelongsTo {
        return $this->belongsTo(User::class,'user_id');
    }
}
