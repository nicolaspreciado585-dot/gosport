<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MetodoPago
 * 
 * @property int $id_metodo_pago
 * @property string|null $nombre_metodo
 * 
 * @property Collection|Pago[] $pagos
 *
 * @package App\Models
 */
class MetodoPago extends Model
{
	protected $table = 'metodo_pago';
	protected $primaryKey = 'id_metodo_pago';
	public $timestamps = false;

	protected $fillable = [
		'nombre_metodo'
	];

	public function pagos()
	{
		return $this->hasMany(Pago::class, 'id_metodo_pago');
	}
}
