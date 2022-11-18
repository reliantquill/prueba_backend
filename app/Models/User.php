<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['identificacion', 'nombres', 'apellidos', 'email', 'password', 'estado_id'];
    protected $hidden   = ['password', 'remember_token'];
    protected $casts    = [ 'email_verified_at' => 'datetime'];
    protected $appends  = [ 'nombre_completo'];

    public function scopeId($query, $id) {
        return $query->where('id', '=', $id);
    }

    public function scopeIdentificacion($query, $identificacion) {
        return $query->where('identificacion', '=', $identificacion);
    }

    public function scopeEstado_id($query, $estado_id) {
        return $query->where('estado_id', '=', $estado_id);
    }

    public function scopeEmail($query, $email) {
        return $query->where('email', '=', $email);
    }

    public function getNombreCompletoAttribute() {
        return $this->nombres . ' ' . $this->apellidos;
    }

    public function estado() {
        return $this->belongsTo(Estado::class);
    }
}
