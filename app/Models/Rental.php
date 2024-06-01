<?php

namespace App\Models;

use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rental extends Model
{
    use HasFactory;

    protected $table = 'rental';

    protected $fillable = [
        'id_pelanggan',
        'rental_awal',
        'rental_akhir',
        'status_rental'
    ];

    protected $casts = [
        'rental_awal' => 'date:Y-m-d',
        'rental_akhir' => 'date:Y-m-d'
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class,'id_pelanggan');
    }

    public function detil_rental(): HasMany{
        return $this->hasMany(Detil_Rental::class, 'rental_id', 'id');
    }
}
