<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $id_usuario
 * @property string|null $nombre
 * @property string|null $correo
 * @property string|null $contraseña
 * @property string|null $telefono
 * @property int|null $id_rol
 * 
 * @property Rol|null $rol
 * @property Collection|Cancha[] $canchas
 * @property Collection|Factura[] $facturas
 * @property Collection|InscripcionTorneo[] $inscripcion_torneos
 * @property Collection|ParticipanteEvento[] $participante_eventos
 * @property Collection|Reserva[] $reservas
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuario';
	protected $primaryKey = 'id_usuario';
	public $timestamps = false;

	protected $casts = [
		'id_rol' => 'int'
	];

	protected $fillable = [
		'nombre',
		'correo',
		'contraseña',
		'telefono',
		'id_rol'
	];

	public function rol()
	{
		return $this->belongsTo(Rol::class, 'id_rol');
	}

	public function canchas()
	{
		return $this->hasMany(Cancha::class, 'id_admin_cancha');
	}

	public function facturas()
	{
		return $this->hasMany(Factura::class, 'id_usuario');
	}

	public function inscripcion_torneos()
	{
		return $this->hasMany(InscripcionTorneo::class, 'id_usuario');
	}

	public function participante_eventos()
	{
		return $this->hasMany(ParticipanteEvento::class, 'id_usuario');
	}

	public function reservas()
	{
		return $this->hasMany(Reserva::class, 'id_usuario');
	}
}
