<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pago
 * 
 * @property int $id_pago
 * @property int|null $id_reserva
 * @property float|null $monto
 * @property int|null $id_metodo_pago
 * @property string|null $estado
 * @property Carbon|null $fecha_pago
 * 
 * @property Reserva|null $reserva
 * @property MetodoPago|null $metodo_pago
 * @property Collection|Factura[] $facturas
 *
 * @package App\Models
 */
class Pago extends Model
{
	protected $table = 'pago';
	protected $primaryKey = 'id_pago';
	public $timestamps = false;

	protected $casts = [
		'id_reserva' => 'int',
		'monto' => 'float',
		'id_metodo_pago' => 'int',
		'fecha_pago' => 'datetime'
	];

	protected $fillable = [
		'id_reserva',
		'monto',
		'id_metodo_pago',
		'estado',
		'fecha_pago'
	];

	public function reserva()
	{
		return $this->belongsTo(Reserva::class, 'id_reserva');
	}

	public function metodo_pago()
	{
		return $this->belongsTo(MetodoPago::class, 'id_metodo_pago');
	}

	public function facturas()
	{
		return $this->hasMany(Factura::class, 'id_pago');
	}
}
