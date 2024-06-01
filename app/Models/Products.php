<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Detil_Rental;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'nama_produk', 'deskripsi_produk', 'stok_produk', 'harga_produk', 'category_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function detil_rental(): HasMany{
        return $this->hasMany(Detil_Rental::class);
    }
}
