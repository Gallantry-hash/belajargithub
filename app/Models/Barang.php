<?php

namespace App\Models;

use Database\Factories\BarangFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['nama', 'kategori', 'satuan', 'lokasi_rak', 'stok'])]
class Barang extends Model
{
    /** @use HasFactory<BarangFactory> */
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'stok' => 'integer',
        ];
    }
}
