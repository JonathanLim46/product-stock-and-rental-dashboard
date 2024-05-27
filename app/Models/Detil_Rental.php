<?php

namespace App\Models;

use App\Models\Rental;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Detil_Rental extends Model
{
    use HasFactory;

    protected $table = 'detil_rental';

    protected $fillable = [
        'rental_id',
        'produk_id',
        'total_barang'
    ];

    public function rental(): BelongsTo{
        return $this-> belongsTo(Rental::class,'rental_id');
    }

    public function produk(): BelongsTo{
        return $this-> belongsTo(Products::class,'produk_id');
    }
}
