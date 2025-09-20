<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipocancha
 * 
 * @property int $id_tipo_cancha
 * @property string|null $nombre
 * @property string|null $descripcion
 * 
 * @property Collection|Cancha[] $canchas
 *
 * @package App\Models
 */
class Tipocancha extends Model
{
	protected $table = 'tipocancha';
	protected $primaryKey = 'id_tipo_cancha';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function canchas()
	{
		return $this->hasMany(Cancha::class, 'id_tipo_cancha');
	}
}
