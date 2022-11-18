<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function scopeFechas($query, $fecha) {
        return $query->where([['fecha', '>=', $fecha . ' 00:00:00'], ['fecha', '<=', $fecha . ' 23:59:59']]);
    }

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }

    public function ventas() {
        return $this->hasMany(Venta::class);
    }
}
