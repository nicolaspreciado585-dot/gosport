<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Deporte
 * 
 * @property int $id_deporte
 * @property string|null $nombre
 * @property int|null $jugadores_por_equipo
 * 
 * @property Collection|Cancha[] $canchas
 * @property Collection|Evento[] $eventos
 *
 * @package App\Models
 */
class Deporte extends Model
{
	protected $table = 'deporte';
	protected $primaryKey = 'id_deporte';
	public $timestamps = false;

	protected $casts = [
		'jugadores_por_equipo' => 'int'
	];

	protected $fillable = [
		'nombre',
		'jugadores_por_equipo'
	];

	public function canchas()
	{
		return $this->hasMany(Cancha::class, 'id_deporte');
	}

	public function eventos()
	{
		return $this->hasMany(Evento::class, 'id_deporte');
	}
}
