<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Factura
 * 
 * @property int $id_factura
 * @property int|null $id_pago
 * @property int|null $id_usuario
 * @property int|null $id_reserva
 * @property int|null $id_cancha
 * @property Carbon|null $fecha_emision
 * @property float|null $total
 * 
 * @property Pago|null $pago
 * @property Usuario|null $usuario
 * @property Reserva|null $reserva
 * @property Cancha|null $cancha
 *
 * @package App\Models
 */
class Factura extends Model
{
	protected $table = 'factura';
	protected $primaryKey = 'id_factura';
	public $timestamps = false;

	protected $casts = [
		'id_pago' => 'int',
		'id_usuario' => 'int',
		'id_reserva' => 'int',
		'id_cancha' => 'int',
		'fecha_emision' => 'datetime',
		'total' => 'float'
	];

	protected $fillable = [
		'id_pago',
		'id_usuario',
		'id_reserva',
		'id_cancha',
		'fecha_emision',
		'total'
	];

	public function pago()
	{
		return $this->belongsTo(Pago::class, 'id_pago');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}

	public function reserva()
	{
		return $this->belongsTo(Reserva::class, 'id_reserva');
	}

	public function cancha()
	{
		return $this->belongsTo(Cancha::class, 'id_cancha');
	}
}
