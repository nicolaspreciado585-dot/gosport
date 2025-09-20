<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cancha
 * 
 * @property int $id_cancha
 * @property string|null $nombre
 * @property int|null $capacidad
 * @property float|null $precio_hora
 * @property string|null $estado
 * @property bool|null $reservada
 * @property string|null $foto
 * @property int|null $stock
 * @property int|null $id_tipo_cancha
 * @property int|null $id_direccion
 * @property int|null $id_deporte
 * @property int|null $id_admin_cancha
 * 
 * @property Tipocancha|null $tipocancha
 * @property Direccion|null $direccion
 * @property Deporte|null $deporte
 * @property Usuario|null $usuario
 * @property Collection|Factura[] $facturas
 * @property Collection|Reserva[] $reservas
 *
 * @package App\Models
 */
class Cancha extends Model
{
	protected $table = 'cancha';
	protected $primaryKey = 'id_cancha';
	public $timestamps = false;

	protected $casts = [
		'capacidad' => 'int',
		'precio_hora' => 'float',
		'reservada' => 'bool',
		'stock' => 'int',
		'id_tipo_cancha' => 'int',
		'id_direccion' => 'int',
		'id_deporte' => 'int',
		'id_admin_cancha' => 'int'
	];

	protected $fillable = [
		'nombre',
		'capacidad',
		'precio_hora',
		'estado',
		'reservada',
		'foto',
		'stock',
		'id_tipo_cancha',
		'id_direccion',
		'id_deporte',
		'id_admin_cancha'
	];

	public function tipocancha()
	{
		return $this->belongsTo(Tipocancha::class, 'id_tipo_cancha');
	}

	public function direccion()
	{
		return $this->belongsTo(Direccion::class, 'id_direccion');
	}

	public function deporte()
	{
		return $this->belongsTo(Deporte::class, 'id_deporte');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_admin_cancha');
	}

	public function facturas()
	{
		return $this->hasMany(Factura::class, 'id_cancha');
	}

	public function reservas()
	{
		return $this->hasMany(Reserva::class, 'id_cancha');
	}
}
