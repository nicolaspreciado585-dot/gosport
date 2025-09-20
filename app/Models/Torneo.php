<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Torneo
 * 
 * @property int $id_torneo
 * @property string $nombre_torneo
 * @property Carbon|null $fecha_inicio
 * @property Carbon|null $fecha_fin
 * @property string|null $categoria
 * @property string|null $premiso
 * 
 * @property Collection|InscripcionTorneo[] $inscripcion_torneos
 *
 * @package App\Models
 */
class Torneo extends Model
{
	protected $table = 'torneos';
	protected $primaryKey = 'id_torneo';
	public $timestamps = false;

	protected $casts = [
		'fecha_inicio' => 'datetime',
		'fecha_fin' => 'datetime'
	];

	protected $fillable = [
		'nombre_torneo',
		'fecha_inicio',
		'fecha_fin',
		'categoria',
		'premiso'
	];

	public function inscripcion_torneos()
	{
		return $this->hasMany(InscripcionTorneo::class, 'id_torneo');
	}
}
