<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['descripcion', 'estado_id'];

    public function scopeId($query, $id) {
        return $query->where('id', '=', $id);
    }

    public function estado() {
        return $this->belongsTo(Estado::class);
    }
}
