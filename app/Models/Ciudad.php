<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ciudad
 * 
 * @property int $id_ciudad
 * @property string|null $nombre_ciudad
 * 
 * @property Collection|Localidad[] $localidads
 *
 * @package App\Models
 */
class Ciudad extends Model
{
	protected $table = 'ciudad';
	protected $primaryKey = 'id_ciudad';
	public $timestamps = false;

	protected $fillable = [
		'nombre_ciudad'
	];

	public function localidads()
	{
		return $this->hasMany(Localidad::class, 'id_ciudad');
	}
}
