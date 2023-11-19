<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'pesanan_id',
        'user_id',
        'review',
    ];

    function user() : BelongsTo {
        return $this->belongsTo(User::class,'user_id');
    }
    function pesanan() : BelongsTo {
        return $this->belongsTo(Pesanan::class,'pesanan_id');
    }
}
