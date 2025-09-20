<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reserva
 * 
 * @property int $id_reserva
 * @property int|null $id_usuario
 * @property int|null $id_cancha
 * @property Carbon|null $fecha_reserva
 * @property Carbon|null $hora_inicio
 * @property Carbon|null $fecha_fin
 * @property string|null $estado
 * 
 * @property Usuario|null $usuario
 * @property Cancha|null $cancha
 * @property Collection|Evento[] $eventos
 * @property Collection|Factura[] $facturas
 * @property Collection|Pago[] $pagos
 *
 * @package App\Models
 */
class Reserva extends Model
{
	protected $table = 'reservas';
	protected $primaryKey = 'id_reserva';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'id_cancha' => 'int',
		'fecha_reserva' => 'datetime',
		'hora_inicio' => 'datetime',
		'fecha_fin' => 'datetime'
	];

	protected $fillable = [
		'id_usuario',
		'id_cancha',
		'fecha_reserva',
		'hora_inicio',
		'fecha_fin',
		'estado'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}

	public function cancha()
	{
		return $this->belongsTo(Cancha::class, 'id_cancha');
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
