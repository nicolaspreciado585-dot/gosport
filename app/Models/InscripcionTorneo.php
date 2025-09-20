<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InscripcionTorneo
 * 
 * @property int $id_detalle_torneo
 * @property int|null $id_torneo
 * @property int|null $id_usuario
 * 
 * @property Torneo|null $torneo
 * @property Usuario|null $usuario
 *
 * @package App\Models
 */
class InscripcionTorneo extends Model
{
	protected $table = 'inscripcion_torneo';
	protected $primaryKey = 'id_detalle_torneo';
	public $timestamps = false;

	protected $casts = [
		'id_torneo' => 'int',
		'id_usuario' => 'int'
	];

	protected $fillable = [
		'id_torneo',
		'id_usuario'
	];

	public function torneo()
	{
		return $this->belongsTo(Torneo::class, 'id_torneo');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}
}
