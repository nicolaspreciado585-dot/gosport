<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas';
    protected $primaryKey = 'id_reserva';
    public $timestamps = false;

    protected $casts = [
        'id_cliente' => 'int',
        'id_cancha' => 'int',
        'fecha_inicio' => 'datetime',
        'fecha_fin' => 'datetime',
    ];

    protected $fillable = [
        'id_cliente',
        'id_cancha',
        'fecha_inicio',
        'fecha_fin',
        'estado',
    ];

    // Relaciones
    public function cancha()
    {
        return $this->belongsTo(Cancha::class, 'id_cancha', 'id_cancha');
    }

    public function cliente()
    {
        return $this->belongsTo(Usuario::class, 'id_cliente', 'id_usuario');
    }

    public function eventos()
    {
        return $this->hasMany(Evento::class, 'id_reserva');
    }

    public function facturas()
    {
        return $this->hasMany(Factura::class, 'id_reserva');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'id_reserva');
    }
}
