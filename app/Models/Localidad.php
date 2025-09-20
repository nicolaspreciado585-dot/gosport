<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Localidad
 * 
 * @property int $id_localidad
 * @property string|null $nombre_localidad
 * @property int|null $id_ciudad
 * 
 * @property Ciudad|null $ciudad
 * @property Collection|Direccion[] $direccions
 *
 * @package App\Models
 */
class Localidad extends Model
{
	protected $table = 'localidad';
	protected $primaryKey = 'id_localidad';
	public $timestamps = false;

	protected $casts = [
		'id_ciudad' => 'int'
	];

	protected $fillable = [
		'nombre_localidad',
		'id_ciudad'
	];

	public function ciudad()
	{
		return $this->belongsTo(Ciudad::class, 'id_ciudad');
	}

	public function direccions()
	{
		return $this->hasMany(Direccion::class, 'id_localidad');
	}
}
