<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tujuan extends Model
{
    use HasFactory;
    protected $table = 'tujuans';
    protected $fillable = ['destination', 'description', 'price'];

    public function pemesanan(): HasMany
    {
        return $this->hasMany(Pemesanan::class);
    }
}
