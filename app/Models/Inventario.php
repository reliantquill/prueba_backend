<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    public function scopeProducto_not_in($query, $in) {
        return $query->whereNotIn('producto_id', $in);
    }

    public function producto() {
        return $this->belongsTo(Producto::class);
    }
}
