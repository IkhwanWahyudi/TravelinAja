<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanans';
    protected $fillable = ['user_id', 'departure_date', 'tujuan_id', 'kendaraan_id', 'duration', 'number_of_passengers', 'status'];

    public function idDestination(): BelongsTo
    {
        return $this->belongsTo(Tujuan::class);
    }

    public function idKendaraan(): BelongsTo
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
