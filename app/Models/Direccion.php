<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Direccion
 * 
 * @property int $id_direccion
 * @property int|null $id_localidad
 * @property string|null $barrio
 * @property string|null $calle
 * @property string|null $coordenadas
 * 
 * @property Localidad|null $localidad
 * @property Collection|Cancha[] $canchas
 *
 * @package App\Models
 */
class Direccion extends Model
{
	protected $table = 'direccion';
	protected $primaryKey = 'id_direccion';
	public $timestamps = false;

	protected $casts = [
		'id_localidad' => 'int'
	];

	protected $fillable = [
		'id_localidad',
		'barrio',
		'calle',
		'coordenadas'
	];

	public function localidad()
	{
		return $this->belongsTo(Localidad::class, 'id_localidad');
	}

	public function canchas()
	{
		return $this->hasMany(Cancha::class, 'id_direccion');
	}
}
